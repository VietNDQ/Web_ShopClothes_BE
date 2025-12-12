<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
use App\Http\Requests\DiaChiCreateRequest;
use App\Http\Requests\DiaChiUpdateRequest;
use App\Models\DiaChi;
use App\Models\DiaChiKhachHang;
use App\Models\KhachHang;
use App\Models\PhanQuyen;
use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use App\Models\TinhThanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Google_Client;

class KhachHangController extends Controller
{
    public function loginGoogle(Request $request)
{
    $client = new Google_Client(['client_id' => env('CLIENT_ID')]);
    $payload = $client->verifyIdToken($request->id_token);

    if ($payload) {
        $ho_va_ten = $payload['name'];
        $email = $payload['email'];

        $user = KhachHang::where('email', $email)->first();

        if ($user) {
            $token = $user->createToken('token_khach_hang')->plainTextToken;
            return response()->json([
                'status'    => true,
                'message'   => 'Đăng nhập thành công',
                'ho_va_ten' => $user->ho_va_ten,
                'token'     => $token,
            ]);
        } else {
            $newUser = KhachHang::create([
                'ho_va_ten'     => $ho_va_ten,
                'email'         => $email,
                'password'      => '123456',
                'so_dien_thoai' => null,
                'ngay_sinh'     => null,
                'is_active'     => 1,
            ]);

            // Gán lại user từ $newUser
            $token = $newUser->createToken('token_khach_hang')->plainTextToken;

            return response()->json([
                'status'  => true,
                'message' => 'Bạn đã đăng ký tài khoản thành công!',
                'token'   => $token,
            ]);
        }
    } else {
        return response()->json([
            'status'  => false,
            'message' => 'Token không hợp lệ hoặc đã hết hạn.',
        ]);
    }
}


    public function layThongTin()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            return response()->json([
                'status'  => 1,
                'thong_tin'    => $user,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        
        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để cập nhật thông tin!'
            ], 401);
        }

        try {
            $updateData = [];
            
            if ($request->has('ho_va_ten')) {
                $updateData['ho_va_ten'] = $request->ho_va_ten;
            }
            
            if ($request->has('so_dien_thoai')) {
                $updateData['so_dien_thoai'] = preg_replace('/[^0-9]/', '', $request->so_dien_thoai);
            }
            
            if ($request->has('ngay_sinh')) {
                $updateData['ngay_sinh'] = $request->ngay_sinh;
            }

            if (empty($updateData)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không có dữ liệu để cập nhật!'
                ], 400);
            }

            $user->update($updateData);

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thông tin thành công!',
                'thong_tin' => $user->fresh()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function changePassword(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        
        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để đổi mật khẩu!'
            ], 401);
        }

        // Validation
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|same:password'
        ], [
            'old_password.required' => 'Vui lòng nhập mật khẩu hiện tại!',
            'password.required' => 'Vui lòng nhập mật khẩu mới!',
            'password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự!',
            're_password.required' => 'Vui lòng xác nhận mật khẩu mới!',
            're_password.same' => 'Mật khẩu xác nhận không khớp!'
        ]);

        try {
            // Kiểm tra mật khẩu cũ
            if ($user->password !== $request->old_password) {
                return response()->json([
                    'status' => false,
                    'message' => 'Mật khẩu hiện tại không chính xác!'
                ], 400);
            }

            // Cập nhật mật khẩu mới
            $user->update([
                'password' => $request->password
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Đổi mật khẩu thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function checkToken()
    {
        $user_login = Auth::guard('sanctum')->user();
        if ($user_login) {
            return response()->json([
                'status' => true,
                'ho_va_ten' => $user_login->ho_va_ten,
                'email' => $user_login->email,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập hệ thống!',
            ]);
        }
    }

    public function login(Request $request)
    {
        $check = KhachHang::where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if ($check) {
            return response()->json([
                'status'    => true,
                'message'   => 'Đăng nhập hệ thống thành công.',
                'ho_va_ten' => $check->ho_va_ten,
                'id_khach_hang' => $check->id,
                'token'     => $check->createToken('token_khach_hang')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Tài khoản hoặc mật khẩu không chính xác.',
            ]);
        }
    }

    public function dangKy(KhachHangDangKyRequest $request)
    {
        try {
            // Kiểm tra email đã tồn tại chưa
            $existingUser = KhachHang::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email này đã được sử dụng. Vui lòng chọn email khác!'
                ], 400);
            }

            // Tạo tài khoản mới
            $khachHang = KhachHang::create([
                'ho_va_ten'     => $request->ho_va_ten,
                'email'         => $request->email,
                'password'      => $request->password,
                'so_dien_thoai' => preg_replace('/[^0-9]/', '', $request->so_dien_thoai),
                'ngay_sinh'     => $request->ngay_sinh,
                'is_active'     => 1,
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Đăng ký tài khoản thành công! Vui lòng đăng nhập để tiếp tục.',
                'data'    => [
                    'id' => $khachHang->id,
                    'email' => $khachHang->email,
                    'ho_va_ten' => $khachHang->ho_va_ten,
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra khi đăng ký. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function logOut()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user instanceof \App\Models\KhachHang) {
            $currentToken = $user->currentAccessToken();

            if ($currentToken) {
                DB::table('personal_access_tokens')
                    ->where('id', $currentToken->id)
                    ->delete();

                return response()->json([
                    'status'  => true,
                    'message' => "Đăng xuất thành công",
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => "Không tìm thấy token hiện tại.",
                ]);
            }
        } else {
            return response()->json([
                'status'  => false,
                'message' => "Có lỗi xảy ra hoặc người dùng không hợp lệ.",
            ]);
        }
    }

    public function getDataDiaChi()
    {
        $user = Auth::guard('sanctum')->user();
        
        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để xem địa chỉ!'
            ], 401);
        }
        
        $data = DiaChi::where('id_khach_hang', $user->id)
            ->join('tinh_thanhs', 'tinh_thanhs.id', '=', 'dia_chis.id_tinh_thanh')
            ->join('quan_huyens', 'quan_huyens.id', '=', 'dia_chis.id_quan_huyen')
            ->join('phuong_xas', 'phuong_xas.id', '=', 'dia_chis.id_phuong_xa')
            ->select('dia_chis.id', 'dia_chis.id_tinh_thanh', 'dia_chis.id_quan_huyen', 'dia_chis.id_phuong_xa', 'dia_chis.id_khach_hang', 'dia_chis.ten_nguoi_nhan', 'dia_chis.so_dien_thoai', 'tinh_thanhs.ten_tinh_thanh', 'quan_huyens.ten_quan_huyen', 'phuong_xas.ten_phuong_xa', 'dia_chis.dia_chi')
            ->get();
            
        if ($data->isEmpty()) {
            return response()->json([
                'status' => true,
                'data' => [],
                'message' => 'Chưa có địa chỉ nhận hàng.'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }
    public function storeDiaChi(DiaChiCreateRequest $request)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để thêm địa chỉ!'
            ], 401);
        }

        try {
            // Làm sạch số điện thoại (loại bỏ khoảng trắng và ký tự đặc biệt)
            $soDienThoai = preg_replace('/[^0-9]/', '', $request->so_dien_thoai);
            
            if (empty($soDienThoai)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Số điện thoại không được để trống!'
                ], 400);
            }
            
            $diaChi = DiaChi::create([
                'id_khach_hang'         => $user->id,
                'id_tinh_thanh'          => $request->id_tinh_thanh,
                'id_quan_huyen'         => $request->id_quan_huyen,
                'id_phuong_xa'          => $request->id_phuong_xa,
                'dia_chi'               => $request->dia_chi,
                'ten_nguoi_nhan'        => $request->ten_nguoi_nhan,
                'so_dien_thoai'         => $soDienThoai,
            ]);
            
            return response()->json([
                'status' => true,
                'message' => 'Thêm mới địa chỉ nhận hàng thành công',
                'data' => [
                    'id' => $diaChi->id
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function updateDiaChi(DiaChiUpdateRequest $request)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để cập nhật địa chỉ!'
            ], 401);
        }

        // Kiểm tra địa chỉ có thuộc về user không
        $diaChi = DiaChi::where('id', $request->id)
            ->where('id_khach_hang', $user->id)
            ->first();
            
        if (!$diaChi) {
            return response()->json([
                'status' => false,
                'message' => 'Địa chỉ không tồn tại hoặc không thuộc quyền sở hữu của bạn!'
            ], 404);
        }

        try {
            $diaChi->update([
                'id_tinh_thanh'          => $request->id_tinh_thanh,
            'id_quan_huyen'         => $request->id_quan_huyen,
            'id_phuong_xa'          => $request->id_phuong_xa,
            'dia_chi'               => $request->dia_chi,
            'ten_nguoi_nhan'        => $request->ten_nguoi_nhan,
            'so_dien_thoai'         => $request->so_dien_thoai,
        ]);
            
        return response()->json([
            'status' => true,
                'message' => 'Cập nhật địa chỉ nhận hàng thành công'
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function destroyDiaChi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user || !($user instanceof \App\Models\KhachHang)) {
        return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để xóa địa chỉ!'
            ], 401);
        }

        // Validate id
        $request->validate([
            'id' => 'required|integer|exists:dia_chis,id'
        ], [
            'id.required' => 'ID địa chỉ không được để trống.',
            'id.exists' => 'Địa chỉ không tồn tại.'
        ]);

        // Kiểm tra địa chỉ có thuộc về user không
        $diaChi = DiaChi::where('id', $request->id)
            ->where('id_khach_hang', $user->id)
            ->first();
            
        if (!$diaChi) {
            return response()->json([
                'status' => false,
                'message' => 'Địa chỉ không tồn tại hoặc không thuộc quyền sở hữu của bạn!'
            ], 404);
        }

        try {
            $diaChi->delete();
            
            return response()->json([
                'status' => true,
                'message' => 'Xóa địa chỉ nhận hàng thành công'
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function getDataTinhThanh()
    {
        $data = TinhThanh::where('tinh_trang', 1)->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function getDataQuanHuyen(Request $request)
    {
        $request->validate([
            'id_tinh_thanh' => 'required|integer|exists:tinh_thanhs,id'
        ], [
            'id_tinh_thanh.required' => 'ID tỉnh/thành phố không được để trống.',
            'id_tinh_thanh.exists' => 'Tỉnh/thành phố không tồn tại.'
        ]);
        
        $data = QuanHuyen::where('tinh_trang', 1)
            ->where('id_tinh_thanh', $request->id_tinh_thanh)
            ->get();
            
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function getDataPhuongXa(Request $request)
    {
        $request->validate([
            'id_quan_huyen' => 'required|integer|exists:quan_huyens,id'
        ], [
            'id_quan_huyen.required' => 'ID quận/huyện không được để trống.',
            'id_quan_huyen.exists' => 'Quận/huyện không tồn tại.'
        ]);
        
        $data = PhuongXa::where('tinh_trang', 1)
            ->where('id_quan_huyen', $request->id_quan_huyen)
            ->get();
            
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 14;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $khachHang = KhachHang::where('id', $request->id)->first();
        if (!$khachHang) {
            return response()->json([
                'status' => false,
                'message' => 'Khách Hàng không tồn tại.'
            ]);
        }

        if ($khachHang->is_block == 1) {
            $khachHang->is_block = 0;
        } else {
            $khachHang->is_block = 1;
        }
        $khachHang->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã đổi trạng thái Khách Hàng ' . $request->ten_khach_hang . ' thành công'
        ]);
    }
    public function store(Request $request)
    {
        $id_chuc_nang = 9; // Tao moi khach hang
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhachHang::create([
            'ho_va_ten'         => $request->ho_va_ten,
            'email'             => $request->email,
            'password'          => $request->password,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'ngay_sinh'         => $request->ngay_sinh,
            'is_active'       => $request->is_active,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Bạn Đăng Ký Tài Khoản  ' . $request->email . '  Thành Công'
        ]);
    }
    public function getData()
    {
        $id_chuc_nang = 9;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = KhachHang::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function update(Request $request)
    {
        $id_chuc_nang = 10;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        KhachHang::where('id', $request->id)->update([
            'ho_va_ten'         => $request->ho_va_ten,
            'email'             => $request->email,
            'password'          => $request->password,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'ngay_sinh'         => $request->ngay_sinh,
            'hash_active'       => $request->hash_active,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Cập nhập Khách Hàng ' . $request->ho_va_ten . ' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 11;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhachHang::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
            'message' => 'Xóa Khách Hàng ' . $request->ho_va_ten . ' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 13;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = KhachHang::where('ho_va_ten', 'like', $noi_dung)
            ->orwhere('email', 'like', $noi_dung)
            ->orwhere('so_dien_thoai', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}

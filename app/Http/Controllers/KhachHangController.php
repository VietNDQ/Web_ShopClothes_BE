<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
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
        $data = DiaChi::where('id_khach_hang', $user->id)
            ->join('tinh_thanhs', 'tinh_thanhs.id', '=', 'dia_chis.id_tinh_thanh')
            ->join('quan_huyens', 'quan_huyens.id', '=', 'dia_chis.id_quan_huyen')
            ->join('phuong_xas', 'phuong_xas.id', '=', 'dia_chis.id_phuong_xa')
            ->select('dia_chis.id', 'dia_chis.id_tinh_thanh', 'dia_chis.id_quan_huyen', 'dia_chis.id_phuong_xa', 'dia_chis.id_khach_hang', 'dia_chis.ten_nguoi_nhan', 'dia_chis.so_dien_thoai', 'tinh_thanhs.ten_tinh_thanh', 'quan_huyens.ten_quan_huyen', 'phuong_xas.ten_phuong_xa', 'dia_chis.dia_chi')
            ->get();
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Chưa có địa chỉ nhận hàng.'
            ]);
        }
    }
    public function storeDiaChi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        DiaChi::create([
            'id_khach_hang'         => $user->id,
            'id_quan_huyen'         => $request->id_quan_huyen,
            'id_phuong_xa'          => $request->id_phuong_xa,
            'id_tinh_thanh'          => $request->id_tinh_thanh,
            'dia_chi'               => $request->dia_chi,
            'ten_nguoi_nhan'        => $request->ten_nguoi_nhan,
            'so_dien_thoai'         => $request->so_dien_thoai,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm mới địa chị nhận hàng thành công'
        ]);
    }

    public function updateDiaChi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        DiaChi::where('dia_chis.id', $request->id)->update([
            'id_khach_hang'         => $user->id,
            'id_quan_huyen'         => $request->id_quan_huyen,
            'id_phuong_xa'          => $request->id_phuong_xa,
            'id_tinh_thanh'          => $request->id_tinh_thanh,
            'dia_chi'               => $request->dia_chi,
            'ten_nguoi_nhan'        => $request->ten_nguoi_nhan,
            'so_dien_thoai'         => $request->so_dien_thoai,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật địa chị nhận hàng thành công'
        ]);
    }

    public function destroyDiaChi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        DiaChi::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa địa chị nhận hàng thành công'
        ]);
    }

    public function getDataTinhThanh()
    {
        $data = TinhThanh::where('tinh_trang', 1)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getDataQuanHuyen(Request $request)
    {
        $data = QuanHuyen::where('tinh_trang', 1)->where('id_tinh_thanh', $request->id_tinh_thanh)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getDataPhuongXa(Request $request)
    {
        $data = PhuongXa::where('tinh_trang', 1)->where('id_quan_huyen', $request->id_quan_huyen)->get();
        return response()->json([
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

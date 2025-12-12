<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\NhanVien;
use App\Models\PhanQuyen;
use App\Models\ThanhToan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class NhanVienController extends Controller
{
    public function xacNhanDonHang(Request $request)
    {
        $id_chuc_nang = 8; // Xác nhận đơn hàng
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        $nhanVien = Auth::guard('sanctum')->user();

        if (!$nhanVien || !($nhanVien instanceof \App\Models\NhanVien)) {
            return response()->json([
                'status' => false,
                'message' => 'Không xác thực được nhân viên.',
            ], 401);
        }
        $donHangList = DonHang::where('ma_don_hang', $request->ma_don_hang)
            ->where('trang_thai', 1)
            ->get();

        if ($donHangList->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Đơn hàng đã được xác nhận.',
            ], 404);
        }
        foreach ($donHangList as $donHang) {
            $donHang->trang_thai = 2;
            $donHang->id_nhan_vien = $nhanVien->id;
            $donHang->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Xác nhận đơn hàng thành công.',
            'data' => [
                'ma_don_hang' => $request->ma_don_hang,
                'so_san_pham_da_xac_nhan' => $donHangList->count(),
                'id_nhan_vien_xac_nhan' => $nhanVien->id,
            ]
        ]);
    }

    public function getDonHang()
    {
        $id_chuc_nang = 7; // Lấy đơn hàng nhân viên
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        $nhanVien = Auth::guard('sanctum')->user();

        if ($nhanVien && $nhanVien instanceof \App\Models\NhanVien) {
            // Admin: Đơn đặt trước hiện lên đầu (sắp xếp ASC - cũ nhất trước)
            $donHang = DonHang::where('trang_thai', '>=', 1)
                ->orderBy('don_hangs.created_at', 'asc')
                ->get();

            $thongTinKhachHang = ThanhToan::join('khach_hangs', 'thanh_toans.id_khach_hang', '=', 'khach_hangs.id')
                ->join('don_hangs', 'thanh_toans.id_don_hang', '=', 'don_hangs.id')
                ->leftJoin('dia_chis', 'thanh_toans.id_dia_chi_giao_hang', '=', 'dia_chis.id')
                ->where('don_hangs.trang_thai', '>=', 1)
                ->select(
                    'thanh_toans.*', 
                    'thanh_toans.ma_don_hang', 
                    'khach_hangs.ho_va_ten', 
                    'dia_chis.so_dien_thoai', 
                    'don_hangs.id', 
                    'don_hangs.trang_thai as trang_thai_don_hang', 
                    'don_hangs.created_at'
                )
                ->orderBy('don_hangs.created_at', 'asc')
                ->get();
            $chiTietDonHang = DonHang::join('thanh_toans', 'don_hangs.ma_don_hang', '=', 'thanh_toans.ma_don_hang')
                ->join('khach_hangs', 'thanh_toans.id_khach_hang', '=', 'khach_hangs.id')
                ->join('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
                ->leftJoin('hinh_anh_san_phams', function ($join) {
                    $join->on('san_phams.id', '=', 'hinh_anh_san_phams.id_san_pham')
                        ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
                })
                ->join('dia_chis', 'dia_chis.id', '=', 'thanh_toans.id_dia_chi_giao_hang')
                ->join('tinh_thanhs', 'dia_chis.id_tinh_thanh', '=', 'tinh_thanhs.id')
                ->join('quan_huyens', 'dia_chis.id_quan_huyen', '=', 'quan_huyens.id')
                ->join('phuong_xas', 'dia_chis.id_phuong_xa', '=', 'phuong_xas.id')
                ->where('don_hangs.trang_thai', '>=', 1)
                ->select(
                    'don_hangs.*',
                    'san_phams.ten_san_pham',
                    'khach_hangs.ho_va_ten',
                    'dia_chis.dia_chi',
                    'dia_chis.ten_nguoi_nhan',
                    'dia_chis.so_dien_thoai',
                    'tinh_thanhs.ten_tinh_thanh',
                    'quan_huyens.ten_quan_huyen',
                    'phuong_xas.ten_phuong_xa',
                    'thanh_toans.ma_don_hang',
                    'thanh_toans.ma_voucher',
                    'thanh_toans.tong_tien_goc',
                    'thanh_toans.tien_giam_gia',
                    'thanh_toans.tong_tien as tong_tien_sau_giam',
                    'hinh_anh_san_phams.url as image'
                )
                ->orderBy('don_hangs.created_at', 'asc')
                ->get();

            return response()->json([
                'status' => true,
                'don_hang' => $donHang,
                'thong_tin_khach_hang' => $thongTinKhachHang,
                'chi_tiet_don_hang' => $chiTietDonHang
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Không xác thực được nhân viên.',
        ], 401);
    }

    public function logOut()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user instanceof \App\Models\NhanVien) {
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

    public function checkToken()
    {
        $userLogin = Auth::guard('sanctum')->user();
        if ($userLogin) {
            return response()->json([
                'status'    => true,
                'ho_va_ten'    => $userLogin->ho_va_ten,
                'avatar'    => $userLogin->avatar,
                'email'      => $userLogin->email,
                'ten_chuc_vu' => $userLogin->chucVu ? $userLogin->chucVu->ten_chuc_vu : null,
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Token không hợp lệ'
            ], 401);
        }
    }

    public function login(Request $request)
    {
        $check = NhanVien::where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if ($check) {
            return response()->json([
                'status' => 1,
                'message' => 'Bạn đã đăng nhập thành công',
                'token' => $check->createToken('token_nhan_vien')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Tài khoản hoặc mật khẩu không đúng.'
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 6; // Thay đổi trạng thái nhân viên
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        $nhanVien = NhanVien::where('id', $request->id)->first();

        if ($nhanVien->tinh_trang == 1) {
            $nhanVien->tinh_trang == 0;
        } else {
            $nhanVien->tinh_trang == 1;
        }
        $nhanVien->save();

        return response()->json([
            'status' => true,
            'message' => 'Đổi trạng thái nhân viên ' . $request->ho_va_ten . ' thành công'
        ]);
    }

    public function getData()
    {
        $id_chuc_nang = 1; // Lấy dữ liệu nhân viên
        $chuc_vu     = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = NhanVien::join('chuc_vus', 'nhan_viens.id_chuc_vu', '=', 'chuc_vus.id')
            ->select('nhan_viens.*', 'chuc_vus.ten_chuc_vu')
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $id_chuc_nang = 2; // Tạo mới nhân viên
        $chuc_vu     = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        NhanVien::create([
            'ho_va_ten'         => $request->ho_va_ten,
            'email'             => $request->email,
            'avatar'            => $request->avatar,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'password'          => $request->password,
            'dia_chi'           => $request->dia_chi,
            'tinh_trang'        => $request->tinh_trang,
            'id_chuc_vu'        => $request->id_chuc_vu,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm mới nhân viên ' . $request->ho_va_ten . ' thành công.'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang = 3; // Cập nhật nhân viên
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        NhanVien::where('id', $request->id)
            ->update([
                'ho_va_ten'         => $request->ho_va_ten,
                'email'             => $request->email,
                'avatar'            => $request->avatar,
                'so_dien_thoai'     => $request->so_dien_thoai,
                'password'          => $request->password,
                'dia_chi'           => $request->dia_chi,
                'tinh_trang'        => $request->tinh_trang,
                'id_chuc_vu'        => $request->id_chuc_vu,
            ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật nhân viên ' . $request->ho_va_ten . ' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 4; // Xoá nhân
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        NhanVien::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa nhân viên ' . $request->ho_va_ten . ' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 5; // Tìm kiếm nhân viên
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        $noi_dung = '%' . $request->noi_dung . '%';

        $data = NhanVien::where('ho_va_ten', 'like', $noi_dung)
            ->orwhere('email', 'like', $noi_dung)
            ->orwhere('so_dien_thoai', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Lấy thông tin profile của nhân viên đang đăng nhập
     */
    public function layThongTinProfile()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\NhanVien) {
            // Load thông tin chức vụ
            $user->load('chucVu');
            
            return response()->json([
                'status' => true,
                'thong_tin' => $user,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra",
            ], 401);
        }
    }

    /**
     * Cập nhật thông tin profile của nhân viên đang đăng nhập
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        
        if (!$user || !($user instanceof \App\Models\NhanVien)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập để cập nhật thông tin!'
            ], 401);
        }

        try {
            $request->validate([
                'ho_va_ten' => 'nullable|string|max:255',
                'so_dien_thoai' => 'nullable|string|max:20',
                'dia_chi' => 'nullable|string|max:500',
            ], [
                'ho_va_ten.max' => 'Họ và tên không được vượt quá 255 ký tự!',
                'so_dien_thoai.max' => 'Số điện thoại không được vượt quá 20 ký tự!',
                'dia_chi.max' => 'Địa chỉ không được vượt quá 500 ký tự!',
            ]);

            $updateData = [];
            
            if ($request->has('ho_va_ten')) {
                $updateData['ho_va_ten'] = $request->ho_va_ten;
            }
            
            if ($request->has('so_dien_thoai')) {
                $updateData['so_dien_thoai'] = preg_replace('/[^0-9]/', '', $request->so_dien_thoai);
            }
            
            if ($request->has('dia_chi')) {
                $updateData['dia_chi'] = $request->dia_chi;
            }

            if (empty($updateData)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không có dữ liệu để cập nhật!'
                ], 400);
            }

            $user->update($updateData);
            $user->load('chucVu');

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thông tin thành công!',
                'thong_tin' => $user->fresh()
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dữ liệu không hợp lệ!',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    /**
     * Đổi mật khẩu cho nhân viên đang đăng nhập
     */
    public function changePassword(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        
        if (!$user || !($user instanceof \App\Models\NhanVien)) {
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
}

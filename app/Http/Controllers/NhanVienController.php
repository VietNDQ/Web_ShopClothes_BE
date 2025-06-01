<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class NhanVienController extends Controller
{
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
        $data = NhanVien::join('chuc_vus', 'nhan_viens.id_chuc_vu', '=', 'chuc_vus.id')
            ->select('nhan_viens.*', 'chuc_vus.ten_chuc_vu')
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
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

        NhanVien::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa nhân viên ' . $request->ho_va_ten . ' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = NhanVien::where('ho_va_ten', 'like', $noi_dung)
            ->orwhere('email', 'like', $noi_dung)
            ->orwhere('so_dien_thoai', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}

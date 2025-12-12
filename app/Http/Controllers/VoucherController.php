<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherController extends Controller
{
    /**
     * Lấy danh sách voucher
     */
    public function getData(Request $request)
    {
        $id_chuc_nang = 77; // Lấy dữ liệu voucher
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $keyword = $request->input('keyword', '');
            $trangThai = $request->input('trang_thai', null);

            $query = Voucher::query();

            // Tìm kiếm theo keyword
            if ($keyword) {
                $query->where(function($q) use ($keyword) {
                    $q->where('ma_voucher', 'like', '%' . $keyword . '%')
                      ->orWhere('ten_voucher', 'like', '%' . $keyword . '%');
                });
            }

            // Lọc theo trạng thái
            if ($trangThai !== null) {
                $query->where('trang_thai', $trangThai);
            }

            // Kiểm tra hết hạn và cập nhật trạng thái
            $now = Carbon::now();
            $query->get()->each(function($voucher) use ($now) {
                if ($voucher->ngay_ket_thuc < $now && $voucher->trang_thai == 1) {
                    $voucher->update(['trang_thai' => 2]); // Hết hạn
                }
            });

            $data = $query->orderBy('created_at', 'desc')->get();

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy danh sách voucher: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Tạo voucher mới
     */
    public function store(Request $request)
    {
        $id_chuc_nang = 78; // Tạo mới voucher
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        $request->validate([
            'ma_voucher' => 'required|string|max:50|unique:vouchers,ma_voucher',
            'ten_voucher' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'loai_giam_gia' => 'required|integer|in:1,2', // 1: Phần trăm, 2: Số tiền cố định
            'gia_tri_giam' => 'required|numeric|min:0',
            'gia_tri_toi_thieu' => 'nullable|numeric|min:0',
            'gia_tri_toi_da' => 'nullable|numeric|min:0',
            'so_luong' => 'required|integer|min:1',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after:ngay_bat_dau',
            'trang_thai' => 'nullable|integer|in:0,1',
        ], [
            'ma_voucher.required' => 'Mã voucher không được để trống!',
            'ma_voucher.unique' => 'Mã voucher đã tồn tại!',
            'ten_voucher.required' => 'Tên voucher không được để trống!',
            'loai_giam_gia.required' => 'Loại giảm giá không được để trống!',
            'gia_tri_giam.required' => 'Giá trị giảm không được để trống!',
            'so_luong.required' => 'Số lượng không được để trống!',
            'ngay_bat_dau.required' => 'Ngày bắt đầu không được để trống!',
            'ngay_ket_thuc.required' => 'Ngày kết thúc không được để trống!',
            'ngay_ket_thuc.after' => 'Ngày kết thúc phải sau ngày bắt đầu!',
        ]);

        try {
            $nhanVien = Auth::guard('sanctum')->user();

            $voucher = Voucher::create([
                'ma_voucher' => strtoupper($request->ma_voucher),
                'ten_voucher' => $request->ten_voucher,
                'mo_ta' => $request->mo_ta,
                'loai_giam_gia' => $request->loai_giam_gia,
                'gia_tri_giam' => $request->gia_tri_giam,
                'gia_tri_toi_thieu' => $request->gia_tri_toi_thieu,
                'gia_tri_toi_da' => $request->gia_tri_toi_da,
                'so_luong' => $request->so_luong,
                'so_luong_da_su_dung' => 0,
                'ngay_bat_dau' => $request->ngay_bat_dau,
                'ngay_ket_thuc' => $request->ngay_ket_thuc,
                'trang_thai' => $request->trang_thai ?? 1,
                'id_nhan_vien' => $nhanVien->id ?? null,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Tạo voucher thành công!',
                'data' => $voucher
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi tạo voucher: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cập nhật voucher
     */
    public function update(Request $request)
    {
        $id_chuc_nang = 79; // Cập nhật voucher
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        $request->validate([
            'id' => 'required|integer|exists:vouchers,id',
            'ma_voucher' => 'required|string|max:50|unique:vouchers,ma_voucher,' . $request->id,
            'ten_voucher' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'loai_giam_gia' => 'required|integer|in:1,2',
            'gia_tri_giam' => 'required|numeric|min:0',
            'gia_tri_toi_thieu' => 'nullable|numeric|min:0',
            'gia_tri_toi_da' => 'nullable|numeric|min:0',
            'so_luong' => 'required|integer|min:1',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after:ngay_bat_dau',
            'trang_thai' => 'nullable|integer|in:0,1,2',
        ], [
            'id.required' => 'ID voucher không được để trống!',
            'id.exists' => 'Voucher không tồn tại!',
            'ma_voucher.required' => 'Mã voucher không được để trống!',
            'ma_voucher.unique' => 'Mã voucher đã tồn tại!',
            'ten_voucher.required' => 'Tên voucher không được để trống!',
            'ngay_ket_thuc.after' => 'Ngày kết thúc phải sau ngày bắt đầu!',
        ]);

        try {
            $voucher = Voucher::findOrFail($request->id);

            // Kiểm tra số lượng đã sử dụng không được vượt quá số lượng mới
            if ($request->so_luong < $voucher->so_luong_da_su_dung) {
                return response()->json([
                    'status' => false,
                    'message' => 'Số lượng mới không được nhỏ hơn số lượng đã sử dụng (' . $voucher->so_luong_da_su_dung . ')!'
                ], 400);
            }

            $voucher->update([
                'ma_voucher' => strtoupper($request->ma_voucher),
                'ten_voucher' => $request->ten_voucher,
                'mo_ta' => $request->mo_ta,
                'loai_giam_gia' => $request->loai_giam_gia,
                'gia_tri_giam' => $request->gia_tri_giam,
                'gia_tri_toi_thieu' => $request->gia_tri_toi_thieu,
                'gia_tri_toi_da' => $request->gia_tri_toi_da,
                'so_luong' => $request->so_luong,
                'ngay_bat_dau' => $request->ngay_bat_dau,
                'ngay_ket_thuc' => $request->ngay_ket_thuc,
                'trang_thai' => $request->trang_thai ?? $voucher->trang_thai,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật voucher thành công!',
                'data' => $voucher
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi cập nhật voucher: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Xóa voucher
     */
    public function destroy(Request $request)
    {
        $id_chuc_nang = 80; // Xóa voucher
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        $request->validate([
            'id' => 'required|integer|exists:vouchers,id',
        ]);

        try {
            $voucher = Voucher::findOrFail($request->id);

            // Kiểm tra nếu voucher đã được sử dụng thì không cho xóa
            if ($voucher->so_luong_da_su_dung > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không thể xóa voucher đã được sử dụng!'
                ], 400);
            }

            $voucher->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa voucher thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi xóa voucher: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Thay đổi trạng thái voucher
     */
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 81; // Thay đổi trạng thái voucher
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        $request->validate([
            'id' => 'required|integer|exists:vouchers,id',
            'trang_thai' => 'required|integer|in:0,1',
        ]);

        try {
            $voucher = Voucher::findOrFail($request->id);
            
            // Kiểm tra nếu voucher đã hết hạn
            if (Carbon::now() > $voucher->ngay_ket_thuc) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không thể kích hoạt voucher đã hết hạn!'
                ], 400);
            }

            $voucher->update([
                'trang_thai' => $request->trang_thai
            ]);

            return response()->json([
                'status' => true,
                'message' => $request->trang_thai == 1 ? 'Kích hoạt voucher thành công!' : 'Tạm dừng voucher thành công!',
                'data' => $voucher
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi thay đổi trạng thái voucher: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lấy thông tin voucher theo mã (cho client)
     */
    public function getByCode(Request $request)
    {
        try {
            $maVoucher = strtoupper($request->input('ma_voucher'));
            $tongTienGioHang = $request->input('tong_tien', 0); // Tổng tiền giỏ hàng để kiểm tra điều kiện

            $voucher = Voucher::where('ma_voucher', $maVoucher)->first();

            if (!$voucher) {
                return response()->json([
                    'status' => false,
                    'message' => 'Mã voucher không tồn tại!'
                ], 404);
            }

            // Kiểm tra trạng thái
            $now = Carbon::now();
            if ($voucher->trang_thai == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Voucher đang tạm dừng!'
                ], 400);
            }

            if ($voucher->ngay_bat_dau > $now) {
                return response()->json([
                    'status' => false,
                    'message' => 'Voucher chưa đến thời gian sử dụng!'
                ], 400);
            }

            if ($voucher->ngay_ket_thuc < $now) {
                return response()->json([
                    'status' => false,
                    'message' => 'Voucher đã hết hạn!'
                ], 400);
            }

            if ($voucher->so_luong_da_su_dung >= $voucher->so_luong) {
                return response()->json([
                    'status' => false,
                    'message' => 'Voucher đã hết lượt sử dụng!'
                ], 400);
            }

            // Kiểm tra giá trị đơn hàng tối thiểu
            if ($voucher->gia_tri_toi_thieu && $tongTienGioHang < $voucher->gia_tri_toi_thieu) {
                return response()->json([
                    'status' => false,
                    'message' => 'Đơn hàng phải có giá trị tối thiểu ' . number_format($voucher->gia_tri_toi_thieu, 0, ',', '.') . ' VNĐ để sử dụng voucher này!'
                ], 400);
            }

            // Tính toán số tiền giảm giá
            $tienGiamGia = 0;
            if ($voucher->loai_giam_gia == 1) {
                // Giảm theo phần trăm
                $tienGiamGia = ($tongTienGioHang * $voucher->gia_tri_giam) / 100;
                // Áp dụng giới hạn tối đa nếu có
                if ($voucher->gia_tri_toi_da && $tienGiamGia > $voucher->gia_tri_toi_da) {
                    $tienGiamGia = $voucher->gia_tri_toi_da;
                }
            } else {
                // Giảm theo số tiền cố định
                $tienGiamGia = $voucher->gia_tri_giam;
            }

            // Đảm bảo số tiền giảm không vượt quá tổng tiền
            if ($tienGiamGia > $tongTienGioHang) {
                $tienGiamGia = $tongTienGioHang;
            }

            return response()->json([
                'status' => true,
                'data' => $voucher,
                'tien_giam_gia' => round($tienGiamGia, 2),
                'tong_tien_sau_giam' => round($tongTienGioHang - $tienGiamGia, 2)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi kiểm tra voucher: ' . $e->getMessage()
            ], 500);
        }
    }
}

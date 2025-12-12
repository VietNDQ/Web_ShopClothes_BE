<?php

namespace App\Http\Controllers;

use App\Http\Requests\XacNhanDatHangRequest;
use App\Models\DonHang;
use App\Models\ThanhToan;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ThanhToanController extends Controller
{
    public function xacNhanDatHang(XacNhanDatHangRequest $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn chưa đăng nhập.'
            ], 401);
        }

        $donHangs = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 0)
            ->get();

        if ($donHangs->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Giỏ hàng trống, vui lòng thêm sản phẩm'
            ], 422);
        }

        $tong_tien_goc = $donHangs->sum(function ($item) {
            return $item->so_luong * $item->don_gia;
        });

        $ma_don_hang = 'DH - ' . strtoupper(Str::random(8));

        // Xử lý voucher nếu có
        $idVoucher = null;
        $maVoucher = null;
        $tienGiamGia = 0;
        $tongTienSauGiam = $tong_tien_goc;

        if ($request->ma_voucher) {
            $maVoucherInput = strtoupper($request->ma_voucher);
            $voucher = Voucher::where('ma_voucher', $maVoucherInput)->first();

            if ($voucher) {
                // Kiểm tra điều kiện voucher
                $now = Carbon::now();
                $isValid = true;
                $errorMessage = '';

                if ($voucher->trang_thai == 0) {
                    $isValid = false;
                    $errorMessage = 'Voucher đang tạm dừng!';
                } elseif ($voucher->ngay_bat_dau > $now) {
                    $isValid = false;
                    $errorMessage = 'Voucher chưa đến thời gian sử dụng!';
                } elseif ($voucher->ngay_ket_thuc < $now) {
                    $isValid = false;
                    $errorMessage = 'Voucher đã hết hạn!';
                } elseif ($voucher->so_luong_da_su_dung >= $voucher->so_luong) {
                    $isValid = false;
                    $errorMessage = 'Voucher đã hết lượt sử dụng!';
                } elseif ($voucher->gia_tri_toi_thieu && $tong_tien_goc < $voucher->gia_tri_toi_thieu) {
                    $isValid = false;
                    $errorMessage = 'Đơn hàng phải có giá trị tối thiểu ' . number_format($voucher->gia_tri_toi_thieu, 0, ',', '.') . ' VNĐ!';
                }

                if ($isValid) {
                    // Tính toán số tiền giảm giá
                    if ($voucher->loai_giam_gia == 1) {
                        // Giảm theo phần trăm
                        $tienGiamGia = ($tong_tien_goc * $voucher->gia_tri_giam) / 100;
                        // Áp dụng giới hạn tối đa nếu có
                        if ($voucher->gia_tri_toi_da && $tienGiamGia > $voucher->gia_tri_toi_da) {
                            $tienGiamGia = $voucher->gia_tri_toi_da;
                        }
                    } else {
                        // Giảm theo số tiền cố định
                        $tienGiamGia = $voucher->gia_tri_giam;
                    }

                    // Đảm bảo số tiền giảm không vượt quá tổng tiền
                    if ($tienGiamGia > $tong_tien_goc) {
                        $tienGiamGia = $tong_tien_goc;
                    }

                    $tongTienSauGiam = $tong_tien_goc - $tienGiamGia;
                    $idVoucher = $voucher->id;
                    $maVoucher = $voucher->ma_voucher;

                    // Tăng số lượng đã sử dụng
                    DB::beginTransaction();
                    try {
                        $voucher->increment('so_luong_da_su_dung');
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        return response()->json([
                            'status' => false,
                            'message' => 'Lỗi khi cập nhật voucher: ' . $e->getMessage()
                        ], 500);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => $errorMessage
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Mã voucher không tồn tại!'
                ], 404);
            }
        }

        DonHang::where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 0)
            ->update([
                'ma_don_hang' => $ma_don_hang,
                'tong_tien' => $tongTienSauGiam,
                'trang_thai' => 1, // Đã đặt, chờ xác nhận
            ]);

        ThanhToan::create([
            'ma_don_hang' => $ma_don_hang,
            'id_khach_hang' => $khachHang->id,
            'id_don_hang' => $donHangs->first()->id,
            'id_dia_chi_giao_hang' => $request->id_dia_chi_giao_hang,
            'id_voucher' => $idVoucher,
            'ma_voucher' => $maVoucher,
            'tong_tien' => $tongTienSauGiam,
            'tong_tien_goc' => $tong_tien_goc,
            'tien_giam_gia' => $tienGiamGia,
            'ghi_chu' => $request->ghi_chu ?? null,
            'phuong_thuc_thanh_toan' => $request->phuong_thuc_thanh_toan,
            'is_thanh_toan' => $request->phuong_thuc_thanh_toan == 1 ? 0 : 1, // COD: Chờ thanh toán, Chuyển khoản: Đã thanh toán
            'ngay_thanh_toan' => now(), // COD: null, Chuyển khoản: thời gian hiện tại
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đặt hàng thành công' . ($maVoucher ? ' với voucher ' . $maVoucher : ''),
            'ma_don_hang' => $ma_don_hang,
            'data' => [
                'ma_don_hang' => $ma_don_hang,
                'tong_tien_goc' => $tong_tien_goc,
                'tien_giam_gia' => $tienGiamGia,
                'tong_tien_sau_giam' => $tongTienSauGiam,
                'ma_voucher' => $maVoucher
            ]
        ], 200);
    }
}

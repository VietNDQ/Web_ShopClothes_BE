<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemDonHangRequest;
use App\Http\Requests\XacNhanNhanHangRequest;
use App\Models\BienTheSanPham;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function xacNhanNhanHang(XacNhanNhanHangRequest $request)
    {
        $khachHang = Auth::guard('sanctum')->user();

        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để xác nhận nhận hàng!'
            ], 401);
        }

        $donHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('id', $request->id)
            ->where('trang_thai', 3) // Chỉ cho phép xác nhận từ trạng thái "chờ giao hàng"
            ->first();

        if (!$donHang) {
            return response()->json([
                'status'  => false,
                'message' => 'Đơn hàng không tồn tại hoặc không ở trạng thái chờ giao hàng!'
            ], 404);
        }

        // Validation đã được xử lý trong XacNhanNhanHangRequest (chỉ nhận 4 hoặc 5)
        $donHang->trang_thai = $request->trang_thai;
        $donHang->save();

        return response()->json([
            'status'  => true,
            'message' => $request->trang_thai == 4
                ? 'Xác nhận đã nhận hàng thành công!'
                : 'Hệ thống đã ghi nhận bạn chưa nhận được hàng. Xin lỗi vì sự bất tiện!',
            'data'    => $donHang
        ]);
    }

    public function lichSuMuaHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để xem lịch sử mua hàng!'
            ], 401);
        }

        $lichSuMuaHang = DonHang::where('don_hangs.id_khach_hang', $khachHang->id)
            ->leftJoin('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
            ->leftJoin('hinh_anh_san_phams', function ($join) {
                $join->on('san_phams.id', '=', 'hinh_anh_san_phams.id_san_pham')
                    ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
            })
            ->leftJoin('thanh_toans', 'don_hangs.ma_don_hang', '=', 'thanh_toans.ma_don_hang')
            ->leftJoin('dia_chis', 'thanh_toans.id_dia_chi_giao_hang', '=', 'dia_chis.id')
            ->select(
                'don_hangs.id',
                'don_hangs.ma_don_hang',
                'don_hangs.id_san_pham',
                'don_hangs.so_luong',
                'don_hangs.don_gia',
                'don_hangs.tong_tien',
                'don_hangs.kich_thuoc',
                'don_hangs.mau_sac',
                'don_hangs.ghi_chu',
                'don_hangs.trang_thai',
                'san_phams.ten_san_pham',
                'hinh_anh_san_phams.url as image',
                'don_hangs.created_at',
                'dia_chis.so_dien_thoai',
                'dia_chis.ten_nguoi_nhan',
                'thanh_toans.ma_voucher',
                'thanh_toans.tong_tien_goc',
                'thanh_toans.tien_giam_gia'
            )
            ->where('don_hangs.trang_thai', '>', 0)
            ->orderBy('don_hangs.created_at', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $lichSuMuaHang
        ]);
    }
    public function destroyDonHang($id)
    {
        $khachHang = Auth::guard('sanctum')->user();

        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để thực hiện chức năng này.'
            ], 401);
        }
        $donHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 0)
            ->where('id', $id)
            ->delete();

        if ($donHang) {
            return response()->json([
                'status' => true,
                'message' => 'Đã xóa giỏ hàng thành công.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Không có đơn hàng nào để xóa.'
            ], 404);
        }
    }

    public function updateDonHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        
        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để thực hiện chức năng này.'
            ], 401);
        }

        // Validate request
        $request->validate([
            'id_don_hang' => 'required|integer|exists:don_hangs,id',
            'so_luong' => 'required|integer|min:1'
        ], [
            'id_don_hang.required' => 'ID đơn hàng không được để trống.',
            'id_don_hang.exists' => 'Đơn hàng không tồn tại.',
            'so_luong.required' => 'Số lượng không được để trống.',
            'so_luong.min' => 'Số lượng phải lớn hơn 0.'
        ]);

        // Tìm đơn hàng thuộc về khách hàng và ở trạng thái giỏ hàng (0)
        $donHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('id', $request->id_don_hang)
            ->where('trang_thai', 0)
            ->first();

        if (!$donHang) {
            return response()->json([
                'status'  => false,
                'message' => 'Đơn hàng không tồn tại hoặc không ở trạng thái giỏ hàng!'
            ], 404);
        }

        $soLuongCu = $donHang->so_luong;
        $soLuongMoi = (int)$request->so_luong;
        $soLuongThayDoi = $soLuongMoi - $soLuongCu;

        // Nếu số lượng không thay đổi, không cần làm gì
        if ($soLuongThayDoi == 0) {
            return response()->json([
                'status'  => true,
                'message' => 'Số lượng không thay đổi.'
            ]);
        }

        // Tìm biến thể sản phẩm để kiểm tra tồn kho
        $bienThe = BienTheSanPham::where('id_san_pham', $donHang->id_san_pham)
            ->where('size', $donHang->kich_thuoc)
            ->where('mau_sac', $donHang->mau_sac)
            ->lockForUpdate()
            ->first();

        if (!$bienThe) {
            return response()->json([
                'status'  => false,
                'message' => 'Biến thể sản phẩm không tồn tại!'
            ], 404);
        }

        DB::beginTransaction();
        try {
            // Nếu tăng số lượng: kiểm tra tồn kho
            if ($soLuongThayDoi > 0) {
                if ($soLuongMoi > $bienThe->so_luong + $soLuongCu) {
                    DB::rollBack();
                    return response()->json([
                        'status'  => false,
                        'message' => 'Số lượng sản phẩm vượt quá tồn kho (' . ($bienThe->so_luong + $soLuongCu) . ')!'
                    ], 400);
                }
                // Trừ tồn kho
                $bienThe->so_luong -= $soLuongThayDoi;
            } else {
                // Nếu giảm số lượng: trả lại tồn kho
                $bienThe->so_luong += abs($soLuongThayDoi);
            }

            // Cập nhật đơn hàng
            $donHang->so_luong = $soLuongMoi;
            $donHang->tong_tien = $soLuongMoi * $donHang->don_gia;
            $donHang->save();

            // Cập nhật tồn kho
            $bienThe->save();

            DB::commit();
            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật số lượng đơn hàng thành công.',
                'data'    => [
                    'id_don_hang' => $donHang->id,
                    'so_luong' => $donHang->so_luong,
                    'tong_tien' => $donHang->tong_tien,
                    'bien_the' => [
                        'id' => $bienThe->id,
                        'so_luong_ton_con_lai' => $bienThe->so_luong
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function themDonHang(ThemDonHangRequest $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        $idKhachHang = $khachHang->id;

        $sanPham = SanPham::find($request->id_san_pham);
        if (!$sanPham) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại!'
            ], 404);
        }

        // Tìm biến thể sản phẩm
        $bienThe = BienTheSanPham::where('id_san_pham', $request->id_san_pham)
            ->where('size', $request->kich_thuoc)
            ->where('mau_sac', $request->mau_sac)
            ->lockForUpdate()
            ->first();
        if (!$bienThe) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm đã bán hết. Vui lòng chọn sản phẩm khác.'
            ], 404);
        }

        // Lấy giá từ biến thể
        if (!$bienThe->gia || $bienThe->gia <= 0) {
            return response()->json([
                'status'  => false,
                'message' => 'Giá sản phẩm không hợp lệ!'
            ], 400);
        }
        $giaBan = $bienThe->gia;

        if ($request->so_luong <= 0) {
            return response()->json([
                'status'  => false,
                'message' => 'Số lượng sản phẩm phải lớn hơn 0!'
            ], 400);
        }
        if ($request->so_luong > $bienThe->so_luong) {
            return response()->json([
                'status'  => false,
                'message' => 'Số lượng sản phẩm vượt quá tồn kho (' . $bienThe->so_luong . ')!'
            ], 400);
        }

        DB::beginTransaction();
        try {
            $donHang = DonHang::where('id_khach_hang', $idKhachHang)
                ->where('id_san_pham', $request->id_san_pham)
                ->where('kich_thuoc', $request->kich_thuoc)
                ->where('mau_sac', $request->mau_sac)
                ->where('trang_thai', 0)
                ->select('id', 'so_luong', 'don_gia', 'tong_tien')
                ->lockForUpdate()
                ->first();

            if ($donHang) {
                $tongSoLuongMoi = $donHang->so_luong + $request->so_luong;
                if ($tongSoLuongMoi > $bienThe->so_luong) {
                    DB::rollBack();
                    return response()->json([
                        'status'  => false,
                        'message' => 'Tổng số lượng sản phẩm trong giỏ hàng vượt quá tồn kho (' . $bienThe->so_luong . ')!'
                    ], 400);
                }

                $donHang->so_luong = $tongSoLuongMoi;
                $donHang->don_gia = $giaBan;
                $donHang->tong_tien = $tongSoLuongMoi * $giaBan;
                $donHang->save();

                $bienThe->so_luong -= $request->so_luong;
                $bienThe->save();
            } else {
                $donHang = DonHang::create([
                    'id_khach_hang' => $idKhachHang,
                    'id_san_pham'   => $request->id_san_pham,
                    'so_luong'      => $request->so_luong,
                    'don_gia'       => $giaBan,
                    'tong_tien'     => $request->so_luong * $giaBan,
                    'kich_thuoc'    => $request->kich_thuoc,
                    'mau_sac'       => $request->mau_sac,
                    'trang_thai'    => 0,
                    'ghi_chu'       => $request->ghi_chu ?? null,
                ]);

                $bienThe->so_luong -= $request->so_luong;
                $bienThe->save();
            }

            DB::commit();
            return response()->json([
                'status'  => true,
                'message' => 'Thêm sản phẩm vào giỏ hàng thành công.',
                'data'    => [
                    'id_don_hang' => $donHang->id,
                    'so_luong' => $donHang->so_luong,
                    'tong_tien' => $donHang->tong_tien,
                    'bien_the' => [
                        'id' => $bienThe->id,
                        'mau_sac' => $bienThe->mau_sac,
                        'kich_thuoc' => $bienThe->size,
                        'so_luong_ton_con_lai' => $bienThe->so_luong
                    ],
                    'san_pham' => [
                        'id' => $sanPham->id,
                        'ten_san_pham' => $sanPham->ten_san_pham,
                        'gia_ban' => $giaBan
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function layDonHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'            => false,
                'message'           => 'Bạn cần đăng nhập để xem giỏ hàng!',
                'so_luong_don_hang' => 0,
                'tong_so_luong'     => 0,
                'tong_tien'         => 0,
                'data'              => []
            ], 401);
        }
        $donHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->join('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
            ->leftJoin('hinh_anh_san_phams', function ($join) {
                $join->on('san_phams.id', '=', 'hinh_anh_san_phams.id_san_pham')
                    ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
            })
            ->select(
                'don_hangs.id',
                'don_hangs.id_san_pham',
                'don_hangs.so_luong',
                'don_hangs.don_gia',
                'don_hangs.tong_tien',
                'don_hangs.kich_thuoc',
                'don_hangs.mau_sac',
                'don_hangs.ghi_chu',
                'san_phams.ten_san_pham',
                'hinh_anh_san_phams.url as image'
            )
            ->where('don_hangs.trang_thai', 0)
            ->get();

        $tongSoLuong = $donHang->count();
        $tongSoLuongSanPham = $donHang->sum('so_luong');
        $tongTien = $donHang->sum('tong_tien');

        return response()->json([
            'status'            => true,
            'so_luong_don_hang' => $tongSoLuong,
            'tong_so_luong'     => $tongSoLuongSanPham,
            'tong_tien'         => $tongTien,
            'data'              => $donHang
        ]);
    }

    public function getDonHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để xem đơn hàng!'
            ], 401);
        }

        $donHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->leftJoin('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
            ->leftJoin('hinh_anh_san_phams', function ($join) {
                $join->on('san_phams.id', '=', 'hinh_anh_san_phams.id_san_pham')
                    ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
            })
            ->select(
                'don_hangs.id',
                'don_hangs.ma_don_hang',
                'don_hangs.id_san_pham',
                'don_hangs.so_luong',
                'don_hangs.don_gia',
                'don_hangs.tong_tien',
                'don_hangs.kich_thuoc',
                'don_hangs.mau_sac',
                'don_hangs.ghi_chu',
                'don_hangs.trang_thai',
                'don_hangs.created_at',
                'san_phams.ten_san_pham',
                'hinh_anh_san_phams.url as image'
            )
            ->where('don_hangs.trang_thai', '>', 0)
            ->orderBy('don_hangs.created_at', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $donHang
        ]);
    }
}

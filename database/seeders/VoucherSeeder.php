<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy ID nhân viên đầu tiên (hoặc null nếu không có)
        $nhanVien = DB::table('nhan_viens')->first();
        $idNhanVien = $nhanVien ? $nhanVien->id : null;

        $now = Carbon::now();
        
        $vouchers = [
            // Voucher giảm phần trăm - đang hoạt động
            [
                'ma_voucher' => 'SALE10',
                'ten_voucher' => 'Giảm 10% cho đơn hàng',
                'mo_ta' => 'Áp dụng cho tất cả đơn hàng, giảm 10% tối đa 50.000đ',
                'loai_giam_gia' => 1, // Phần trăm
                'gia_tri_giam' => 10.00,
                'gia_tri_toi_thieu' => 100000.00,
                'gia_tri_toi_da' => 50000.00,
                'so_luong' => 500,
                'so_luong_da_su_dung' => 127,
                'ngay_bat_dau' => $now->copy()->subDays(30),
                'ngay_ket_thuc' => $now->copy()->addDays(30),
                'trang_thai' => 1, // Hoạt động
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(30),
                'updated_at' => $now->copy()->subDays(30),
            ],
            [
                'ma_voucher' => 'SALE20',
                'ten_voucher' => 'Giảm 20% cho đơn hàng',
                'mo_ta' => 'Áp dụng cho đơn hàng từ 200.000đ, giảm 20% tối đa 100.000đ',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 20.00,
                'gia_tri_toi_thieu' => 200000.00,
                'gia_tri_toi_da' => 100000.00,
                'so_luong' => 300,
                'so_luong_da_su_dung' => 89,
                'ngay_bat_dau' => $now->copy()->subDays(15),
                'ngay_ket_thuc' => $now->copy()->addDays(45),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(15),
                'updated_at' => $now->copy()->subDays(15),
            ],
            [
                'ma_voucher' => 'SALE50',
                'ten_voucher' => 'Giảm 50% cho đơn hàng',
                'mo_ta' => 'Áp dụng cho đơn hàng từ 500.000đ, giảm 50% tối đa 200.000đ',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 50.00,
                'gia_tri_toi_thieu' => 500000.00,
                'gia_tri_toi_da' => 200000.00,
                'so_luong' => 100,
                'so_luong_da_su_dung' => 23,
                'ngay_bat_dau' => $now->copy()->subDays(7),
                'ngay_ket_thuc' => $now->copy()->addDays(23),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(7),
                'updated_at' => $now->copy()->subDays(7),
            ],
            
            // Voucher giảm số tiền cố định - đang hoạt động
            [
                'ma_voucher' => 'FREESHIP',
                'ten_voucher' => 'Miễn phí vận chuyển',
                'mo_ta' => 'Giảm 30.000đ phí vận chuyển cho đơn hàng từ 100.000đ',
                'loai_giam_gia' => 2, // Số tiền cố định
                'gia_tri_giam' => 30000.00,
                'gia_tri_toi_thieu' => 100000.00,
                'gia_tri_toi_da' => null,
                'so_luong' => 1000,
                'so_luong_da_su_dung' => 456,
                'ngay_bat_dau' => $now->copy()->subDays(60),
                'ngay_ket_thuc' => $now->copy()->addDays(30),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(60),
                'updated_at' => $now->copy()->subDays(60),
            ],
            [
                'ma_voucher' => 'GIAM50K',
                'ten_voucher' => 'Giảm 50.000đ',
                'mo_ta' => 'Giảm ngay 50.000đ cho đơn hàng từ 300.000đ',
                'loai_giam_gia' => 2,
                'gia_tri_giam' => 50000.00,
                'gia_tri_toi_thieu' => 300000.00,
                'gia_tri_toi_da' => null,
                'so_luong' => 200,
                'so_luong_da_su_dung' => 67,
                'ngay_bat_dau' => $now->copy()->subDays(20),
                'ngay_ket_thuc' => $now->copy()->addDays(40),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(20),
                'updated_at' => $now->copy()->subDays(20),
            ],
            [
                'ma_voucher' => 'GIAM100K',
                'ten_voucher' => 'Giảm 100.000đ',
                'mo_ta' => 'Giảm ngay 100.000đ cho đơn hàng từ 500.000đ',
                'loai_giam_gia' => 2,
                'gia_tri_giam' => 100000.00,
                'gia_tri_toi_thieu' => 500000.00,
                'gia_tri_toi_da' => null,
                'so_luong' => 150,
                'so_luong_da_su_dung' => 34,
                'ngay_bat_dau' => $now->copy()->subDays(10),
                'ngay_ket_thuc' => $now->copy()->addDays(50),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(10),
                'updated_at' => $now->copy()->subDays(10),
            ],
            
            // Voucher tạm dừng
            [
                'ma_voucher' => 'PAUSE20',
                'ten_voucher' => 'Giảm 20% (Tạm dừng)',
                'mo_ta' => 'Voucher đang tạm dừng',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 20.00,
                'gia_tri_toi_thieu' => 150000.00,
                'gia_tri_toi_da' => 80000.00,
                'so_luong' => 200,
                'so_luong_da_su_dung' => 45,
                'ngay_bat_dau' => $now->copy()->subDays(5),
                'ngay_ket_thuc' => $now->copy()->addDays(25),
                'trang_thai' => 0, // Tạm dừng
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now->copy()->subDays(2),
            ],
            
            // Voucher sắp hết hạn
            [
                'ma_voucher' => 'LASTCHANCE',
                'ten_voucher' => 'Cơ hội cuối - Giảm 15%',
                'mo_ta' => 'Áp dụng cho đơn hàng từ 150.000đ, chỉ còn 3 ngày',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 15.00,
                'gia_tri_toi_thieu' => 150000.00,
                'gia_tri_toi_da' => 75000.00,
                'so_luong' => 100,
                'so_luong_da_su_dung' => 78,
                'ngay_bat_dau' => $now->copy()->subDays(27),
                'ngay_ket_thuc' => $now->copy()->addDays(3),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(27),
                'updated_at' => $now->copy()->subDays(27),
            ],
            
            // Voucher mới tạo - chưa bắt đầu
            [
                'ma_voucher' => 'NEWYEAR2026',
                'ten_voucher' => 'Chào năm mới 2026',
                'mo_ta' => 'Giảm 25% cho đơn hàng từ 300.000đ, áp dụng từ 1/1/2026',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 25.00,
                'gia_tri_toi_thieu' => 300000.00,
                'gia_tri_toi_da' => 150000.00,
                'so_luong' => 500,
                'so_luong_da_su_dung' => 0,
                'ngay_bat_dau' => Carbon::create(2026, 1, 1, 0, 0, 0),
                'ngay_ket_thuc' => Carbon::create(2026, 1, 31, 23, 59, 59),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Voucher đã hết hạn
            [
                'ma_voucher' => 'EXPIRED30',
                'ten_voucher' => 'Giảm 30% (Đã hết hạn)',
                'mo_ta' => 'Voucher đã hết hạn',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 30.00,
                'gia_tri_toi_thieu' => 200000.00,
                'gia_tri_toi_da' => 120000.00,
                'so_luong' => 100,
                'so_luong_da_su_dung' => 65,
                'ngay_bat_dau' => $now->copy()->subDays(60),
                'ngay_ket_thuc' => $now->copy()->subDays(10),
                'trang_thai' => 2, // Hết hạn
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(60),
                'updated_at' => $now->copy()->subDays(10),
            ],
            
            // Voucher đặc biệt - giảm nhiều
            [
                'ma_voucher' => 'VIP100K',
                'ten_voucher' => 'Voucher VIP - Giảm 100.000đ',
                'mo_ta' => 'Dành cho khách hàng VIP, giảm 100.000đ cho đơn hàng từ 1.000.000đ',
                'loai_giam_gia' => 2,
                'gia_tri_giam' => 100000.00,
                'gia_tri_toi_thieu' => 1000000.00,
                'gia_tri_toi_da' => null,
                'so_luong' => 50,
                'so_luong_da_su_dung' => 12,
                'ngay_bat_dau' => $now->copy()->subDays(14),
                'ngay_ket_thuc' => $now->copy()->addDays(46),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(14),
                'updated_at' => $now->copy()->subDays(14),
            ],
            
            // Voucher giảm phần trăm không giới hạn
            [
                'ma_voucher' => 'SALE30',
                'ten_voucher' => 'Giảm 30% không giới hạn',
                'mo_ta' => 'Giảm 30% cho đơn hàng từ 250.000đ, không giới hạn giá trị giảm',
                'loai_giam_gia' => 1,
                'gia_tri_giam' => 30.00,
                'gia_tri_toi_thieu' => 250000.00,
                'gia_tri_toi_da' => null,
                'so_luong' => 400,
                'so_luong_da_su_dung' => 156,
                'ngay_bat_dau' => $now->copy()->subDays(25),
                'ngay_ket_thuc' => $now->copy()->addDays(35),
                'trang_thai' => 1,
                'id_nhan_vien' => $idNhanVien,
                'created_at' => $now->copy()->subDays(25),
                'updated_at' => $now->copy()->subDays(25),
            ],
        ];

        DB::table('vouchers')->insert($vouchers);

        $this->command->info('Đã tạo ' . count($vouchers) . ' voucher thành công!');
    }
}

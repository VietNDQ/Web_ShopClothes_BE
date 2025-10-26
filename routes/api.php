<?php

use App\Http\Controllers\BienTheController;
use App\Http\Controllers\BienTheSanPhamController;
use App\Http\Controllers\ChiTietPhanQuyenController;
use App\Http\Controllers\ChiTietSanPhamController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\DiaChiKhachHangController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SanPhamShopController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\ThươngHieuController;
use App\Http\Middleware\CheckKhachHangMiddlware;
use App\Http\Middleware\NhanVienMiddleware;
use App\Models\BienTheSanPham;
use App\Models\ThuongHieu;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// -----------------------------------------------------------------------------------------------------
// ------------------------------------------ADMIN-------------------------------------------------
// -----------------------------------------------------------------------------------------------------
Route::post('/admin/dang-nhap', [NhanVienController::class, 'login']);
Route::get('/admin/check-token', [NhanVienController::class, 'checkToken']);
Route::get('/admin/logout', [NhanVienController::class, 'logOut']);
Route::post('/admin/phan-quyen/chuc-nang-nhan-vien', [ChucNangController::class, 'getChucNangTheoNhanVien'])->middleware('nhanVienMiddle');

//Chat Box
    Route::get('/chat-box/get-messages', [MessagesController::class, 'getMessages']);
    Route::post('/chat-box/send-message', [MessagesController::class, 'sendMessage']);

//Nhân viên
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::get('/admin/nhan-vien/data', [NhanVienController::class, 'getData']);
    Route::post('/admin/nhan-vien/create', [NhanVienController::class, 'store']);
    Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'update']);
    Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'destroy']);
    Route::post('/admin/nhan-vien/search', [NhanVienController::class, 'search']);
    Route::post('/admin/nhan-vien/change-status', [NhanVienController::class, 'changeStatus']);
    // Đơn hàng
    Route::get('/admin/nhan-vien/get-don-hang', [NhanVienController::class, 'getDonHang']);
    Route::post('/admin/nhan-vien/xac-nhan-don-hang', [NhanVienController::class, 'xacNhanDonHang']);
});
//Khách hàng
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::post('/admin/khach-hang/create', [KhachHangController::class, 'store']);
    Route::get('/admin/khach-hang/data', [KhachHangController::class, 'getData']);
    Route::post('/admin/khach-hang/update', [KhachHangController::class, 'update']);
    Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'destroy']);
    Route::post('/admin/khach-hang/search', [KhachHangController::class, 'search']);
    Route::post('/admin/khach-hang/change-status', [KhachHangController::class, 'changeStatus']);
});
//Danh mục
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::get('/admin/danh-muc/data', [DanhMucController::class, 'getData']);
    Route::post('/admin/danh-muc/create', [DanhMucController::class, 'store']);
    Route::post('/admin/danh-muc/update', [DanhMucController::class, 'update']);
    Route::post('/admin/danh-muc/delete', [DanhMucController::class, 'destroy']);
    Route::post('/admin/danh-muc/search', [DanhMucController::class, 'search']);
    Route::post('/admin/danh-muc/change-status', [DanhMucController::class, 'changeStatus']);
    Route::get('/admin/danh-muc/data-open', [DanhMucController::class, 'getOpenData']);
});
//Phân quyền
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::get('/admin/chuc-nang/get-data', [ChucNangController::class, 'getData']);

    Route::get('/admin/chuc-vu/get-data', [PhanQuyenController::class, 'getData']);
    Route::post('/admin/chuc-vu/delete', [PhanQuyenController::class, 'destroy']);
    Route::post('/admin/chuc-vu/update', [PhanQuyenController::class, 'update']);
    Route::post('/admin/chuc-vu/add-data', [PhanQuyenController::class, 'store']);
    Route::post('/admin/chuc-vu/change-status', [PhanQuyenController::class, 'changeStatus']);
    Route::post('/admin/chuc-vu/search', [PhanQuyenController::class, 'search']);

    Route::post('/admin/chi-tiet-phan-quyen/create', [ChiTietPhanQuyenController::class, 'store']);
    Route::post('/admin/chi-tiet-phan-quyen/data', [ChiTietPhanQuyenController::class, 'getData']);
    Route::post('/admin/chi-tiet-phan-quyen/delete', [ChiTietPhanQuyenController::class, 'xoaChiTietQuyen']);
});
//Thương hiệu
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::get('/admin/thuong-hieu/data', [ThươngHieuController::class, 'getData']);
    Route::post('/admin/thuong-hieu/create', [ThươngHieuController::class, 'store']);
    Route::post('/admin/thuong-hieu/update', [ThươngHieuController::class, 'update']);
    Route::post('/admin/thuong-hieu/delete', [ThươngHieuController::class, 'destroy']);
    Route::post('/admin/thuong-hieu/search', [ThươngHieuController::class, 'search']);
    Route::post('/admin/thuong-hieu/change-status', [ThươngHieuController::class, 'changeStatus']);
    Route::get('/admin/thuong-hieu/data-open', [ThươngHieuController::class, 'getOpenData']);
});
//Tới đây rồi
//Sản phẩm
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::post('/admin/san-pham/create', [SanPhamShopController::class, 'store']);
    Route::get('/admin/san-pham/data', [SanPhamShopController::class, 'getData']);
    Route::post('/admin/san-pham/update', [SanPhamShopController::class, 'update']);
    Route::post('/admin/san-pham/delete', [SanPhamShopController::class, 'destroy']);
    Route::post('/admin/san-pham/search', [SanPhamShopController::class, 'search']);
    Route::post('/admin/san-pham/change-status', [SanPhamShopController::class, 'changeStatus']);
});
//Biến thể
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::post('/admin/bien-the-san-pham/create', [BienTheSanPhamController::class, 'store']);
    Route::get('/admin/bien-the-san-pham/data', [BienTheSanPhamController::class, 'getData']);
    Route::post('/admin/bien-the-san-pham/update', [BienTheSanPhamController::class, 'update']);
    Route::post('/admin/bien-the-san-pham/delete', [BienTheSanPhamController::class, 'destroy']);
    Route::post('/admin/bien-the-san-pham/search', [BienTheSanPhamController::class, 'search']);
    Route::post('/admin/bien-the-san-pham/change-status', [BienTheSanPhamController::class, 'changeStatus']);
});
//Hình ảnh
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::get('/admin/hinh-anh/data', [SanPhamShopController::class, 'getHinhAnh']);
    Route::post('/admin/chi-tiet-hinh-anh/data', [SanPhamShopController::class, 'getChiTietHinhAnh']);
    Route::post('/admin/hinh-anh/create', [SanPhamShopController::class, 'storeHinhAnh']);
    Route::post('/admin/hinh-anh/delete', [SanPhamShopController::class, 'destroyHinhAnh']);
    Route::post('/admin/hinh-anh/search', [SanPhamShopController::class, 'searchHinhAnh']);
});
Route::middleware(NhanVienMiddleware::class)->group(function () {
    //Tỉnh thành
    Route::get('/admin/tinh-thanh/data', [DiaChiController::class, 'getDataTinhThanh']);
    Route::post('/admin/tinh-thanh/create', [DiaChiController::class, 'storeTinhThanh']);
    Route::post('/admin/tinh-thanh/update', [DiaChiController::class, 'updateTinhThanh']);
    Route::post('/admin/tinh-thanh/delete', [DiaChiController::class, 'destroyTinhThanh']);
    Route::post('/admin/tinh-thanh/search', [DiaChiController::class, 'searchTinhThanh']);
    //Quận huyện
    Route::post('/admin/quan-huyen/create', [DiaChiController::class, 'storeQuanHuyen']);
    Route::post('/admin/quan-huyen/update', [DiaChiController::class, 'updateQuanHuyen']);
    Route::post('/admin/quan-huyen/delete', [DiaChiController::class, 'destroyQuanHuyen']);
    Route::post('/admin/quan-huyen/data', [DiaChiController::class, 'getDataQuanHuyen']);
    Route::post('/admin/quan-huyen/search', [DiaChiController::class, 'searchQuanHuyen']);
    //Phường Xã
    Route::post('/admin/phuong-xa/create', [DiaChiController::class, 'storePhuongXa']);
    Route::post('/admin/phuong-xa/update', [DiaChiController::class, 'updatePhuongXa']);
    Route::post('/admin/phuong-xa/delete', [DiaChiController::class, 'destroyPhuongXa']);
    Route::post('/admin/phuong-xa/data', [DiaChiController::class, 'getDataPhuongXa']);
    Route::post('/admin/phuong-xa/search', [DiaChiController::class, 'searchPhuongXa']);
});

// -----------------------------------------------------------------------------------------------------
// ------------------------------------------CLIENT HOME PAGE-------------------------------------------
// -----------------------------------------------------------------------------------------------------
Route::get('/home-page/san-pham/data-open', [SanPhamShopController::class, 'getOpenData']);
Route::get('/home-page/san-pham/chi-tiet-san-pham/{id}', [ChiTietSanPhamController::class, 'chiTietSanPham']);
Route::get('/home-page/san-pham/cung-danh-muc', [ChiTietSanPhamController::class, 'cungDanhMuc']);

// -----------------------------------------------------------------------------------------------------
// --------------------------------------------KHACH HANG-----------------------------------------------
// -----------------------------------------------------------------------------------------------------
Route::get('/khach-hang/check-token', [KhachHangController::class, 'checkToken']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'login']);
Route::get('/khach-hang/logout', [KhachHangController::class, 'logOut']);
Route::post('/khach-hang/login-google', [KhachHangController::class, 'loginGoogle']);

Route::get('/khach-hang/lay-thong-tin-profile', [KhachHangController::class, 'layThongTin'])->middleware('khachHangMiddle');
//Địa chỉ
Route::get('/khach-hang/dia-chi/get-tinh-thanh', [KhachHangController::class, 'getDataTinhThanh']);
Route::post('/khach-hang/dia-chi/get-quan-huyen', [KhachHangController::class, 'getDataQuanHuyen']);
Route::post('/khach-hang/dia-chi/get-phuong-xa', [KhachHangController::class, 'getDataPhuongXa']);
Route::post('/khach-hang/dia-chi/create', [KhachHangController::class, 'storeDiaChi'])->middleware('khachHangMiddle');
Route::post('/khach-hang/dia-chi/update', [KhachHangController::class, 'updateDiaChi'])->middleware('khachHangMiddle');
Route::post('/khach-hang/dia-chi/delete', [KhachHangController::class, 'destroyDiaChi'])->middleware('khachHangMiddle');
Route::get('/khach-hang/dia-chi/get-data', [KhachHangController::class, 'getDataDiaChi'])->middleware('khachHangMiddle');

//Đặt hàng
Route::post('/khach-hang/them-don-hang', [DonHangController::class, 'themDonHang'])->middleware('khachHangMiddle');
Route::post('/khach-hang/get-data-don-hang', [DonHangController::class, 'layDonHang'])->middleware('khachHangMiddle');
Route::post('/khach-hang/delete-don-hang/{id}', [DonHangController::class, 'destroyDonHang'])->middleware('khachHangMiddle');
Route::post('/khach-hang/xac-nhan-dat-hang', [ThanhToanController::class, 'xacNhanDatHang'])->middleware('khachHangMiddle');
Route::get('/khach-hang/get-don-hang', [DonHangController::class, 'getDonHang'])->middleware('khachHangMiddle');
Route::post('/khach-hang/lich-su-mua-hang', [DonHangController::class, 'lichSuMuaHang'])->middleware('khachHangMiddle');
Route::post('/khach-hang/xac-nhan-nhan-hang', [DonHangController::class, 'xacNhanNhanHang'])->middleware('khachHangMiddle');

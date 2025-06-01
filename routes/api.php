<?php

use App\Http\Controllers\BienTheController;
use App\Http\Controllers\BienTheSanPhamController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\DiaChiKhachHangController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SanPhamShopController;
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
//Nhân viên
Route::middleware(NhanVienMiddleware::class)->group(function () {
    Route::get('/admin/nhan-vien/data', [NhanVienController::class, 'getData']);
    Route::post('/admin/nhan-vien/create', [NhanVienController::class, 'store']);
    Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'update']);
    Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'destroy']);
    Route::post('/admin/nhan-vien/search', [NhanVienController::class, 'search']);
    Route::post('/admin/nhan-vien/change-status', [NhanVienController::class, 'changeStatus']);
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

Route::middleware(NhanVienMiddleware::class)->group(function () {});
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
//Tỉnh thành
//Quận Huyện
//Phường Xã

// -----------------------------------------------------------------------------------------------------
// ------------------------------------------CLIENT HOME PAGE-------------------------------------------
// -----------------------------------------------------------------------------------------------------
Route::get('/home-page/san-pham/data-open', [SanPhamShopController::class, 'getOpenData']);
Route::get('/home-page/san-pham/chi-tiet-san-pham/{id}', [SanPhamShopController::class, 'chiTietSanPham']);
Route::get('/home-page/san-pham/cung-danh-muc', [SanPhamShopController::class, 'cungDanhMuc']);


// -----------------------------------------------------------------------------------------------------
// --------------------------------------------KHACH HANG-----------------------------------------------
// -----------------------------------------------------------------------------------------------------
Route::get('/khach-hang/check-token', [KhachHangController::class, 'checkToken']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'login']);
Route::get('/khach-hang/logout', [KhachHangController::class, 'logOut']);
Route::post('/khach-hang/login-google', [KhachHangController::class, 'loginGoogle']);

Route::get('/khach-hang/lay-thong-tin-profile', [KhachHangController::class, 'layThongTin'])->middleware('khachHangMiddle');
//Địa chỉ
Route::get('/khach-hang/dia-chi/get-tinh-thanh',[KhachHangController::class, 'getDataTinhThanh']);
Route::post('/khach-hang/dia-chi/get-quan-huyen',[KhachHangController::class, 'getDataQuanHuyen']);
Route::post('/khach-hang/dia-chi/get-phuong-xa',[KhachHangController::class, 'getDataPhuongXa']);
Route::post('/khach-hang/dia-chi/create',[KhachHangController::class, 'storeDiaChi'])->middleware('khachHangMiddle');
Route::post('/khach-hang/dia-chi/update',[KhachHangController::class, 'updateDiaChi'])->middleware('khachHangMiddle');
Route::post('/khach-hang/dia-chi/delete',[KhachHangController::class, 'destroyDiaChi'])->middleware('khachHangMiddle');
Route::get('/khach-hang/dia-chi/get-data',[KhachHangController::class, 'getDataDiaChi'])->middleware('khachHangMiddle');

//Đặt hàng
Route::post('/khach-hang/them-gio-hang',[DonHangController::class, 'addProduct']);

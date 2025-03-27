<?php

use App\Http\Controllers\BienTheController;
use App\Http\Controllers\BienTheSanPhamController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SanPhamShopController;
use App\Http\Controllers\ThươngHieuController;
use App\Models\BienTheSanPham;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/admin/khach-hang/create',[KhachHangController::class,'store']);
Route::get('/admin/khach-hang/data',[KhachHangController::class,'getData']);
Route::post('/admin/khach-hang/update',[KhachHangController::class,'update']);
Route::post('/admin/khach-hang/delete',[KhachHangController::class,'destroy']);
Route::post('/admin/khach-hang/search',[KhachHangController::class,'search']);
Route::post('/admin/khach-hang/change-status',[KhachHangController::class,'changeStatus']);

Route::get('/admin/danh-muc/data',[DanhMucController::class,'getData']);
Route::post('/admin/danh-muc/create',[DanhMucController::class,'store']);
Route::post('/admin/danh-muc/update',[DanhMucController::class,'update']);
Route::post('/admin/danh-muc/delete',[DanhMucController::class,'destroy']);
Route::post('/admin/danh-muc/search',[DanhMucController::class,'search']);
Route::post('/admin/danh-muc/change-status',[DanhMucController::class,'changeStatus']);
Route::get('/admin/danh-muc/data-open',[DanhMucController::class,'getOpenData']);

Route::get('/admin/thuong-hieu/data',[ThươngHieuController::class,'getData']);
Route::post('/admin/thuong-hieu/create',[ThươngHieuController::class,'store']);
Route::post('/admin/thuong-hieu/update',[ThươngHieuController::class,'update']);
Route::post('/admin/thuong-hieu/delete',[ThươngHieuController::class,'destroy']);
Route::post('/admin/thuong-hieu/search',[ThươngHieuController::class,'search']);
Route::post('/admin/thuong-hieu/change-status',[ThươngHieuController::class,'changeStatus']);
Route::get('/admin/thuong-hieu/data-open',[ThươngHieuController::class,'getOpenData']);


Route::post('/admin/san-pham/create',[SanPhamShopController::class,'store']);
Route::get('/admin/san-pham/data',[SanPhamShopController::class,'getData']);
Route::post('/admin/san-pham/update',[SanPhamShopController::class,'update']);
Route::post('/admin/san-pham/delete',[SanPhamShopController::class,'destroy']);
Route::post('/admin/san-pham/search',[SanPhamShopController::class,'search']);
Route::post('/admin/san-pham/change-status',[SanPhamShopController::class,'changeStatus']);
Route::get('/admin/san-pham/data-open',[SanPhamShopController::class,'getOpenData']);

Route::post('/admin/bien-the-san-pham/create',[BienTheSanPhamController::class,'store']);
Route::get('/admin/bien-the-san-pham/data',[BienTheSanPhamController::class,'getData']);
Route::post('/admin/bien-the-san-pham/update',[BienTheSanPhamController::class,'update']);
Route::post('/admin/bien-the-san-pham/delete',[BienTheSanPhamController::class,'destroy']);
Route::post('/admin/bien-the-san-pham/search',[BienTheSanPhamController::class,'search']);
Route::post('/admin/bien-the-san-pham/change-status',[BienTheSanPhamController::class,'changeStatus']);



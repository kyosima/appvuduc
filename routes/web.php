<?php

use App\Admin\Controllers\CalculationUnitController;
use App\Admin\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* --------------------------------PAGE ADMIN-------------------------- */


Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/ca-nhan', function () {
    return view('admin.ca-nhan');
});

Route::get('/admin/cau-hinh-khuyen-mai', function () {
    return view('admin.cau-hinh-khuyen-mai');
});

Route::get('/admin/dang-nhap', function () {
    return view('admin.dang-nhap');
});

Route::get('/admin/doi-nhom', function () {
    return view('admin.doi-nhom');
});

Route::get('/admin/don-hang-cnpp', function () {
    return view('admin.don-hang-cnpp');
});

Route::get('/admin/don-hang-dai-ly', function () {
    return view('admin.don-hang-dai-ly');
});

Route::get('/admin/don-hang-doi-thu-dai-ly', function () {
    return view('admin.don-hang-doi-thu-dai-ly');
});

Route::get('/admin/don-hang-tra-chi-nhanh-npp', function () {
    return view('admin.don-hang-tra-chi-nhanh-npp');
});

Route::get('/admin/don-hang-tra-dai-ly', function () {
    return view('admin.don-hang-tra-dai-ly');
});

// Route::get('/admin/don-vi-tinh', function () {
//     return view('admin.don-vi-tinh');
// });

// ĐƠN VỊ TÍNH
Route::get('/admin/don-vi-tinh', [CalculationUnitController::class, 'index'])->name('don-vi-tinh.index');
Route::get('/admin/don-vi-tinh/modal-edit', [CalculationUnitController::class, 'modalEdit'])->name('don-vi-tinh.modalEdit');
Route::post('/admin/don-vi-tinh', [CalculationUnitController::class, 'store'])->name('don-vi-tinh.store');
Route::put('/admin/don-vi-tinh/update/{id}', [CalculationUnitController::class, 'update'])->name('don-vi-tinh.update');
Route::put('/admin/don-vi-tinh/{id}', [CalculationUnitController::class, 'updateStatus'])->name('don-vi-tinh.updateStatus');
Route::delete('/admin/don-vi-tinh/{id}', [CalculationUnitController::class, 'destroy'])->name('don-vi-tinh.delete');


Route::get('/admin/ket-qua-dao-tao', function () {
    return view('admin.ket-qua-dao-tao');
});

Route::get('/admin/loai-khuyen-mai', function () {
    return view('admin.loai-khuyen-mai');
});

// PRODUCT CATEGORIES
Route::get('/admin/nganh-nhom-hang', [ProductCategoryController::class, 'index'])->name('nganh-nhom-hang.index');
Route::post('/admin/nganh-nhom-hang', [ProductCategoryController::class, 'store'])->name('nganh-nhom-hang.store');



Route::get('/admin/san-pham', function () {
    return view('admin.san-pham');
});

Route::get('/admin/thong-tin-ban-hang', function () {
    return view('admin.thong-tin-ban-hang');
});

Route::get('/admin/ton-kho-CNNPP', function () {
    return view('admin.ton-kho-CNNPP');
});

Route::get('/admin/ton-kho-dai-ly', function () {
    return view('admin.ton-kho-dai-ly');
});

//------------------------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('home');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/chitiet-baiviet', function () {
    return view('chitiet-baiviet');
});

Route::get('/chitiet-sanpham', function () {
    return view('chitiet-sanpham');
});

Route::get('/dangky', function () {
    return view('dangky');
});

Route::get('/dangnhap', function () {
    return view('dangnhap');
});

Route::get('/gioi-thieu', function () {
    return view('gioi-thieu');
});

Route::get('/lien-he', function () {
    return view('lien-he');
});

Route::get('/san-pham', function () {
    return view('san-pham');
});

Route::get('/thongtin', function () {
    return view('thongtin');
});
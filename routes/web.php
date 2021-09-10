<?php

use App\Admin\Controllers\BrandController;
use App\Admin\Controllers\CalculationUnitController;
use App\Admin\Controllers\ProductCategoryController;
use App\Admin\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicProductCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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




Route::get('/admin/ket-qua-dao-tao', function () {
    return view('admin.ket-qua-dao-tao');
});

Route::get('/admin/loai-khuyen-mai', function () {
    return view('admin.loai-khuyen-mai');
});

Route::prefix('admin')->group(function () {
    // ĐƠN VỊ TÍNH
    Route::get('/don-vi-tinh', [CalculationUnitController::class, 'index'])->name('don-vi-tinh.index');
    Route::get('/don-vi-tinh/modal-edit', [CalculationUnitController::class, 'modalEdit'])->name('don-vi-tinh.modalEdit');
    Route::post('/don-vi-tinh', [CalculationUnitController::class, 'store'])->name('don-vi-tinh.store');
    Route::put('/don-vi-tinh/update/{id}', [CalculationUnitController::class, 'update'])->name('don-vi-tinh.update');
    Route::put('/don-vi-tinh/{id}', [CalculationUnitController::class, 'updateStatus'])->name('don-vi-tinh.updateStatus');
    Route::delete('/don-vi-tinh/{id}', [CalculationUnitController::class, 'destroy'])->name('don-vi-tinh.delete');

    // PRODUCT CATEGORIES
    Route::get('/nganh-nhom-hang', [ProductCategoryController::class, 'index'])->name('nganh-nhom-hang.index');
    Route::post('/nganh-nhom-hang', [ProductCategoryController::class, 'store'])->name('nganh-nhom-hang.store');
    Route::get('/nganh-nhom-hang/modal-edit', [ProductCategoryController::class, 'modalEdit'])->name('nganh-nhom-hang.modalEdit');
    Route::put('/nganh-nhom-hang/update/{id}', [ProductCategoryController::class, 'update'])->name('nganh-nhom-hang.update');
    Route::put('/nganh-nhom-hang/{id}', [ProductCategoryController::class, 'updateStatus'])->name('nganh-nhom-hang.updateStatus');
    Route::delete('/nganh-nhom-hang/{id}', [ProductCategoryController::class, 'destroy'])->name('nganh-nhom-hang.delete');
    Route::get('/nganh-nhom-hang/get-category', [ProductCategoryController::class, 'getCategory'])->name('nganh-nhom-hang.getCategory');


    // PRODUCT
    Route::get('/san-pham', [ProductController::class, 'index'])->name('san-pham.index');
    Route::get('/tao-san-pham', [ProductController::class, 'create'])->name('san-pham.create');
    Route::post('/san-pham', [ProductController::class, 'store'])->name('san-pham.store');
    Route::get('/san-pham/edit/{id}', [ProductController::class, 'edit'])->name('san-pham.edit');
    Route::put('/san-pham/update/{id}', [ProductController::class, 'update'])->name('san-pham.update');
    Route::delete('/san-pham/delete/{id}', [ProductController::class, 'destroy'])->name('san-pham.delete');
    Route::get('/san-pham/get-category', [ProductController::class, 'getCategory'])->name('san-pham.getCategory');

    // BRAND
    Route::get('/thuong-hieu', [BrandController::class, 'index'])->name('thuong-hieu.index');
    Route::get('/thuong-hieu/modal-edit', [BrandController::class, 'modalEdit'])->name('thuong-hieu.modalEdit');
    Route::post('/thuong-hieu', [BrandController::class, 'store'])->name('thuong-hieu.store');
    Route::put('/thuong-hieu/update/{id}', [BrandController::class, 'update'])->name('thuong-hieu.update');
    Route::put('/thuong-hieu/{id}', [BrandController::class, 'updateStatus'])->name('thuong-hieu.updateStatus');
    Route::delete('/thuong-hieu/{id}', [BrandController::class, 'destroy'])->name('thuong-hieu.delete');

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
})->name('home');

Route::resources([
    'san-pham' => PublicProductController::class,
    'danh-muc' => PublicProductCategoryController::class,
]);

Route::prefix('gio-hang')->group(function () {
    Route::get('/', [CartController::Class, 'index'])->name('cart.index');
    Route::post('add', [CartController::Class, 'addCart'])->name('cart.add');
    Route::post('update', [CartController::Class, 'updateCart'])->name('cart.update');
    Route::post('delete', [CartController::Class, 'deleteCart'])->name('cart.delete');
});

Route::prefix('thanh-toan')->group(function () {
    Route::get('/', [CheckoutController::Class, 'index'])->name('checkout.index');

});

Route::get('/tim-kiem-san-pham', [PublicProductController::class, 'searchProduct'])->name('tim-kiem-san-pham');
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


Route::get('/thongtin', function () {
    return view('thongtin');
});

<?php

use App\Admin\Controllers\BlogCategoryController;
use App\Admin\Controllers\BlogController;
use App\Admin\Controllers\BrandController;
use App\Admin\Controllers\CalculationUnitController;
use App\Admin\Controllers\ProductCategoryController;
use App\Admin\Controllers\ProductController;
use App\Admin\Controllers\WarehouseController;
use App\Http\Controllers\PublicProductController;
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




Route::get('/admin/ket-qua-dao-tao', function () {
    return view('admin.ket-qua-dao-tao');
});

Route::get('/admin/loai-khuyen-mai', function () {
    return view('admin.loai-khuyen-mai');
});

Route::prefix('admin')->group(function () {
    // ĐƠN VỊ TÍNH
    Route::get('/don-vi-tinh', [CalculationUnitController::class, 'index'])->name('don-vi-tinh.index');
    Route::get('/don-vi-tinh/getDatatable', [CalculationUnitController::class, 'indexDatatable'])->name('don-vi-tinh.indexDatatable');
    Route::get('/don-vi-tinh/modal-edit', [CalculationUnitController::class, 'modalEdit'])->name('don-vi-tinh.modalEdit');
    Route::post('/don-vi-tinh', [CalculationUnitController::class, 'store'])->name('don-vi-tinh.store');
    Route::put('/don-vi-tinh/update', [CalculationUnitController::class, 'update'])->name('don-vi-tinh.update');
    Route::put('/don-vi-tinh', [CalculationUnitController::class, 'updateStatus'])->name('don-vi-tinh.updateStatus');
    Route::delete('/don-vi-tinh', [CalculationUnitController::class, 'destroy'])->name('don-vi-tinh.delete');

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
    Route::get('/thuong-hieu/getDatatable', [BrandController::class, 'indexDatatable'])->name('thuong-hieu.indexDatatable');
    Route::get('/thuong-hieu/modal-edit', [BrandController::class, 'modalEdit'])->name('thuong-hieu.modalEdit');
    Route::post('/thuong-hieu', [BrandController::class, 'store'])->name('thuong-hieu.store');
    Route::put('/thuong-hieu/update', [BrandController::class, 'update'])->name('thuong-hieu.update');
    Route::put('/thuong-hieu', [BrandController::class, 'updateStatus'])->name('thuong-hieu.updateStatus');
    Route::delete('/thuong-hieu', [BrandController::class, 'destroy'])->name('thuong-hieu.delete');

    Route::get('/ton-kho-CNNPP', function () {
        return view('admin.warehouse.ton-kho-CNNPP');
    });
    
    Route::get('/ton-kho-dai-ly', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::post('/ton-kho-dai-ly', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::post('/ton-kho-dai-ly/add-product', [WarehouseController::class, 'addProductToWarehouse'])->name('warehouse.addProductToWarehouse');
    Route::put('/ton-kho-dai-ly', [WarehouseController::class, 'update'])->name('warehouse.update');
    Route::delete('/ton-kho-dai-ly', [WarehouseController::class, 'delete'])->name('warehouse.destroy');
    Route::get('/get-location', [WarehouseController::class, 'getLocation'])->name('warehouse.getLocation');
    Route::get('/get-warehouse', [WarehouseController::class, 'getWarehouse'])->name('warehouse.getWarehouse');
    Route::get('/ton-kho-dai-ly/modal-edit', [WarehouseController::class, 'modalEdit'])->name('warehouse.modalEdit');

    // BLOG CATEGORY
    Route::get('/chuyen-muc-bai-viet', [BlogCategoryController::class, 'index'])->name('chuyenmuc-baiviet.index');
    Route::get('/chuyen-muc-bai-viet/getDatatable', [BlogCategoryController::class, 'indexDatatable'])->name('chuyenmuc-baiviet.indexDatatable');
    Route::get('/chuyen-muc-bai-viet/modal-edit', [BlogCategoryController::class, 'modalEdit'])->name('chuyenmuc-baiviet.modalEdit');
    Route::post('/chuyen-muc-bai-viet', [BlogCategoryController::class, 'store'])->name('chuyenmuc-baiviet.store');
    Route::put('/chuyen-muc-bai-viet/update', [BlogCategoryController::class, 'update'])->name('chuyenmuc-baiviet.update');
    Route::delete('/chuyen-muc-bai-viet', [BlogCategoryController::class, 'destroy'])->name('chuyenmuc-baiviet.delete');
    
    // BLOG
    Route::get('/tat-ca-bai-viet', [BlogController::class, 'index'])->name('baiviet.index');
    Route::get('/tat-ca-bai-viet/create', [BlogController::class, 'create'])->name('baiviet.create');
    Route::get('/tat-ca-bai-viet/edit/{id}', [BlogController::class, 'edit'])->name('baiviet.edit');
    Route::post('/tat-ca-bai-viet', [BlogController::class, 'store'])->name('baiviet.store');
    Route::put('/tat-ca-bai-viet/update/{id}', [BlogController::class, 'update'])->name('baiviet.update');
    Route::put('/tat-ca-bai-viet/{id}', [BlogController::class, 'updateStatus'])->name('baiviet.updateStatus');
    Route::delete('/tat-ca-bai-viet/{id}', [BlogController::class, 'destroy'])->name('baiviet.delete');

});

Route::get('/admin/thong-tin-ban-hang', function () {
    return view('admin.thong-tin-ban-hang');
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

Route::get('/san-pham', [PublicProductController::class, 'index'])->name('product.index');
Route::get('/danh-muc/{slug}', [PublicProductController::class, 'indexCategory'])->name('product.indexCategory');
Route::get('/san-pham/{slug}', [PublicProductController::class, 'show'])->name('product.show');


Route::get('/thongtin', function () {
    return view('thongtin');
});

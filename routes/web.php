<?php
use Illuminate\Support\Facades\Route;

use App\Admin\Controllers\BlogCategoryController;
use App\Admin\Controllers\BlogController;
use App\Admin\Controllers\BrandController;
use App\Admin\Controllers\CalculationUnitController;
use App\Admin\Controllers\CourseController;
use App\Admin\Controllers\ProductCategoryController;
use App\Admin\Controllers\ProductController;
use App\Admin\Controllers\WarehouseController;
use App\Admin\Controllers\OrderController;
use App\Admin\Controllers\ShippingController as AdminShippingController;

use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicProductCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PublicBlogController;
use App\Http\Controllers\PublicBlogCategoryController;

use App\Http\Controllers\OrderController as CustomOrderController;
use Illuminate\Support\Facades\DB;
use App\Admin\Controllers\ConfigShippingController;

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


// Route::get('/admin/don-vi-tinh', function () {
//     return view('admin.don-vi-tinh');
// });




Route::get('/admin/ket-qua-dao-tao', function () {
    return view('admin.ket-qua-dao-tao');
});

Route::get('/admin/loai-khuyen-mai', function () {
    return view('admin.loai-khuyen-mai');
});
Route::get('/admin/test', function () {
    
    return DB::table('shipping_config')->first()->package_viewable == true ? true : false ;
});

Route::prefix('admin')->group(function () {
    Route::prefix('don-hang')->group(function () {

        Route::get('don-hang-cnpp', function () {
            return view('admin.order.don-hang-cnpp');
        })->name('orderadmin.CNNPP');
        
        Route::get('don-hang-dai-ly', [OrderController::class, 'getOrderAgency'])->name('orderadmin.agency');
        
        Route::get('don-hang-doi-thu-dai-ly', function () {
            return view('admin.order.don-hang-doi-thu-dai-ly');
        })->name('orderadmin.doithuAgency');
        
        Route::get('don-hang-tra-chi-nhanh-npp', function () {
            return view('admin.order.don-hang-tra-chi-nhanh-npp');
        })->name('orderadmin.backCNNPP');
        
        Route::get('don-hang-tra-dai-ly', function () {
            return view('admin.order.don-hang-tra-dai-ly');
        })->name('orderadmin.backAgency');
        Route::put('/cap-nhat-don-hang', [OrderController::class, 'puthOrderUpdate'])->name('order.update');
        Route::get('/chi-tiet/{order:id}', [OrderController::class, 'getOrderDetail'])->name('order.detail');
        Route::patch('/huy-don-hang', [OrderController::class, 'patchOrderDestroy']);
        Route::delete('/xoa-don-hang', [OrderController::class, 'deleteOrderDelete']);
    });

    Route::prefix('van-chuyen')->group(function () {
        Route::post('/tao-don-hang', [AdminShippingController::class, 'create'])->name('post.shipping.create');
        // Route::get('/tao-don-hang/{order:id}', [AdminShippingController::class, 'getCreate'])->name('post.shipping.create');
        Route::get('/tao-don-hang', [AdminShippingController::class, 'getInfoShipping'])->name('get.shipping.create');
        Route::delete('/huy-don-hang', [AdminShippingController::class, 'destroyShippingOrder'])->name('delete.shipping.destroy');
    });

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

    // COURSES
    Route::get('/khoa-hoc', [CourseController::class, 'index'])->name('course.index');
    Route::get('/tao-khoa-hoc', [CourseController::class, 'create'])->name('course.create');
    Route::get('/cap-nhat-khoa-hoc/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/khoa-hoc', [CourseController::class, 'store'])->name('course.store');
    Route::put('/khoa-hoc/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/khoa-hoc/{id}', [CourseController::class, 'destroy'])->name('course.delete');

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


    //setting
    Route::get('/cau-hinh-van-chuyen', [ConfigShippingController::class, 'index']);
    Route::put('/cau-hinh-van-chuyen', [ConfigShippingController::class, 'update'])->name('put.config.shipping');
});

Route::get('/admin/thong-tin-ban-hang', function () {
    return view('admin.thong-tin-ban-hang');
});

//------------------------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('home');
})->name('home');

Route::resources([
    'san-pham' => PublicProductController::class,
    'danh-muc' => PublicProductCategoryController::class,
    'bai-viet' => PublicBlogController::class,
    'danh-muc-bai-viet' =>PublicBlogCategoryController::class
]);
Route::get('/tim-kiem-san-pham', [PublicProductController::class, 'searchProduct'])->name('tim-kiem-san-pham');
Route::get('/tim-kiem-bai-viet', [PublicBlogController::class, 'searchBlog'])->name('tim-kiem-bai-viet');

Route::prefix('gio-hang')->group(function () {
    Route::get('/', [CartController::Class, 'index'])->name('cart.index');
    Route::post('add', [CartController::Class, 'addCart'])->name('cart.add');
    Route::post('update', [CartController::Class, 'updateCart'])->name('cart.update');
    Route::post('delete', [CartController::Class, 'deleteCart'])->name('cart.delete');
});

Route::prefix('thanh-toan')->group(function () {
    Route::get('/', [CheckoutController::Class, 'index'])->name('checkout.index');
    Route::post('post', [CheckoutController::Class, 'postOrder'])->name('checkout.post');
    Route::get('thanh-cong', [CheckoutController::Class, 'orderSuccess'])->name('checkout.orderSuccess');

});

Route::get('/theo-doi-don-hang', [CustomOrderController::class, 'getDetectOrder']);

Route::post('/theo-doi-don-hang', [CustomOrderController::class, 'postDetectOrder'])->name('post.detect.order');

Route::get('/tim-kiem-san-pham', [PublicProductController::class, 'searchProduct'])->name('tim-kiem-san-pham');

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


Route::get('/thongtin', function () {
    return view('thongtin');
});
//----------------vận chuyển---------------
Route::get('test-van-chuyen', [ShippingController::class, 'test']);

Route::get('lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);

Route::get('lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);

Route::post('tinh-phi-van-chuyen', [ShippingController::class, 'postShippingFee'])->name('post.shippingFee');

//----------------vận chuyển---------------
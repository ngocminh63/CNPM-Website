<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomerController;

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Products\SiteProductController;

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


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/home', function () {
    return view('Backend.home');
})->name('home')->middleware('CheckLogin');

Route::get('/login',[AdminController::class, 'loginAdmin'])->name('login')->middleware('CheckLogout');
Route::post('/login',[AdminController::class, 'postLoginAdmin']);

Route::group(['prefix'=>'admin','namespace' => 'Admin','middleware'=>'CheckLogin'], function() {
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('/showdelete', [UserController::class, 'show_delete'])->name('user.showdelete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('cate-index');
        Route::get('/create', [CategoryController::class, 'create'])->name('cate-create');
        Route::post('/store', [CategoryController::class, 'store'])->name('cate-store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('cate-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('cate-update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('cate-delete');
    });

    Route::prefix('products')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

        Route::any('/search', [ProductController::class, 'search'])->name('product.search');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/thongke/{id}', [CustomerController::class, 'thongke'])->name('customer.thongke');

    });

    Route::prefix('orders')->group(function() {
        Route::get('/', [OrderController::class, 'chuaxuly'])->name('order.chuaxuly');
        Route::get('/chitiet/{orderId}', [OrderController::class, 'chitiet'])->name('order.chitiet');
        Route::get('/xuly/{orderId}/{trangthai}', [OrderController::class, 'xuly'])->name('order.xuly');
        Route::get('/daxuly', [OrderController::class, 'daxuly'])->name('order.daxuly');
        Route::any('/tkdoanhthu', [OrderController::class, 'tkdoanhthu'])->name('order.tkdoanhthu');

    });

});

Route::get('/trang-chu', function () {
    return view('index');
})->name('trangchu');

Route::get('/dang-nhap',[SiteController::class, 'login'])->name('dangnhap');
Route::post('/dang-nhap',[SiteController::class, 'postLogin']);

Route::get('/dang-ky',[SiteController::class, 'signup'])->name('dangky');
Route::post('/dang-ky',[SiteController::class, 'postSignup'])->name('xldangky');

// Route::get("check_login", function(Request $request){
//     if(!$request->session()->has('logined')){
//         return view('Frontend.login');
//     }
// });


Route::group(['prefix' => '/', 'namespace' =>'Site'], function() {

    Route::get('/dang-xuat',[SiteController::class, 'dangxuat'])->name('dangxuat');

    Route::prefix('san-pham')->group(function(){
        Route::get('/', [SiteProductController::class, 'index'])->name('sanpham.index');
    });

    Route::get('/gio-hang', [CartController::class, 'giohang'])->name('giohang');

    
});

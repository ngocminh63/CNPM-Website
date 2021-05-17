<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return view('home');
})->name('home')->middleware('CheckLogin');;

Route::get('/login',[AdminController::class, 'loginAdmin'])->name('login')->middleware('CheckLogout');
Route::post('/login',[AdminController::class, 'postLoginAdmin']);

Route::group(['prefix'=>'admin','namespace' => 'Admin','middleware'=>'CheckLogin'], function() {
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'user','namespace' => 'User'], function() {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('cate-index');
        Route::get('/create', [CategoryController::class, 'create'])->name('cate-create');
        Route::post('/store', [CategoryController::class, 'store'])->name('cate-store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('cate-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('cate-update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('cate-delete');
    });

    Route::group(['prefix' => 'product','namespace' => 'Products'], function() {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });
});

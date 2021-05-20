<?php

use App\Http\Controllers\AdminController;
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
    

});

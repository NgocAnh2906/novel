<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryNovelController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'home']);
Route::get('/doc-truyen/{slug}', [IndexController::class, 'doctruyen']);
Route::get('/xem-chuong/{slug}', [IndexController::class, 'doc']);

Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai']);
//tìm kiếm
Route::get('/tim-kiem', [IndexController::class, 'search']);

//phan quyền
Route::get('/user', [UserController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', CategoryController::class);
Route::resource('/theloai', CategoryNovelController::class);
Route::resource('/truyen-tieu-thuyet', NovelController::class);
Route::resource('/chapter', ChapterController::class);

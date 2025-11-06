<?php

use App\Http\Controllers\LoginController;

Route::get('/login',[LoginController::class,'showLoginForm'])->name('login.form');
Route::get('/login',[LoginController::class,'login'])->name('login');

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return 'ログイン成功！ダッシュボード画面です。';
})->middleware('auth');

use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/products', function () {
    return view('products');
})->middleware('auth'); 

use App\Http\Controllers\ProductController;

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');

Route::get('/products/{id}', [ProductController::class, 'show'])->middleware('auth');

// 編集フォームの表示
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth');

// 編集内容の更新処理
Route::post('/products/{id}/update', [ProductController::class, 'update'])->middleware('auth');

// 商品削除処理
Route::post('/products/{id}/delete', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('/products/search', [ProductController::class, 'search'])->middleware('auth');
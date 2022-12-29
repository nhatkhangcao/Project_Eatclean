<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/bill', [CartController::class, 'createPayment']);

Route::post('/addcart/{id}', [CartController::class, 'addcart']);
Route::get('/showcart', [CartController::class, 'showcart']);
Route::get('/delete/{id}', [CartController::class, 'deletecart']);
Route::post('/vnpayment', [CartController::class, 'checkout']);


Route::get('/collections', [App\Http\Controllers\User\UserController::class, 'categories']);

Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
Route::get('/{prod_name}', [UserController::class, 'productView']);

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });
});
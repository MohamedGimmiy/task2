<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/dashboard',[ClientsController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/products',[ProductController::class, 'index']);
    Route::get('/orders',[OrderController::class, 'index']);
    Route::post('/add_to_cart', [OrderController::class, 'add_to_cart']);
    Route::get('/cart', [OrderController::class, 'cart']);
    Route::get('/remove_from_cart', [OrderController::class, 'remove_from_cart']);
    Route::post('/create_product',[ProductController::class, 'create_product']);
    Route::post('/submitOrder',[OrderController::class, 'submitOrder']);
});
require __DIR__.'/auth.php';

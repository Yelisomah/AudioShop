<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('layouts.app');
});

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{category}', [ProductController::class, 'category']);

Route::get('/product/{slug}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::delete('/cart/remove/{slug}', [CartController::class, 'remove']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'process']);

Route::get('/payment/{order}', [PaymentController::class, 'start'])->name('payment.start');

Route::get('/payment/verify/{reference}', [PaymentController::class, 'verify']);

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CartController;
// use App\Http\Controllers\CheckoutController;

Route::get('/',[HomeController::class,'index']);

Route::get('/category/{category}',[CategoryController::class,'show']);

Route::get('/product/{slug}',[ProductController::class,'show']);

Route::get('/cart',[CartController::class,'index']);
Route::post('/cart/add/{slug}',[CartController::class,'add']);
Route::post('/cart/increase/{id}', [CartController::class,'increase']);
Route::post('/cart/decrease/{id}', [CartController::class,'decrease']);
Route::post('/cart/remove/{id}', [CartController::class,'remove']);

Route::get('/checkout',[CheckoutController::class,'index']);
Route::post('/checkout',[CheckoutController::class,'process']);


Route::view('/success','pages.success');
Route::get('/checkout/success', function () {

    $order = session('order');

    return view('pages.success', compact('order'));

});
Route::get('/payment/callback',[CheckoutController::class,'callback'])->name('payment.callback');
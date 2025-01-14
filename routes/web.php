<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripePaymentController;

route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('redirect', [HomeController::class, 'redirect']);

route::get('/category', [AdminController::class, 'category']);

route::get('/order', [AdminController::class, 'order']);

route::post('/add_category', [AdminController::class, 'add_category']);

route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/view-product', [AdminController::class, 'view_product'])->name('view_product');

route::get('/add_product', [AdminController::class, 'add_product_page']);

route::post('/add_product', [AdminController::class, 'add_product']);

route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);

route::post('/edit_product_confirm/{id}', [AdminController::class, 'edit_product_confirm']);

route::get('/product_details/{id}', [HomeController::class, 'product_details']);

route::get('/show_cart', [HomeController::class, 'show_cart']);

route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart']);

route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

route::get('/cash_order', [HomeController::class, 'cash_order']);

route::get('/card_order/{totalPrice}', [HomeController::class, 'card_order']);

Route::post('stripe/{totalPrice}', [HomeController::class, 'stripePost'])->name('stripe.post');

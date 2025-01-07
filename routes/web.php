<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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

route::post('/add_category', [AdminController::class, 'add_category']);


route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

route::get('/view_product', [AdminController::class, 'view_product']);

route::get('/add_product', [AdminController::class, 'add_product_page']);

route::post('/add_product', [AdminController::class, 'add_product']);

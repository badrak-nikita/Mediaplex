<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home.userpage');
    })->name('userpage');
});

// Admin
    // Category
    Route::get('/view_category', [CategoryController::class, 'view_category']);
    Route::get('/add_category', [CategoryController::class, 'add_category']);
    Route::post('/category_add', [CategoryController::class, 'category_add']);
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category']);

    // Products
    Route::get('/view_products', [ProductController::class, 'view_products']);
    Route::get('/add_products', [ProductController::class, 'add_products']);
    Route::post('/products_add', [ProductController::class, 'products_add']);
    Route::get('/delete_products/{id}', [ProductController::class, 'delete_products']);
    Route::get('/update_products/{id}', [ProductController::class, 'update_products']);
    Route::post('/update_products_confirm/{id}', [ProductController::class, 'update_products_confirm']);

    // Pass
    Route::get('/view_pass', [PassController::class, 'view_pass']);
    Route::get('/add_pass', [PassController::class, 'add_pass']);
    Route::post('/pass_add', [PassController::class, 'pass_add']);
    Route::get('/delete_pass/{id}', [PassController::class, 'delete_pass']);
    Route::get('/update_pass/{id}', [PassController::class, 'update_pass']);
    Route::post('/update_pass_confirm/{id}', [PassController::class, 'update_pass_confirm']);

    // Order
    Route::get('/view_order', [OrderController::class, 'view_order']);
    Route::get('/delivered/{id}', [OrderController::class, 'delivered']);

// User
    // Products
    Route::get('/products', [HomeController::class, 'products']);
    Route::get('/product_category/{category_name}', [HomeController::class, 'product_category']);
    Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

    // Cart
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']);

    // Chackout
    Route::get('/chackout', [HomeController::class, 'chackout']);
    Route::get('/order', [HomeController::class, 'order']);
    Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
    Route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

    // Pass
    Route::get('/pass', [HomeController::class, 'pass']);
    Route::get('/pass_category/{category_name}', [HomeController::class, 'pass_category']);
    Route::get('/pass_details/{id}', [HomeController::class, 'pass_details']);
    Route::post('/add_cart_pass/{id}', [HomeController::class, 'add_cart_pass']);

    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'profile']);
    Route::get('/contacts', [HomeController::class, 'contacts']);
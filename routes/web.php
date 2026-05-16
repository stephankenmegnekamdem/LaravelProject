<?php

use App\Http\Controllers\Admin2\Admin2HomeController;
use App\Http\Controllers\Admin2\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin2', [Admin2HomeController::class, 'index'])->name('admin2.home');
Route::get('/admin2/categories', [CategoryController::class, 'index'])->name('admin2.categories.index');
Route::get('/admin2/categories/create', [CategoryController::class, 'create'])->name('admin2.categories.create');
Route::post('/admin2/categories/store', [CategoryController::class, 'store'])->name('admin2.categories.store');
Route::get('/admin2/categories/{category}', [CategoryController::class, 'show'])->name('admin2.categories.show');
Route::get('/admin2/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin2.categories.edit');
Route::put('/admin2/categories/{category}', [CategoryController::class, 'update'])->name('admin2.categories.update');
Route::delete('/admin2/categories/{category}', [CategoryController::class, 'destroy'])->name('admin2.categories.destroy');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout (protected — must be logged in)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    });
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/contacts')->name('contacts.')->controller(ContactController::class)->group(function () {
Route::get('/' , 'index')->name('index');
Route::get('/create' , 'create')->name('create');
Route::post('/store' , 'store')->name('store');
Route::get('/edit/{id}' , 'edit')->name('edit');
Route::post('/update/{id}' , 'update')->name('update');
Route::delete('/delete/{id}' , 'destroy')->name('destroy');
Route::get('/show/{id}' , 'show')->name('show');

});


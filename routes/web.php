<?php

use App\Http\Controllers\Admin2\Admin2HomeController;
use App\Http\Controllers\Admin2\Admin2ProductController;
use App\Http\Controllers\Admin2\AuthController;
use App\Http\Controllers\Admin2\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/admin2', [Admin2HomeController::class, 'index'])->name('admin2.home');
/**
Route::get('/admin2/categories', [CategoryController::class, 'index'])->name('admin2.categories.index');
Route::get('/admin2/categories/create', [CategoryController::class, 'create'])->name('admin2.categories.create');
Route::post('/admin2/categories/store', [CategoryController::class, 'store'])->name('admin2.categories.store');
Route::get('/admin2/categories/{category}', [CategoryController::class, 'show'])->name('admin2.categories.show');
Route::get('/admin2/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin2.categories.edit');
Route::put('/admin2/categories/{category}', [CategoryController::class, 'update'])->name('admin2.categories.update');
Route::delete('/admin2/categories/{category}', [CategoryController::class, 'destroy'])->name('admin2.categories.destroy');
*/Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('/admin2')->name('admin2.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {return view('admin2.index');})->name('index');

// category
    Route::prefix('categories') ->name('categories.')->controller (CategoryController::class)->group(function(){

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');

        Route::post('/store', 'store')->name('store');

        Route::get('/show/{category}', 'show')->name('show');

        Route::get('/edit/{category}', 'edit')->name('edit');

        Route::put('/update/{category}', 'update')->name('update');

        Route::delete('/delete/{category}', 'destroy')->name('destroy');


});

// product
    Route::prefix('product') ->name('product.')->controller (Admin2ProductController::class)->group(function(){

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');

        Route::post('/store', 'store')->name('store');

        Route::get('/show/{product}', 'show')->name('show');

        Route::get('/edit/{product}', 'edit')->name('edit');

        Route::put('/update/{product}', 'update')->name('update');

        Route::delete('/delete/{product}', 'destroy')->name('destroy');
    });




});

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


<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin2\Admin2HomeController;
use App\Http\Controllers\Admin2\Admin2OrderController;
use App\Http\Controllers\Admin2\Admin2ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin2\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// ==========================================
// Frontend Public Routes
// ==========================================

// Home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Shop page — all products listing
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');


Route::get('/product/{id}', [HomeController::class, 'product'])->name('frontend.product');

// Product list (alternative listing page)
Route::get('/products', [FrontendProductController::class, 'index'])->name('productlist');

// Single product show (disabled — using frontend.product instead)
// Route::get('/products/{id}', [FrontendProductController::class, 'show'])->name('products.show');


// ==========================================
// Cart & Checkout Routes (Auth Required)
// ==========================================

Route::middleware(['auth'])->group(function () {

    // ---------- Cart Routes ----------

    // View cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Add product to cart
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

    // Update cart item quantity
    Route::post('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');

    // Remove item from cart
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    // ---------- Checkout Routes ----------

    // Show checkout page
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

    // Place order (form submission)
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');

});






// ==========================================
// Root Route
// ==========================================

// Redirects to home for all users; admins go to admin panel
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.index');
        }

        return redirect()->route('home');
    }

    return redirect()->route('home');
})->name('root');


// ==========================================
// Authentication Routes
// ==========================================

// Show login form (guests only)
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');

// Handle login form submission (guests only)
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');

// Handle logout (auth required)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// ==========================================
// Admin Panel — SB Admin 2 (My Template)
// ==========================================

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/', function () { return view('admin.index'); })->name('index');

    // ---------- Category Management ----------
    Route::prefix('categories')->name('categories.')->controller(AdminCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');           // admin.categories.index
        Route::get('/create', 'create')->name('create');   // admin.categories.create
        Route::post('/store', 'store')->name('store');     // admin.categories.store
        Route::get('/show/{category}', 'show')->name('show');   // admin.categories.show
        Route::get('/edit/{category}', 'edit')->name('edit');   // admin.categories.edit
        Route::put('/update/{category}', 'update')->name('update'); // admin.categories.update
        Route::delete('/delete/{category}', 'destroy')->name('destroy'); // admin.categories.destroy
    });

    // ---------- Product Management ----------
    Route::prefix('product')->name('product.')->controller(AdminProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');           // admin.product.index
        Route::get('/create', 'create')->name('create');   // admin.product.create
        Route::post('/store', 'store')->name('store');     // admin.product.store
        Route::get('/show/{product}', 'show')->name('show');     // admin.product.show
        Route::get('/edit/{product}', 'edit')->name('edit');     // admin.product.edit
        Route::put('/update/{product}', 'update')->name('update'); // admin.product.update
        Route::delete('/delete/{product}', 'destroy')->name('destroy'); // admin.product.destroy
    });

    // ---------- Order Management ----------
    Route::prefix('orders')->name('orders.')->controller(AdminOrderController::class)->group(function () {
        Route::get('/', 'index')->name('index');                        // admin.orders.index
        Route::get('/show/{order}', 'show')->name('show');              // admin.orders.show
        Route::post('/status/{order}', 'updateStatus')->name('updateStatus'); // admin.orders.updateStatus
    });

});









/**
Route::get('/admin2/categories', [CategoryController::class, 'index'])->name('admin2.categories.index');
Route::get('/admin2/categories/create', [CategoryController::class, 'create'])->name('admin2.categories.create');
Route::post('/admin2/categories/store', [CategoryController::class, 'store'])->name('admin2.categories.store');
Route::get('/admin2/categories/{category}', [CategoryController::class, 'show'])->name('admin2.categories.show');
Route::get('/admin2/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin2.categories.edit');
Route::put('/admin2/categories/{category}', [CategoryController::class, 'update'])->name('admin2.categories.update');
Route::delete('/admin2/categories/{category}', [CategoryController::class, 'destroy'])->name('admin2.categories.destroy');
*/
// ==========================================
// Admin2 Panel — AdminLTE (Instructor's Template)
// ==========================================

Route::prefix('/admin2')->name('admin2.')->middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/', function () { return view('admin2.index'); })->name('index');

    // ---------- Category Management ----------
    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');                         // admin2.categories.index
        Route::get('/create', 'create')->name('create');                 // admin2.categories.create
        Route::post('/store', 'store')->name('store');                   // admin2.categories.store
        Route::get('/show/{category}', 'show')->name('show');            // admin2.categories.show
        Route::get('/edit/{category}', 'edit')->name('edit');            // admin2.categories.edit
        Route::put('/update/{category}', 'update')->name('update');      // admin2.categories.update
        Route::delete('/delete/{category}', 'destroy')->name('destroy'); // admin2.categories.destroy
    });

    // ---------- Product Management ----------
    Route::prefix('product')->name('product.')->controller(Admin2ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');                         // admin2.product.index
        Route::get('/create', 'create')->name('create');                 // admin2.product.create
        Route::post('/store', 'store')->name('store');                   // admin2.product.store
        Route::get('/show/{product}', 'show')->name('show');             // admin2.product.show
        Route::get('/edit/{product}', 'edit')->name('edit');             // admin2.product.edit
        Route::put('/update/{product}', 'update')->name('update');       // admin2.product.update
        Route::delete('/delete/{product}', 'destroy')->name('destroy');  // admin2.product.destroy
    });

    // ---------- Order Management ----------
    Route::prefix('orders')->name('orders.')->controller(Admin2OrderController::class)->group(function () {
        Route::get('/', 'index')->name('index');                              // admin2.orders.index
        Route::get('/show/{order}', 'show')->name('show');                    // admin2.orders.show
        Route::post('/status/{order}', 'updateStatus')->name('updateStatus'); // admin2.orders.updateStatus
    });

});




















//Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');







// ==========================================
// Contact Management Routes
// ==========================================

Route::prefix('/contacts')->name('contacts.')->controller(ContactController::class)->group(function () {
    Route::get('/', 'index')->name('index');           // contacts.index
    Route::get('/create', 'create')->name('create');   // contacts.create
    Route::post('/store', 'store')->name('store');     // contacts.store
    Route::get('/show/{id}', 'show')->name('show');    // contacts.show
    Route::get('/edit/{id}', 'edit')->name('edit');    // contacts.edit
    Route::post('/update/{id}', 'update')->name('update');   // contacts.update
    Route::delete('/delete/{id}', 'destroy')->name('destroy'); // contacts.destroy
});

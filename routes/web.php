<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\{
    CategoryController,
    AboutController,
    ShopController,
    OrderController,
    WishlistController,
    HomeController,
    ProfileController,
    CartController,
    CheckoutController,
    ContactController,
    ReviewController,
};
use App\Http\Controllers\Admin\{
    AdminController,
    AdminCategoryController,
    AdminProductController,
    AdminOrderController,
    AdminUserController,
    AdminDiscountController
};

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/products/{product}', [ShopController::class, 'show'])->name('products.show');
Route::get('/categorie', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/search', [ShopController::class, 'search'])->name('search');
// Static Pages
Route::get('/guide-des-tailles', function () {
    return view('size-guide');
})->name('size-guide');

Route::get('/livraison-retours', function () {
    return view('shipping-returns');
})->name('shipping-returns');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Contact Routes
Route::get('/contactez-nous', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication routes
require __DIR__.'/auth.php';

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    
    // Cart
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    
    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Admin Routes
Route::middleware(['auth'],'role:admin')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Resources
    Route::resource('/categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('/products', AdminProductController::class)->names('admin.products');
    Route::resource('/orders', AdminOrderController::class)->names('admin.orders')->except(['create', 'store']);
    Route::resource('/users', AdminUserController::class)->names('admin.users');
    Route::resource('/discounts', AdminDiscountController::class)->names('admin.discounts');

    // ZIDO HAD JOUJ STORA 
    Route::get('/product/{product}', [AdminProductController::class, 'show'])->name('product.show');
    Route::get('/categories/{category}', [AdminCategoryController::class, 'show'])->name('categorie.show');
    
    // Order Invoice
    Route::get('/orders/{order}/invoice', [OrderController::class, 'invoice'])->name('admin.orders.invoice');
});
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryItemController;

// Protected routes
Route::middleware(['auth'])->group(function() {
    Route::resource('gallery', GalleryItemController::class);
    Route::resource('products', ProductController::class);

});

// Public pages
Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/our-gallery', fn() => view('gallery'))->name('our-gallery');
Route::get('/shop', fn() => view('shop'))->name('shop');

// Dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

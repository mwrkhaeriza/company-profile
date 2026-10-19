<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;

// Halaman Publik (User)
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/produk', [ProductController::class, 'publicIndex'])->name('products.public');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('galleries.public');
Route::get('/artikel', [ArticleController::class, 'publicIndex'])->name('articles.public');

// Rute Profil Publik
Route::get('/profil', function () {
    return view('profile-public');
})->name('profile.public');

// Rute Kontak Publik
Route::get('/kontak', function () {
    return view('contact');
})->name('contacts.public');

Route::post('/kontak/kirim', [ContactController::class, 'store'])->name('contacts.store');

// Halaman Admin (Harus Login)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('galleries', GalleryController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/contacts/{id}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

require __DIR__.'/auth.php';
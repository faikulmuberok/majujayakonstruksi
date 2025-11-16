<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

// Product Routes
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/produk', [ProductController::class, 'store'])->name('products.store');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/produk/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/produk/{slug}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produk/{slug}', [ProductController::class, 'destroy'])->name('products.destroy');

// Article Routes
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/artikel', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/artikel/{slug}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/artikel/{slug}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/artikel/{slug}', [ArticleController::class, 'destroy'])->name('articles.destroy');

// Category Routes
Route::get('/kategori', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/kategori/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/kategori', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/kategori/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/kategori/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/kategori/{slug}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/kategori/{slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

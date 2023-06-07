<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::redirect('/dashboard', '/admin/dashboard');

Route::prefix('admin')->middleware(['auth', 'EnsureUserRoles', 'verified'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Filepond Upload and Cancel Upload Route
    Route::post('gallery/upload', [ProductGalleryController::class, 'upload'])->name('gallery.upload');
    Route::delete('gallery/cancel', [ProductGalleryController::class, 'cancel'])->name('gallery.cancel');

    // CRUD Category, Gallery, Product Route Resource
    Route::resource('product', ProductController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only(['index', 'create', 'store', 'destroy']);
    Route::resource('category', ProductCategoryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('transaction', TransactionController::class)->only(['index', 'show', 'edit', 'update']);
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
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

Route::get('/',[BlogController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', [BlogController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
    Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog_edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog_update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog_destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
  
});
Route::post('/blog/search', [BlogController::class, 'search'])->name('blog.search');
require __DIR__.'/auth.php';

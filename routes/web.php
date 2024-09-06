<?php

use App\Http\Controllers\FontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Fontend
Route::get('/', [FontendController::class, 'font_dashboard'])->name('font.dashboard');
Route::get('/font/login', [FontendController::class, 'font_login'])->name('font.login');
Route::get('/font/register', [FontendController::class, 'font_register'])->name('font.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); //imp
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('user/{id}', [DashboardController::class, 'delete_user'])->name('user.delete');
    Route::get('/profile', [DashboardController::class, 'edit_profile'])->name('profile.edit');

    //Category
    Route::get('add/categroy', [CategoryController::class, 'add_categroy'])->name('add_categroy');
    Route::post('add/categroy/store', [CategoryController::class, 'store_categroy'])->name('categroy.store');
    Route::get('categroy', [CategoryController::class, 'categroy'])->name('categroy');
    Route::get('categroy/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('categroy/trashed', [CategoryController::class, 'trashed_categroy'])->name('categroy.trashed');
    Route::get('categroy/restore/{id}', [CategoryController::class, 'restore_categroy'])->name('category.trash.restore');
    Route::get('categroy/trashed/{id}', [CategoryController::class, 'delete_trashed_categroy'])->name('categroy.trash.delete');

    //Sub category
    Route::get('add/subcategroy', [CategoryController::class, 'add_subcategroy'])->name('add_subcategroy');
    Route::get('subcategroy', [CategoryController::class, 'subcategroy'])->name('subcategroy');


});

require __DIR__.'/auth.php';

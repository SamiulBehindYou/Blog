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
Route::post('/author/store', [FontendController::class, 'author_store'])->name('author.store');
Route::post('/author/login', [FontendController::class, 'author_login'])->name('author.login');



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
    Route::get('/register/admin', [DashboardController::class, 'new_register'])->name('admin.new');
    Route::post('/register/new/admin', [DashboardController::class, 'admin_register'])->name('admin.register');

    // Authors on Admin dashboard
    Route::get('/authors', [DashboardController::class, 'authors'])->name('authors');
    Route::get('/authors/status/{id}', [DashboardController::class, 'author_status'])->name('author.status');
    Route::get('/authors/delete/{id}', [DashboardController::class, 'author_delete'])->name('author.delete');

    //Category
    Route::get('category_add', [CategoryController::class, 'add_categroy'])->name('add.categroy');
    Route::post('add/categroy/store', [CategoryController::class, 'store_categroy'])->name('categroy.store');
    Route::get('categroy', [CategoryController::class, 'categroy'])->name('categroy');
    Route::get('categroy/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('categroy/trashed', [CategoryController::class, 'trashed_categroy'])->name('categroy.trashed');
    Route::get('categroy/restore/{id}', [CategoryController::class, 'restore_categroy'])->name('category.trash.restore');
    Route::get('categroy/trashed/{id}', [CategoryController::class, 'delete_trashed_categroy'])->name('categroy.trash.delete');

    //Sub category
    Route::get('add_subcategroy', [CategoryController::class, 'add_subcategroy'])->name('add_subcategroy');
    Route::get('sub_categroy', [CategoryController::class, 'subcategroy'])->name('subcategroy');


});

require __DIR__.'/auth.php';

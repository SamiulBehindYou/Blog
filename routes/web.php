<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

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
    Route::get('categroy', [CategoryController::class, 'categroy'])->name('categroy');
    Route::get('add/subcategroy', [CategoryController::class, 'add_subcategroy'])->name('add_subcategroy');
    Route::get('subcategroy', [CategoryController::class, 'subcategroy'])->name('subcategroy');


});

require __DIR__.'/auth.php';

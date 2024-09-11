<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorControlController;


// Frontend
Route::get('/', [FrontendController::class, 'front_dashboard'])->name('front.dashboard');


//Author
Route::get('/front/login', [AuthorController::class, 'front_login'])->name('front.login');
Route::get('/front/register', [AuthorController::class, 'front_register'])->name('front.register');
Route::post('/author/store', [AuthorController::class, 'author_store'])->name('author.store');
Route::post('/author/login', [AuthorController::class, 'author_login'])->name('author.login');
Route::get('/author/logout', [AuthorController::class, 'author_logout'])->name('author.logout');

//Author Dashboard
Route::get('/author/controls', [AuthorControlController::class, 'author_control'])->name('author.control');
Route::get('/author/blog/create', [AuthorControlController::class, 'blog_create'])->name('blog.create');
Route::get('/author/blogs', [AuthorControlController::class, 'blogs'])->name('blogs');

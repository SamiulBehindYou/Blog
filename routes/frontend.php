<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorControlController;


// Frontend
Route::get('/', [FrontendController::class, 'front_dashboard'])->name('front.dashboard'); //landing page


//Author
Route::get('/front/login', [AuthorController::class, 'front_login'])->name('front.login');
Route::get('/front/register', [AuthorController::class, 'front_register'])->name('front.register');
Route::post('/author/store', [AuthorController::class, 'author_store'])->name('author.store');
Route::post('/author/login', [AuthorController::class, 'author_login'])->name('author.login');
Route::get('/author/logout', [AuthorController::class, 'author_logout'])->name('author.logout');

Route::middleware('author')->group(function (){
    //Author Dashboard/Controls
    Route::get('/author/controls', [AuthorControlController::class, 'author_control'])->name('author.control');

    // Blog
    Route::get('/author/blog/create', [AuthorControlController::class, 'blog_create'])->name('blog.create');
    Route::get('/author/blogs', [AuthorControlController::class, 'blogs'])->name('blogs');
    Route::post('createpost', [AuthorControlController::class, 'createpost'])->name('author.new.post');
    Route::get('/author/blogs/edit/{id}', [AuthorControlController::class, 'blog_edit'])->name('author.blog.edit');
    Route::get('/author/blogs/delete/{id}', [AuthorControlController::class, 'blog_delete'])->name('author.blog.delete');
    Route::get('/author/blog/trash', [AuthorControlController::class, 'view_trash'])->name('author.blog.trash');
    Route::get('/author/blogs/trash/{id}', [AuthorControlController::class, 'restore'])->name('author.blog.restore');
    Route::get('/author/blogs/trash/{id}', [AuthorControlController::class, 'hard_delete'])->name('author.blog.hard.delete');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorControlController;
use App\Http\Controllers\AuthorMessageController;

// Frontend
Route::get('/', [FrontendController::class, 'front_dashboard'])->name('front.dashboard'); //landing page


//Author
Route::get('/front/login', [AuthorController::class, 'front_login'])->name('front.login');
Route::get('/front/register', [AuthorController::class, 'front_register'])->name('front.register');
Route::post('/author/store', [AuthorController::class, 'author_store'])->name('author.store');
Route::post('/author/login', [AuthorController::class, 'author_login'])->name('author.login');

Route::middleware('author')->group(function (){
    //Author Dashboard/Controls
    Route::get('/author/controls', [AuthorControlController::class, 'author_control'])->name('author.control');
    Route::post('/author/logout', [AuthorController::class, 'destroy'])->name('author.logout');

    // Blog
    Route::get('/author/blog/create', [AuthorControlController::class, 'blog_create'])->name('author.blog.create');
    Route::get('/author/blogs', [AuthorControlController::class, 'blogs'])->name('author.blogs');
    Route::post('createpost', [AuthorControlController::class, 'createpost'])->name('author.new.post');
    Route::get('/author/blogs/edit/{id}', [AuthorControlController::class, 'blog_edit'])->name('author.blog.edit');
    Route::get('/author/blogs/delete/{id}', [AuthorControlController::class, 'blog_delete'])->name('author.blog.delete');
    Route::get('/author/blog/trash', [AuthorControlController::class, 'view_trash'])->name('author.blog.trash');
    Route::get('/author/blogs/trash/re/{id}', [AuthorControlController::class, 'restore'])->name('author.blog.restore');
    Route::get('/author/blogs/trash/{id}', [AuthorControlController::class, 'hard_delete'])->name('author.blog.hard.delete');

    // Announcement
    Route::get('author/announcement/', [AuthorControlController::class, 'announcement'])->name('author.announcement');

    // Messages
    Route::get('author/messages/', [AuthorMessageController::class, 'messages'])->name('author.messages');
    Route::post('author/messages/store', [AuthorMessageController::class, 'store'])->name('author.message.store');
    Route::get('author/messages/delete', [AuthorMessageController::class, 'delete'])->name('author.message.delete');

});

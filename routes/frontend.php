<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorControlController;
use App\Http\Controllers\AuthorMessageController;
use App\Http\Controllers\AuthorSettingsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribController;
use App\Livewire\Admin\Contact;

// Frontend
Route::get('/', [FrontendController::class, 'front_dashboard'])->name('front.dashboard'); //landing page

//Blog view
Route::get('/blog/view/{id}', [FrontendController::class, 'view_blog'])->name('blog.view');

// Author's blog view
Route::get('author/blogs/{id}', [FrontendController::class, 'author_blogs'])->name('single.author.blogs');

// Tag wise view
Route::get('blog/bytag/{id}', [FrontendController::class, 'by_tag'])->name('by.tag');
// Subcategory wise view
Route::get('blog/bysubcategroy/{id}', [FrontendController::class, 'by_subcategory'])->name('by.subcategory');

// Search
Route::get('search/', [FrontendController::class, 'search'])->name('search');

//Author
Route::get('/front/login', [AuthorController::class, 'front_login'])->name('front.login');
Route::get('/front/register', [AuthorController::class, 'front_register'])->name('front.register');
Route::post('/author/store', [AuthorController::class, 'author_store'])->name('author.store');
Route::post('/author/login', [AuthorController::class, 'author_login'])->name('author.login');

// Under Livewire
Route::get('contact', function(){
    return view('frontend.contact.contact');
})->name('contact');
Route::get('about', [FrontendController::class, 'about'])->name('about');


Route::middleware('author')->group(function (){
    //Author Dashboard/Controls
    Route::get('/author/controls', [AuthorControlController::class, 'author_control'])->name('author.control');
    Route::post('/author/logout', [AuthorController::class, 'destroy'])->name('author.logout');

    //Author profile
    Route::get('author/update/profile', [AuthorController::class, 'edit_page'])->name('author.profile.edit');
    Route::post('author/update/profile', [AuthorController::class, 'update_profile'])->name('author.profile.update');
    Route::post('author/profile/image', [AuthorController::class, 'image_update'])->name('author.update.image'); //imp

    // Author blog actions
    Route::get('/author/blog/create', [AuthorControlController::class, 'blog_create'])->name('author.blog.create');
    Route::get('/author/blogs', [AuthorControlController::class, 'blogs'])->name('author.blogs');
    Route::post('createpost', [AuthorControlController::class, 'createpost'])->name('author.new.post');
    Route::get('/author/bl/edit/{id}', [AuthorControlController::class, 'blog_edit'])->name('author.blog.edit');
    Route::post('/author/blog/update', [AuthorControlController::class, 'blog_update'])->name('author.blog.update');
    Route::get('/author/blogs/delete/{id}', [AuthorControlController::class, 'blog_delete'])->name('author.blog.delete');
    Route::get('/author/blog/trash', [AuthorControlController::class, 'view_trash'])->name('author.blog.trash');
    Route::get('/author/blogs/trash/re/{id}', [AuthorControlController::class, 'restore'])->name('author.blog.restore');
    Route::get('/author/blogs/trash/{id}', [AuthorControlController::class, 'hard_delete'])->name('author.blog.hard.delete');

    // Announcement
    Route::get('author/announcement/', [AuthorControlController::class, 'announcement'])->name('author.announcement');

    // Messages
    Route::get('author/messages/', [AuthorMessageController::class, 'messages'])->name('author.messages');
    Route::post('author/messages/store', [AuthorMessageController::class, 'store'])->name('author.message.store');
    Route::get('author/messages/delete/{id}', [AuthorMessageController::class, 'delete'])->name('author.message.delete');

    // Subscribe
    Route::post('subscrib', [SubscribController::class, 'subscrib'])->name('subscrib');

    // Comment
    Route::post('comment', [CommentController::class, 'comment'])->name('comment');

    // Settings
    Route::get('author/settings', [AuthorControlController::class, 'settings'])->name('author.settings');
    Route::post('author/settings/facebook', [AuthorSettingsController::class, 'facebook'])->name('author.facebook');
    Route::post('author/settings/instagram', [AuthorSettingsController::class, 'instagram'])->name('author.instagram');
    Route::post('author/settings/twiter', [AuthorSettingsController::class, 'twiter'])->name('author.twiter');
    Route::post('author/settings/youtube', [AuthorSettingsController::class, 'youtube'])->name('author.youtube');
    Route::post('author/settings/about', [AuthorSettingsController::class, 'about'])->name('author.about');

});

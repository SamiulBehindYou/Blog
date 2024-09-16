<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    //Profile
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); //imp
    Route::post('/profile/image', [ProfileController::class, 'image_update'])->name('profile.update.image'); //imp
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
    Route::get('categroys', [CategoryController::class, 'categroy'])->name('categroy');
    Route::get('categroy/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('categroy/trashed', [CategoryController::class, 'trashed_categroy'])->name('categroy.trashed');
    Route::get('categroy/restore/{id}', [CategoryController::class, 'restore_categroy'])->name('category.trash.restore');
    Route::get('categroy/trashed/{id}', [CategoryController::class, 'delete_trashed_categroy'])->name('categroy.trash.delete');

    //Sub category
    Route::get('add_subcategroy', [CategoryController::class, 'add_subcategroy'])->name('add_subcategroy');
    Route::post('subcategroy/store', [CategoryController::class, 'subcategroy_store'])->name('subcategory.store');
    Route::get('sub_categroy', [CategoryController::class, 'subcategroy'])->name('subcategroy');

    //Tags
    Route::get('tag/new', [TagController::class, 'add_tag'])->name('add.tag');
    Route::post('tag/new', [TagController::class, 'store'])->name('tag.store');
    Route::get('tags', [TagController::class, 'tags'])->name('tags');
    Route::get('tag/{id}', [TagController::class, 'tag_delete'])->name('tag.delete');

    //Blogs
    Route::get('admin/blog/new', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('admin/blog/new', [AdminBlogController::class, 'store'])->name('blog.new');
    Route::get('admin/adminblog', [AdminBlogController::class, 'view_adminblogs'])->name('adminblogs');
    Route::get('admin/blogs', [AdminBlogController::class, 'view_blogs'])->name('blogs');
    Route::get('admin/blog/reveiw', [AdminBlogController::class, 'review'])->name('blog.review');
    Route::get('admin/blog/approve/{id}', [AdminBlogController::class, 'approve'])->name('blog.approve');
    Route::get('admin/blog/reject/{id}', [AdminBlogController::class, 'reject'])->name('blog.reject');
    Route::get('admin/blog/hard/{id}', [AdminBlogController::class, 'blog_delete'])->name('blog.delete');
    Route::get('admin/blog/edit/{id}', [AdminBlogController::class, 'blog_edit'])->name('admin.blog.edit');
    Route::get('admin/blog/visibility/{id}', [AdminBlogController::class, 'visibility'])->name('admin.blog.visibility');
    Route::post('admin/blog/update/', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    Route::get('admin/blog/delete/{id}', [AdminBlogController::class, 'delete'])->name('admin.blog.delete');
    Route::get('admin/blog/trash', [AdminBlogController::class, 'view_trash'])->name('blog.trash');
    Route::get('admin/blog/restore/{id}', [AdminBlogController::class, 'restore'])->name('admin.blog.restore');
    Route::get('admin/blog/hard/{id}', [AdminBlogController::class, 'hard_delete'])->name('admin.blog.hard.delete');

    // Announcement
    Route::get('announcement', [AnnouncementController::class, 'announcement'])->name('admin.announcement');
    Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('admin.announce.store');
    Route::get('announcement/delete/{id}', [AnnouncementController::class, 'delete'])->name('admin.announce.delete');

    // Messages
    Route::get('admin/author_messgae', [AdminMessageController::class, 'view_messgae'])->name('admin.view.message');
    Route::get('admin/makeread/{id}', [AdminMessageController::class, 'make_read'])->name('make.read');
});

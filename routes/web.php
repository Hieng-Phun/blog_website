<?php

use App\Http\Controllers\admin\category;
use App\Http\Controllers\admin\postController;
use App\Http\Controllers\admin\tagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Login & Logout
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authLogin'])->name('authLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// HomePage
Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/article/{id}', [HomeController::class, 'article'])->name('article');

Route::prefix('Page')->middleware('auth')->group(function () {
    // Categories
    // select
    Route::get('/category', [category::class, 'index'])->name('show_category');
    // insert
    Route::get('/create/category', [category::class, 'create'])->name('create_category');
    Route::post('/create/category', [category::class, 'store']);
    // edit
    Route::get('/edit/category/{id}', [category::class, 'edit'])->name('edit_category');
    Route::put('/edit/category/{id}', [category::class, 'update']);
    // delete
    Route::get('delete/category/{id}', [category::class, 'delete'])->name('delete_category');

    // Tags
    // select
    Route::get('/tag', [tagController::class, 'index'])->name('show_tag');
    // insert
    Route::get('/create/tag', [tagController::class, 'create'])->name('create_tag');
    Route::post('/create/tag', [tagController::class, 'store']);
    // edit
    Route::get('/edit/tag/{id}', [tagController::class, 'edit'])->name('edit_tag');
    Route::put('/edit/tag/{id}', [tagController::class, 'update']);
    // delete
    Route::get('delete/tag/{id}', [tagController::class, 'delete'])->name('delete_tag');

    //Post
    Route::get('/post', [postController::class, 'index'])->name('show_post');
    // insert
    Route::get('/create/post', [postController::class, 'create'])->name('create_post');
    Route::post('/create/post', [postController::class, 'store']);
    // edit
    Route::get('/edit/post/{id}', [postController::class, 'edit'])->name('edit_post');
    Route::put('/edit/post/{id}', [postController::class, 'update']);
});

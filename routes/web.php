<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::get('/', [PostController::class, 'showApprovedPostsLanding'])->name('posts.index.landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Admin routes
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::patch('/admin/posts/{id}/approve', [PostController::class, 'approve'])->name('posts.approve');

// Public blog posts
Route::get('/posts', [PostController::class, 'showApprovedPosts'])->name('posts.index');

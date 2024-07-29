<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/home', [HomeController::class,'index'])->name('home.index');
//panel admin show content inside the panel admin
Route::get('/admin/user', [UserController::class,'index'])->name('user.index');
Route::get('/admin/post', [PostController::class,'index'])->name('post.index');
Route::resource('User',UserController::class);
Route::resource('Post',PostController::class);

Route::middleware('auth')->group(function () {
    //client_post
    Route::get('/my-cart', [HomeController::class, 'index'])->name('client.index');
    Route::patch('/posts/{post}/accept', [HomeController::class, 'accept'])->name('posts.accept');
    Route::patch('/posts/{post}/decline', [HomeController::class, 'decline'])->name('posts.decline');
    Route::patch('/posts/{post}/reset', [HomeController::class, 'reset'])->name('posts.reset');
    //comment
   Route::resource('comments', CommentController::class);


});







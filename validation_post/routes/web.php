<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostrController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/home', [HomeController::class,'index'])->name('home.index');
//panel admin show content inside the panel admin
Route::get('/admin/user', [UserController::class,'index'])->name('user.index');
Route::get('/admin/post', [PostrController::class,'index'])->name('post.index');
Route::get('/admin/comment', [CommentController::class,'index'])->name('comment.index');





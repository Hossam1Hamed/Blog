<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/create',[App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store',[App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}',[App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}',[App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/post/delete/{id}',[App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');

Route::get('/comments/{post_id}',[App\Http\Controllers\CommentController::class, 'getCommentsByPost'])->name('post.comments');
Route::post('/comment/create/{post_id}',[App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
Route::post('/comment/store/',[App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/edit/{id}',[App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');
Route::Put('/comment/update',[App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/delete/{id}',[App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');

//social login
Route::get('auth/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/auth/login', [UserController::class, 'indexLogin'])->name('auth.login.index');
Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');
Route::get('auth/register', [UserController::class, 'indexRegister'])->name('auth.register.index');
Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/auth/logout', [UserController::class, 'logout'])->name('auth.logout');
Route::get('/profile', [UserController::class, 'indexProfile'])->name('auth.profile');
Route::get('/', [PostController::class, 'showPosts'])->name('posts.show');
Route::post('/create', [PostController::class, 'makePost'])->name('posts.create');
Route::get('/create', [PostController::class, 'indexPosts'])->name('posts.create.index');
Route::post('/profile', [UserController::class, 'addAvatar'])->name('profile.avatar');

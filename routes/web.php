<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

Route::get('/', [MainController::class, 'index'])->name('home.index');
Route::get('/auth/login', [UserController::class, 'indexLogin'])->name('auth.login.index');
Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');
Route::get('auth/register', [UserController::class, 'indexRegister'])->name('auth.register.index');
Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [UserController::class, 'logout'])->name('auth.logout');
Route::get('/profile', [UserController::class, 'indexProfile'])->name('auth.profile');
Route::get('/post', [])->name('');

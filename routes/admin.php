<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

/* Admin Routes */

Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

/* Admin Profile Routes */

Route::get('profile',[AdminProfileController::class,'profile'])->name('profile');
Route::post('profile/update',[AdminProfileController::class,'ProfileUpdate'])->name('profile.update');
Route::post('password/update',[AdminProfileController::class,'PasswordUpdate'])->name('password.update');
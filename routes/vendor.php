<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

/*   Vendor Routes   */
Route::get('/dashboard',[VendorController::class,'index'])->name('dashboard');
Route::get('/profile',[VendorController::class,'profile'])->name('profile');
Route::post('profile/update', [VendorController::class, 'VendorProfileUpdate'])->name('profile.update');
Route::post('password/update',[VendorController::class, 'VendorPasswordUpdate'])->name('password.update');
 
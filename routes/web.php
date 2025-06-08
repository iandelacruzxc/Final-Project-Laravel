<?php

use App\Models\Stall;
use App\Models\StallRental;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StallController;
use App\Http\Controllers\StallRentalController;
use App\Http\Controllers\CustomResetPasswordController;
use App\Http\Controllers\DashboardController;

// FRONT PAGE
Route::get('/', function () {
    return view('welcome');
});

// AUTH ROUTES
Auth::routes();

// REDIRECT TO STALLS AFTER LOGIN
Route::get('/stalls', [StallController::class, 'index'])->middleware('auth')->name('stalls.index');

// STALL ROUTES
Route::get('/stall/{stall}/assign', [StallRentalController::class, 'create'])->name('stall.assign');
Route::post('/stall/{stall}/assign', [StallRentalController::class, 'store'])->name('stall.assign.store');
Route::get('/stalls/history', [StallController::class, 'history'])->name('stalls.history');

// RENTAL ROUTES
Route::resource('rentals', StallRentalController::class);
Route::get('/rentals/{rental}/edit', [StallRentalController::class, 'edit'])->name('rentals.edit');
Route::put('/rentals/{rental}', [StallRentalController::class, 'update'])->name('rentals.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ✅ Custom Password Reset Page — Skips "Send Reset Link"
Route::get('/password/reset-direct', function () {
    return view('auth.reset_direct');
})->name('password.reset.direct');

Route::post('/password/reset-direct', [CustomResetPasswordController::class, 'update'])->name('password.reset.direct.submit');


// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
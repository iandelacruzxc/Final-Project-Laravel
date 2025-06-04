<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StallController;
use App\Http\Controllers\StallRentalController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/stalls', [StallController::class, 'index'])->name('stalls.index');
Route::get('/stall/{stall}/assign', [StallRentalController::class, 'create'])->name('stall.assign');
Route::post('/stall/{stall}/assign', [StallRentalController::class, 'store'])->name('stall.assign.store');
Route::get('/stalls/history', [StallController::class, 'history'])->name('stalls.history');
Route::resource('rentals', StallRentalController::class);


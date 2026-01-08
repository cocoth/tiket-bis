<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RuteController;
use Illuminate\Support\Facades\Route;

// Landing / User routes
Route::get('/', [LandingController::class, 'index'])->name('landing.home');
Route::get('/booking', [LandingController::class, 'booking'])->name('booking.form');
Route::post('/booking', [LandingController::class, 'storeBooking'])->name('booking.store');
Route::get('/booking/{pemesanan}/nota', [LandingController::class, 'nota'])->name('booking.nota');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.rutes.index');
    })->name('dashboard');

    Route::resource('rutes', RuteController::class);
    Route::resource('pemesanans', PemesananController::class);
});

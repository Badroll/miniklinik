<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\KunjunganController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pasien');

Route::resource('pasien', PasienController::class);
Route::resource('kunjungan', KunjunganController::class);

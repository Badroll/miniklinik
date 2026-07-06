<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini otomatis diberi prefix /api dan middleware 'api'.
|
| Tugas kandidat: tambahkan endpoint REST di sini.
| Contoh yang diharapkan:
|   GET  /api/pasien/{id}/kunjungan  → daftar kunjungan pasien
|   POST /api/pasien/{id}/kunjungan  → tambah kunjungan
*/

Route::get('pasien/{id}/kunjungan', [PasienController::class, "kunjungan"]);

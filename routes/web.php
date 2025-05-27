<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\KecamatanController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Spatie\FlareClient\Http\Exceptions\NotFound;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/navbar', [DashboardController::class, 'index']);
Route::get('/home', [DashboardController::class, 'dashboard']) -> name('home');
Route::get('/data-anak', [AnakController::class, 'dataAnak'])->name('data-anak');
Route::get('/data-kecamatan', [KecamatanController::class, 'dataKecamatan'])->name('data-kecamatan');
Route::get('/notifikasi', [NotifikasiController::class, 'notifikasi'])->name('notifikasi');
Route::get('/data-terbaru/{id}', [NotifikasiController::class, 'dataBaru'])->name('data-terbaru');

Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::get('/profil', [DashboardController::class, 'profil'])->name('profil');
Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');



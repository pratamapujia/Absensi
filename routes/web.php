<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

// Route User Start
Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/prosesLogin', [AuthController::class, 'prosesLogin']);
});

Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index']);
    Route::get('/prosesLogout', [AuthController::class, 'prosesLogout']);

    // Presensi
    Route::get('/presensi/create', [PresensiController::class, 'create']);
    Route::post('/presensi/store', [PresensiController::class, 'store']);

    // Edit Profile
    Route::get('/edit', [PresensiController::class, 'editProfile']);
    Route::post('/presensi/{nik}/updateprofile', [PresensiController::class, 'updateProfile']);

    // Hostori
    Route::get('/presensi/histori', [PresensiController::class, 'histori']);
    Route::post('/gethistori', [PresensiController::class, 'gethistori']);

    // Izin
    Route::get('/presensi/izin', [PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class, 'buatIzin']);
    Route::post('/presensi/storeizin', [PresensiController::class, 'storeIzin']);
});
// Route User End

// Route Admin Start
Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginAdmin');
    })->name('loginAdmin');
    Route::post('/prosesLoginAdmin', [AuthController::class, 'prosesLoginAdmin']);
});

Route::middleware(['auth:user'])->group(function () {
    Route::get('/prosesLogoutAdmin', [AuthController::class, 'prosesLogoutAdmin']);
    Route::get('/panel/dashboard', [AdminController::class, 'index']);

    // Karyawan
    Route::resource('karyawan', KaryawanController::class);
    Route::get('/karyawan/{nik}/setjam', [KaryawanController::class, 'setjam'])->name('karyawan.setjam');

    // Set Jam
    Route::resource('konfigurasi/setjam', JamController::class);

    // Departemen
    Route::resource('departemen', DepartemenController::class);
    Route::post('/departemen/edit', [DepartemenController::class, 'edit']);

    // Monitoring
    Route::get('/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getPresensi', [PresensiController::class, 'getPresensi']);

    // Laporan
    Route::get('/laporan/absensi', [PresensiController::class, 'laporan']);
    Route::post('/prosesCetak', [PresensiController::class, 'cetakLaporan']);
    Route::get('/laporan/rekab', [PresensiController::class, 'rekab']);
    Route::post('/cetakRekab', [PresensiController::class, 'cetakRekab']);

    // Setting Lokasi
    Route::get('/konfigurasi/lokasi', [KonfigurasiController::class, 'setLokasi']);
    Route::post('/lokasi/updateLokasi', [KonfigurasiController::class, 'updateLokasi']);

    // Izin / Sakit
    Route::get('izin', [IzinController::class, 'index']);
    Route::post('/izin/{id}/update', [IzinController::class, 'update']);
    Route::post('/izin/{id}/cancel', [IzinController::class, 'cancel']);
});
// Route Admin End

<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

// PERBAIKAN: Mengubah rute utama agar SELALU meminta login terlebih dahulu
Route::get('/', function () {
    // Kita hapus pengecekan auth()->check(), jadi setiap akses awal wajib ke form login
    return redirect()->route('login');
});

// Semua fitur absensi santri dikunci, hanya bisa diakses jika sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/absensi', [AttendanceController::class, 'index'])->name('absensi.index');
    Route::post('/absensi', [AttendanceController::class, 'store'])->name('absensi.store');
    Route::put('/absensi/{attendance}', [AttendanceController::class, 'update'])->name('absensi.update');
    Route::delete('/absensi/{attendance}', [AttendanceController::class, 'destroy'])->name('absensi.destroy');
});

require __DIR__.'/auth.php';

// Rute keluar untuk menghapus sesi
Route::get('/keluar', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

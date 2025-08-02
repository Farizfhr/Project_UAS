<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::post('/autologout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return response()->json(['status' => 'logged out']);
})->middleware('auth')->name('autologout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Resource route untuk mahasiswa (CRUD lengkap)
Route::resource('mahasiswa', MahasiswaController::class);

// Resource route untuk matakuliah (CRUD lengkap)
Route::resource('matakuliah', MatakuliahController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
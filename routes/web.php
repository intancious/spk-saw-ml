<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PerhitunganController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\SubkriteriaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\HasilController as FrontendHasilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login'])->name('login.proses');
});

Route::get('/home', function () {
    return redirect('/admin/super');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
    Route::get('/admin/super', [AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('user')->middleware('userAkses:user');
    Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware('userAkses:admin')->prefix('admin')->group(function () {
        // 🔹 User
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // 🔹 Alternatif
        Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('alternatif/edit/{id}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::put('alternatif/update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('alternatif/delete/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

        // 🔹 Kriteria
        Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
        Route::post('kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        Route::put('kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('kriteria/delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

        // 🔹 Sub Kriteria
        Route::get('subkriteria', [SubkriteriaController::class, 'index'])->name('subkriteria.index');
        Route::get('subkriteria/create', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
        Route::post('subkriteria/store', [SubKriteriaController::class, 'store'])->name('subkriteria.store');
        Route::get('subkriteria/edit/{id}', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
        Route::put('subkriteria/update/{id}', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
        Route::delete('subkriteria/delete/{id}', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');

        // Periode
        Route::get('periode', [PeriodeController::class, 'index'])->name('periode.index');
        Route::get('periode/create', [PeriodeController::class, 'create'])->name('periode.create');
        Route::post('periode', [PeriodeController::class, 'store'])->name('periode.store');
        Route::get('periode/{id}/edit', [PeriodeController::class, 'edit'])->name('periode.edit');
        Route::put('periode/{id}', [PeriodeController::class, 'update'])->name('periode.update');
        Route::delete('periode/{id}', [PeriodeController::class, 'destroy'])->name('periode.destroy');
        Route::post('periode/{id}/activate', [PeriodeController::class, 'activate'])->name('periode.activate');

        // 🔹 Penilaian
        Route::get('penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');        // halaman daftar
        Route::post('penilaian', [PenilaianController::class, 'store'])->name('penilaian.store'); // input / update nilai

        // 🔹 Perhitungan
        Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
        Route::get('/perhitungan/{id}', [PerhitunganController::class, 'show'])->name('perhitungan.show');

        // 🔹 Hasil perhitungan
        Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
        Route::get('/hasil/{id}', [HasilController::class, 'show'])->name('hasil.show');
    });
});

Route::get('/', [FrontendHasilController::class, 'index'])->name('frontend.hasil');

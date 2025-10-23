<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\SubkriteriaController;
use App\Http\Controllers\AdminController;
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
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login'])->name('login.proses');
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


    // Route::middleware('userAkses:admin')->prefix('admin')->group(function () {
    //     Route::resource('alternatif', AlternatifController::class);
    // });


    Route::middleware('userAkses:admin')->prefix('admin')->group(function () {
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

        // 🔹 Hasil perhitungan
        Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');
        Route::get('hasil/create', [HasilController::class, 'create'])->name('hasil.create');
        Route::post('hasil/store', [HasilController::class, 'store'])->name('hasil.store');
        Route::get('hasil/edit/{id}', [HasilController::class, 'edit'])->name('hasil.edit');
        Route::put('hasil/update/{id}', [HasilController::class, 'update'])->name('hasil.update');
        Route::delete('hasil/delete/{id}', [HasilController::class, 'destroy'])->name('hasil.destroy');

        // 🔹 Alternatif
        Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::put('alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

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
    });
});

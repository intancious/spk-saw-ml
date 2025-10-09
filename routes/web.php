<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PenilaianController;
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

    // 🔹 Alternatif (khusus admin)
    Route::middleware('userAkses:admin')->prefix('admin/alternatif')->group(function () {
        Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('/create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('/store', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('/edit/{id}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::put('/update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('/delete/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
    });

    // 🔹 Kriteria
    Route::middleware('userAkses:admin')->prefix('admin/kriteria')->group(function () {
        Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('/create', [KriteriaController::class, 'create'])->name('kriteria.create');
        Route::post('/store', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        Route::put('/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('/delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
    });

    // 🔹 Sub Kriteria
    Route::middleware('userAkses:admin')->prefix('admin/subkriteria')->group(function () {
        Route::get('/', [SubkriteriaController::class, 'index'])->name('subkriteria.index');
        Route::get('/create', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
        Route::post('/store', [SubKriteriaController::class, 'store'])->name('subkriteria.store');
        Route::get('/edit/{id}', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
        Route::put('/update/{id}', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
        Route::delete('/delete/{id}', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');
    });

    // 🔹 Penilaian
    Route::middleware('userAkses:admin')->prefix('admin/penilaian')->group(function () {
        Route::get('/', [PenilaianController::class, 'index'])->name('penilaian.index');
        Route::get('/create', [PenilaianController::class, 'create'])->name('penilaian.create');
        Route::post('/store', [PenilaianController::class, 'store'])->name('penilaian.store');
        Route::get('/edit/{id}', [PenilaianController::class, 'edit'])->name('penilaian.edit');
        Route::put('/update/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
        Route::delete('/delete/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
    });

    // 🔹 Hasil
    Route::middleware('userAkses:admin')->prefix('admin/hasil')->group(function () {
        Route::get('/', [HasilController::class, 'index'])->name('hasil.index');
        Route::get('/create', [HasilController::class, 'create'])->name('hasil.create');
        Route::post('/store', [HasilController::class, 'store'])->name('hasil.store');
        Route::get('/edit/{id}', [HasilController::class, 'edit'])->name('hasil.edit');
        Route::put('/update/{id}', [HasilController::class, 'update'])->name('hasil.update');
        Route::delete('/delete/{id}', [HasilController::class, 'destroy'])->name('hasil.destroy');
    });

    // 🔹 Alternatif
    Route::middleware('userAkses:admin')->prefix('admin')->group(function () {
        Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::put('alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
    });
});

<?php

<<<<<<< HEAD
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
=======
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
>>>>>>> 1b2868bb53a74e3e94e1a63d99eeadbfe3a1727c

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

<<<<<<< HEAD

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
});
=======
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> 1b2868bb53a74e3e94e1a63d99eeadbfe3a1727c

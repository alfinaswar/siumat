<?php

use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasterKubController;
use App\Http\Controllers\MasterMajelisController;
use App\Http\Controllers\MasterPendetaController;
use App\Http\Controllers\MasterRayonController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('pendeta')->group(function () {
        Route::GET('/', [MasterPendetaController::class, 'index'])->name('pendeta.index');
        Route::GET('/create', [MasterPendetaController::class, 'create'])->name('pendeta.create');
        Route::POST('/simpan', [MasterPendetaController::class, 'store'])->name('pendeta.store');
        Route::GET('/edit/{id}', [MasterPendetaController::class, 'edit'])->name('pendeta.edit');
        Route::PUT('/update/{id}', [MasterPendetaController::class, 'update'])->name('pendeta.update');
        Route::delete('hapus/{id}', [MasterPendetaController::class, 'destroy'])->name('pendeta.destroy');
    });
    Route::prefix('rayon')->group(function () {
        Route::GET('/', [MasterRayonController::class, 'index'])->name('rayon.index');
        Route::GET('/create', [MasterRayonController::class, 'create'])->name('rayon.create');
        Route::POST('/simpan', [MasterRayonController::class, 'store'])->name('rayon.store');
        Route::GET('/edit/{id}', [MasterRayonController::class, 'edit'])->name('rayon.edit');
        Route::PUT('/update/{id}', [MasterRayonController::class, 'update'])->name('rayon.update');
        Route::delete('hapus/{id}', [MasterRayonController::class, 'destroy'])->name('rayon.destroy');
    });

    Route::prefix('majelis')->group(function () {
        Route::GET('/', [MasterMajelisController::class, 'index'])->name('majelis.index');
        Route::GET('/create', [MasterMajelisController::class, 'create'])->name('majelis.create');
        Route::POST('/simpan', [MasterMajelisController::class, 'store'])->name('majelis.store');
        Route::GET('/edit/{id}', [MasterMajelisController::class, 'edit'])->name('majelis.edit');
        Route::PUT('/update/{id}', [MasterMajelisController::class, 'update'])->name('majelis.update');
        Route::delete('hapus/{id}', [MasterMajelisController::class, 'destroy'])->name('majelis.destroy');
    });
    Route::prefix('data-kk')->group(function () {
        Route::GET('/', [KartuKeluargaController::class, 'index'])->name('data-kk.index');
        Route::GET('/create', [KartuKeluargaController::class, 'create'])->name('data-kk.create');
        Route::POST('/simpan', [KartuKeluargaController::class, 'store'])->name('data-kk.store');
        Route::GET('/edit/{id}', [KartuKeluargaController::class, 'edit'])->name('data-kk.edit');
        Route::PUT('/update/{id}', [KartuKeluargaController::class, 'update'])->name('data-kk.update');
        Route::delete('hapus/{id}', [KartuKeluargaController::class, 'destroy'])->name('data-kk.destroy');
    });
    Route::prefix('data-induk')->group(function () {
        Route::GET('/', [KartuKeluargaController::class, 'index'])->name('data-induk.index');
        Route::GET('/create', [KartuKeluargaController::class, 'create'])->name('data-induk.create');
        Route::POST('/simpan', [KartuKeluargaController::class, 'store'])->name('data-induk.store');
        Route::GET('/edit/{id}', [KartuKeluargaController::class, 'edit'])->name('data-induk.edit');
        Route::PUT('/update/{id}', [KartuKeluargaController::class, 'update'])->name('data-induk.update');
        Route::delete('hapus/{id}', [KartuKeluargaController::class, 'destroy'])->name('data-induk.destroy');
    });
    Route::prefix('master-kub')->group(function () {
        Route::GET('/', [MasterKubController::class, 'index'])->name('kub.index');
        Route::GET('/create', [MasterKubController::class, 'create'])->name('kub.create');
        Route::POST('/simpan', [MasterKubController::class, 'store'])->name('kub.store');
        Route::GET('/edit/{id}', [MasterKubController::class, 'edit'])->name('kub.edit');
        Route::PUT('/update/{id}', [MasterKubController::class, 'update'])->name('kub.update');
        Route::delete('hapus/{id}', [MasterKubController::class, 'destroy'])->name('kub.destroy');
    });
    Route::prefix('laporan')->group(function () {
        Route::GET('/', [LaporanController::class, 'index'])->name('laporan.index');
    });

    Route::get('provinces', [DependantDropdownController::class, 'provinces'])->name('provinces');
    Route::get('cities', [DependantDropdownController::class, 'cities'])->name('cities');
    Route::get('districts', [DependantDropdownController::class, 'districts'])->name('districts');
    Route::get('villages', [DependantDropdownController::class, 'villages'])->name('villages');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

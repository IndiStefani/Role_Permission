<?php

use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkeluarController;
use App\Http\Controllers\SmasukController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::prefix('/Dashboard')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});

Route::prefix('/User-Management')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user_management.index');
    Route::get('/Profile', [UserController::class, 'profile'])->name('user_management.profile');
    Route::get('/create', [UserController::class, 'create'])->name('user_management.create');
    Route::post('/store', [UserController::class, 'store'])->name('user_management.store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user_management.edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('user_management.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('user_management.destroy');
});

Route::prefix('/Jabatan')->middleware(['auth'])->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('/edit/{jabatan}', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('/update/{jabatan}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/{jabatan}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
});

Route::prefix('/Surat-Masuk')->middleware(['auth'])->group(function () {
    Route::get('/', [SmasukController::class, 'index'])->name('surat_masuk.index');
    Route::get('/Pegawai', [SmasukController::class, 'index_pegawai'])->name('surat_masuk.index_pegawai');
    Route::get('/view/{id}', [SmasukController::class, 'view'])->name('surat_masuk.view');
    Route::get('/create', [SmasukController::class, 'create'])->name('surat_masuk.create');
    Route::post('/store', [SmasukController::class, 'store'])->name('surat_masuk.store');
    Route::get('/edit/{Smasuk}', [SmasukController::class, 'edit'])->name('surat_masuk.edit');
    Route::put('/update/{Smasuk}', [SmasukController::class, 'update'])->name('surat_masuk.update');
    Route::delete('/{Smasuk}', [SmasukController::class, 'destroy'])->name('surat_masuk.destroy');
    Route::post('/store/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
});

Route::prefix('/Surat-Keluar')->middleware(['auth'])->group(function () {
    Route::get('/', [SkeluarController::class, 'index'])->name('surat_keluar.index');
    Route::get('/view/{id}', [SkeluarController::class, 'view'])->name('surat_keluar.view');
    Route::get('/create', [SkeluarController::class, 'create'])->name('surat_keluar.create');
    Route::post('/store', [SkeluarController::class, 'store'])->name('surat_keluar.store');
    Route::get('/edit/{Smasuk}', [SkeluarController::class, 'edit'])->name('surat_keluar.edit');
    Route::put('/update/{Smasuk}', [SkeluarController::class, 'update'])->name('surat_keluar.update');
    Route::delete('/{Smasuk}', [SkeluarController::class, 'destroy'])->name('surat_keluar.destroy');
    Route::post('/store/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
    Route::post('/store/disposisi_keluar', [DisposisiController::class, 'store_Skeluar'])->name('disposisi_keluar.store');
});

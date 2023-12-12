<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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
    return view('welcome');
});

Route::get('/dashboard', function() {
return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
});

Route::prefix('/User-Management')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user_management.index');
    Route::get('/create', [UserController::class, 'create'])->name('user_management.create');
    Route::post('/store', [UserController::class, 'store'])->name('user_management.store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user_management.edit');
    Route::put('/{user}/update', [UserController::class, 'update'])->name('user_management.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('user_management.destroy');
});
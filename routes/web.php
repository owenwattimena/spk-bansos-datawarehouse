<?php

use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['guest'])->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/', [AuthController::class, 'doLogin'])->name('auth.dologin');
    });
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/import', [ImportController::class, 'index'])->name('import');
    Route::post('/import', [ImportController::class, 'import'])->name('import.post');

    Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis');
    Route::get('/analisis/result', [AnalisisController::class, 'analitics'])->name('analisis.result');
    Route::get('/analisis/result/report', [AnalisisController::class, 'report'])->name('analisis.result.report');

    Route::get('/profile', [ProfileController::class, 'index'])->name('akun.profil');
    Route::put('/profile', [ProfileController::class, 'updateUsername'])->name('akun.profil.username');
    Route::put('/profile/ubah-password', [ProfileController::class, 'changePassword'])->name('akun.profil.password');
});

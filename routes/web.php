<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cronometro', [TimerController::class, 'index'])->name('timer.index');
Route::get('/propinas', [TipController::class, 'index'])->name('tips.index');
Route::get('/generar-contraseña', [PasswordController::class, 'index'])->name('password.index');
Route::post('/generar-contraseña', [PasswordController::class, 'index']);
Route::get('/propina', [TipController::class, 'index'])->name('tips.index');
Route::post('/propina', [TipController::class, 'index'])->name('tips.index');


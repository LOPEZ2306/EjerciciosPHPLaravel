<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ExpensesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cronometro', [TimerController::class, 'index'])->name('timer.index');
Route::get('/propinas', [TipController::class, 'index'])->name('tips.index');
Route::get('/generar-contraseña', [PasswordController::class, 'index'])->name('password.index');
Route::post('/generar-contraseña', [PasswordController::class, 'index']);
Route::get('/propina', [TipController::class, 'index'])->name('tips.index');
Route::post('/propina', [TipController::class, 'index'])->name('tips.index');
Route::get('/notas', [NotesController::class, 'index'])->name('notes.index');
Route::get('/tareas', [TasksController::class, 'index'])->name('tasks.index');
Route::get('/gastos', [ExpensesController::class, 'index'])->name('expenses.index');

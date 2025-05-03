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

Route::get('/generar-contraseña', [PasswordController::class, 'index'])->name('password.index');
Route::post('/generar-contraseña', [PasswordController::class, 'index']);

Route::get('/propinas', [TipController::class, 'index'])->name('tips.index');
Route::get('/propina', [TipController::class, 'index'])->name('tips.index');
Route::post('/propina', [TipController::class, 'index'])->name('tips.index');

Route::get('/notas/buscar', [NotesController::class, 'search'])->name('notes.search');

Route::get('/notas', [NotesController::class, 'index'])->name('notes.index');
Route::get('/notas/crear', [NotesController::class, 'create'])->name('notes.create');
Route::post('/notas', [NotesController::class, 'store'])->name('notes.store');
Route::get('/notas/{note}/editar', [NotesController::class, 'edit'])->name('notes.edit');
Route::put('/notas/{note}', [NotesController::class, 'update'])->name('notes.update');
Route::delete('/notas/{note}', [NotesController::class, 'delete'])->name('notes.delete');
Route::get('/notas/{id}', [NotesController::class, 'show'])->name('notes.show');


Route::get('/tarea/buscar', [TasksController::class, 'search'])->name('tasks.search');

Route::get('/tarea', [TasksController::class, 'index'])->name('tasks.index');
Route::post('/tarea/{task}/toggle', [TasksController::class, 'toggleCompletion'])->name('tasks.toggle');
Route::get('/tarea/crear', [TasksController::class, 'create'])->name('tasks.create');
Route::post('/tarea', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/tarea/{task}/editar', [TasksController::class, 'edit'])->name('tasks.edit');
Route::put('/tarea/{task}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tarea/{task}', [TasksController::class, 'delete'])->name('tasks.delete');
Route::get('/tarea/{id}', [TasksController::class, 'show'])->name('tasks.show');

Route::get('/gastos', [ExpensesController::class, 'index'])->name('expenses.index');

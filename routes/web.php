<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('turmas', TurmaController::class);
Route::resource('alunos', AlunoController::class);
Route::resource('notas', NotaController::class);
Route::get('/relatorios', [RelatorioController::class, 'index'])
        ->name('relatorios.index');
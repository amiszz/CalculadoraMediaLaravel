<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('turmas', TurmaController::class);
Route::resource('alunos', AlunoController::class);
Route::resource('notas', NotaController::class);
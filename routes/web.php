<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\FilmeController;


Route::get('/', function () {
    return view('index');
});

Route::get('/genero/listar', [GeneroController::class, 'listar']);
Route::get('/genero/novo', [GeneroController::class, 'novo']);
Route::get('/genero/editar/{id}', [GeneroController::class, 'editar']);
Route::get('/genero/excluir/{id}', [GeneroController::class, 'excluir']);
Route::post('/genero/salvar', [GeneroController::class, 'salvar']);

Route::get('/diretor/listar', [DiretorController::class, 'listar']);
Route::get('/diretor/novo', [DiretorController::class, 'novo']);
Route::get('/diretor/editar/{id}', [DiretorController::class, 'editar']);
Route::get('/diretor/excluir/{id}', [DiretorController::class, 'excluir']);
Route::post('/diretor/salvar', [DiretorController::class, 'salvar']);


Route::get('/filme/listar', [FilmeController::class, 'listar']);
Route::get('/filme/novo', [FilmeController::class, 'novo']);
Route::get('/filme/editar/{id}', [FilmeController::class, 'editar']);
Route::get('/filme/excluir/{id}', [FilmeController::class, 'excluir']);
Route::post('/filme/salvar', [FilmeController::class, 'salvar']);




<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ItemPedidoController;

Route::get('/', function () {
    return view('index');
});


Route::get('/pedido/listar', [PedidoController::class, 'listar']);
Route::get('/pedido/novo', [PedidoController::class, 'novo']);
Route::get('/pedido/editar/{id}', [PedidoController::class, 'editar']);
Route::get('/pedido/excluir/{id}', [PedidoController::class, 'excluir']);
Route::post('/pedido/salvar', [PedidoController::class, 'salvar']);
Route::get('pedido/{id}/detalhes', 'PedidoController@detalhes')->name('pedido.detalhes');

Route::get('/cliente/listar', [ClienteController::class, 'listar']);
Route::get('/cliente/novo', [ClienteController::class, 'novo']);
Route::get('/cliente/editar/{id}', [ClienteController::class, 'editar']);
Route::get('/cliente/excluir/{id}', [ClienteController::class, 'excluir']);
Route::post('/cliente/salvar', [ClienteController::class, 'salvar']);

Route::get('/produto/listar', [ProdutoController::class, 'listar']);
Route::get('/produto/novo', [ProdutoController::class, 'novo']);
Route::get('/produto/editar/{id}', [ProdutoController::class, 'editar']);
Route::get('/produto/excluir/{id}', [ProdutoController::class, 'excluir']);
Route::post('/produto/salvar', [ProdutoController::class, 'salvar']);

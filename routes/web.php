<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'homeView']);



Route::get('/login', [UsuarioController::class, 'loginView']);
Route::post('/fazer-login', [UsuarioController::class, 'login']);

Route::get('/cadastro', [UsuarioController::class, 'cadastroView']);
Route::post('/fazer-cadastro', [UsuarioController::class, 'cadastro']);

Route::get('/conta', [UsuarioController::class, 'contaView']);
Route::post('/fazer-conta', [UsuarioController::class, 'conta']);
Route::post('/fazer-imovel', [UsuarioController::class, 'cadastro_Imovel']);
Route::post('/deletar', [UsuarioController::class, 'deletar_imovel']);


Route::get('/imagens/{id}', [UsuarioController::class, 'imagensView']);
Route::post('/imagens', [UsuarioController::class, 'imagens']);
Route::post('/deletar_imagens', [UsuarioController::class, 'delete_imagens']);

Route::post('/refazer-imovel', [UsuarioController::class, 'alterar_Imovel']);


Route::get('/venda', [ImovelController::class, 'vendaView']);


Route::get('/pesquisa', [ImovelController::class, 'pesquisaView']);

Route::get('/teste', function () {
    return view('teste');
});
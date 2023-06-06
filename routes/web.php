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
Route::post('/deletar', [UsuarioController::class, 'deletar_imovel']);


Route::get('/imagens/{id}', [UsuarioController::class, 'imagensView']);
Route::post('/imagens', [UsuarioController::class, 'imagens']);
Route::post('/deletar_imagens', [UsuarioController::class, 'delete_imagens']);




Route::get('/venda', [ImovelController::class, 'vendaView']);
Route::post('/fazer-imovel', [ImovelController::class, 'cadastro_Imovel']);

Route::get('/alterar/{id}', [ImovelController::class, 'alterarView']);
Route::post('/enviar-imovel', [ImovelController::class, 'caminho_alterar']);
Route::post('/refazer-imovel', [ImovelController::class, 'alterar_Imovel']);
Route::post('/imagens-alterar', [ImovelController::class, 'imagens_alterar']);
Route::post('/deletar_imagens-alterar', [ImovelController::class, 'delete_imagens_alterar']);


Route::get('/pesquisa', [ImovelController::class, 'pesquisaView']);

Route::get('/imovel/{id}', [ImovelController::class, 'imovelView']);
Route::post('/caminho-imovel', [ImovelController::class, 'verimovel']);



Route::get('/teste', function () {
    return view('teste');
});
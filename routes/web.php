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
Route::get('/fazer-login', [UsuarioController::class, 'login']);

Route::get('/cadastro', [UsuarioController::class, 'cadastroView']);
Route::get('/fazer-cadastro', [UsuarioController::class, 'cadastro']);

Route::get('/conta', [UsuarioController::class, 'contaView']);



Route::get('/venda', [ImovelController::class, 'vendaView']);

Route::get('/pesquisa', [ImovelController::class, 'pesquisaView']);

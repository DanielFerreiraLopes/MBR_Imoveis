<?php

use Illuminate\Support\Facades\Session;

$logado = Session::get("info_usuario");


?>
<title>Pesquisa - MBR Imoveis</title>
<x-layout>

    <h3>Alterar Informações do Imovel</h3>

    <form action="/refazer-imovel" method="post" class='form-venda'>
        <input type="hidden" name="imovel" value="{{ $id_imovel }}">
        Nome:<input type="text" name="quarto" placeholder="{{ $imovel->quarto }}" value="{{ $imovel->quarto }}">
        Banheiro:<input type="text" name="banheiro" placeholder="{{ $imovel->banheiro }}" value="{{  $imovel->banheiro }}">
        Preco:<input type="text" name="preco" placeholder="{{ $imovel->preco }}" value="{{ $imovel->preco }}">
        Estado:<input type="text" name="estado" placeholder="{{ $imovel->estado }}" value="{{ $imovel->estado }}">
        Cidade:<input type="text" name="cidade" placeholder="{{ $imovel->cidade }}" value="{{ $imovel->cidade }}">
        Rua: <input type="text" name="rua" placeholder="{{ $imovel->rua }}" value="{{ $imovel->rua }}">
        Bairro: <input type="text" name="bairro" placeholder="{{ $imovel->bairro }}" value="{{ $imovel->bairro }}">
        Numero:<input type="text" name="numero" placeholder="{{ $imovel->numero }}" value="{{ $imovel->numero }}">
        Cep:<input type=" text" name="cep" placeholder="{{ $imovel->cep }}" value="{{ $imovel->cep }}">
        Descricao:<input type="text" name="descricao" placeholder="{{ $imovel->descricao }}" value="{{ $imovel->descricao }}"><br>
        <input type="submit" value="Registrar">
        @csrf
    </form>

</x-layout>
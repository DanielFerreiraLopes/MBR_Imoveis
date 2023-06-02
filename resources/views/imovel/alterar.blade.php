<?php

use Illuminate\Support\Facades\Session;

$logado = Session::get("info_usuario");


?>
<title>Pesquisa - MBR Imoveis</title>
<x-layout>

    <h3>Alterar Informações do Imovel</h3>

    <form action="/refazer-imovel" method="post" class='form-venda'>
        <input type="hidden" name="imovel" value="{{ $id_imovel }}">
        Nome:<input type="text" name="quarto" placeholder="{{ $imovel->quarto }}" value="{{ $logado->quarto }}">
        Banheiro:<input type="text" name="banheiro" placeholder="{{ $imovel->banheiro }}" value="{{ $logado->banheiro }}">
        Preco:<input type="text" name="preco" placeholder="{{ $imovel->preco }}" value="{{ $logado->preco }}">
        Estado:<input type="text" name="estado" placeholder="{{ $imovel->estado }}" value="{{ $logado->estado }}">
        Cidade:<input type="text" name="cidade" placeholder="{{ $imovel->cidade }}" value="{{ $logado->cidade }}">
        Rua: <input type="text" name="rua" placeholder="{{ $imovel->rua }}" value="{{ $logado->rua }}">
        Bairro: <input type="text" name="bairro" placeholder="{{ $imovel->bairro }}" value="{{ $logado->bairro }}">
        Numero:<input type="text" name="numero" placeholder="{{ $imovel->numero }}" value="{{ $logado->numero }}">
        Cep:<input type="text" name="cep" placeholder="{{ $imovel->cep }}" value="{{ $logado->cep }}">
        Descricao:<input type="text" name="descricao" placeholder="{{ $imovel->descricao }}" value="{{ $logado->descrição }}"><br>
        <input type="submit" value="Registrar">
        @csrf
    </form>

</x-layout>
<?php

use Illuminate\Support\Facades\Session;

$logado = Session::get("info_usuario");


?>
<title>Pesquisa - MBR Imoveis</title>
<link rel="stylesheet" href="/css/alterar.css">
<link rel="stylesheet" href="/css/flex.css">
<x-layout>
  <h1>Alterar Informações do Imovel</h1>
    

    <div class="alterar">

      

        <form action="/refazer-imovel" method="post" class='form-venda'>
            <div class="espaco">
                <input type="hidden" name="imovel" id="Imovel" value="{{ $id_imovel }}">
            </div>

            <div>
                <label for="quarto">Quartos: </label>
                <input type="text" name="quarto" id="quarto" placeholder="{{ $imovel->quarto }}"
                    value="{{ $imovel->quarto }}">
            </div>

            <div>
                <label for="banheiro">Banheiro: </label>
                <input type="text" name="banheiro" id="banheiro" placeholder="{{ $imovel->banheiro }}"
                    value="{{  $imovel->banheiro }}">
            </div>

            <div>
                <label for="preco">Preço: </label>
                <input type="text" name="preco" id="preco" placeholder="{{ $imovel->preco }}"
                    value="{{ $imovel->preco }}">
            </div>

            <div>
                <label for="estado">Estado: </label>
                <input type="text" name="estado" id="estado" placeholder="{{ $imovel->estado }}"
                    value="{{ $imovel->estado }}">
            </div>

            <div>
                <label for="cidade">Cidade: </label>
                <input type="text" name="cidade" id="cidade" placeholder="{{ $imovel->cidade }}"
                    value="{{ $imovel->cidade }}">
            </div>

            <div>
                <label for="rua">Rua: </label>
                <input type="text" name="rua" id="rua" placeholder="{{ $imovel->rua }}" value="{{ $imovel->rua }}">
            </div>

            <div>
                <label for="bairro">Bairro: </label>
                <input type="text" name="bairro" id="bairro" placeholder="{{ $imovel->bairro }}"
                    value="{{ $imovel->bairro }}">
            </div>

            <div>
                <label for="numero">Numero: </label>
                <input type="text" name="numero" id="numero" placeholder="{{ $imovel->numero }}"
                    value="{{ $imovel->numero }}">
            </div>

            <div>
                <label for="cep">CEP: </label>
                <input type=" text" name="cep" id="cep" placeholder="{{ $imovel->cep }}" value="{{ $imovel->cep }}">
            </div>

            <div>
                <label for="descricao">Descrição: </label>
                <input type="text" name="descricao" id="descricao" placeholder="{{ $imovel->descricao }}"
                    value="{{ $imovel->descricao }}"><br>
            </div> <input type="submit" value="Registrar" >
            @csrf
        </form>
    </div>

<div class="espaco">
    <form action="/imagens-alterar" method="POST" enctype="multipart/form-data" class='form-img'>
        @csrf
        <input type="file" name="image">
        <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
        <button type="submit">Enviar</button>
    </form>
    </div>
    <div class='imagens'>

    @foreach ($imagens as $imagem)
     <div class="box-img-imovel">
    <img src="{{ $imagem->arquivo }}"><br>
   

    
    <form action="/deletar_imagens-alterar" method="post">
        @csrf
        <input type="hidden" name="id_imagem" value="{{ $imagem->id }}">
        <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
        <button type="submit" class='delete'>Deletar</button><br>
    </form>
 </div>
    

    @endforeach


    
    </div>


</x-layout>
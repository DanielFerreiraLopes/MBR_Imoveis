<title>Venda - MBR Imoveis</title>
<x-layout>

    <link rel="stylesheet" href="/css/venda.css">
 <div id="page-venda">
    <h1>Registre seu Imóvel</h1>
    <hr>

        <form action="fazer-imovel" method="post" class='form-venda'>
             <h4 style="text-align: center;">Coloque as Informações sobre o imovel</h4>
             <div class="line">
                <input type="number" name="quarto" placeholder="Quarto" value="{{ $logado->quarto }}" step="1">
                <input type="number" name="banheiro" placeholder="Banheiro" value="{{ $logado->banheiro }}" step="1">
                <input type="number" name="preco" placeholder="Preço" value="{{ $logado->preco }}" step="0.01">
            </div>
            
            <div class="line">
                <input type="text" name="estado" placeholder="Estado" value="{{ $logado->estado }}">
                <input type="text" name="cidade" placeholder="Cidade" value="{{ $logado->cidade }}">
                <input type="text" name="rua" placeholder="Rua" value="{{ $logado->rua }}">
            </div>
            
            <div class="line">
                <input type="text" name="bairro" placeholder="Bairro" value="{{ $logado->bairro }}">
                <input type="text" name="numero" placeholder="Numero" value="{{ $logado->numero }}">
                <input type="text" name="cep" placeholder="Cep" value="{{ $logado->cep }}">
            </div>
            <div class="line">
                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição... (Procure colocar palavras chaves para que outros achem seu imovel com mais facilidade)" value="{{ $logado->descrição }}"></textarea>
                    <!--<input type="text" name="descricao" placeholder="Descrição" value="{{ $logado->descrição }}"><br> -->
            </div>
            <br>
            <div class="line">
                <button type="submit" value="Registrar" id="reg">Registrar</button>
                <button type="reset" id="reset">Limpar</button>
            </div>
            @csrf
        </form>
   </div>
</x-layout>
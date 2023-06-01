<title>Pesquisa - MBR Imoveis</title>
<x-layout>

    <h3>Alterar Informações do Imovel</h3>

    <form action="refazer-imovel" method="post" class='form-venda'>
        <input type="text" name="quarto" placeholder="Quarto" value="{{ $logado->quarto }}">
        <input type="text" name="banheiro" placeholder="Banheiro" value="{{ $logado->banheiro }}">
        <input type="text" name="preco" placeholder="Preço" value="{{ $logado->preco }}">
        <input type="text" name="estado" placeholder="Estado" value="{{ $logado->estado }}">
        <input type="text" name="cidade" placeholder="Cidade" value="{{ $logado->cidade }}">
        <input type="text" name="rua" placeholder="Rua" value="{{ $logado->rua }}">
        <input type="text" name="bairro" placeholder="Bairro" value="{{ $logado->bairro }}">
        <input type="text" name="numero" placeholder="Numero" value="{{ $logado->numero }}">
        <input type="text" name="cep" placeholder="Cep" value="{{ $logado->cep }}">
        <input type="text" name="descricao" placeholder="Descrição" value="{{ $logado->descrição }}"><br>
        <input type="submit" value="Registrar">
        @csrf
    </form>

</x-layout>
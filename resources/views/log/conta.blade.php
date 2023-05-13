<title>Conta - MBR Imoveis</title>
<x-layout>

    <form action="fazer-conta" method="post">
        <input type="text" name="nome_novo" placeholder="nome" value="{{ $logado->nome }}">
        <input type="text" name="email_novo" placeholder="email" value="{{ $logado->email }}">
        <input type="text" name="telefone_novo" placeholder="telefone" value="{{ $logado->telefone }}">
        <input type="text" name="senha_novo" placeholder="senha" value="{{ $logado->senha }}">
        <input type="submit" value="Borra!">
        @csrf
    </form>


    <form action="fazer-imovel" method="post">
        <input type="text" name="quarto" placeholder="quarto" value="{{ $logado->quarto }}">
        <input type="text" name="banheiro" placeholder="banheiro" value="{{ $logado->banheiro }}">
        <input type="text" name="preco" placeholder="preco" value="{{ $logado->preco }}">
        <input type="text" name="estado" placeholder="estado" value="{{ $logado->estado }}">
        <input type="text" name="cidade" placeholder="cidade" value="{{ $logado->cidade }}">
        <input type="text" name="rua" placeholder="rua" value="{{ $logado->rua }}">
        <input type="text" name="bairro" placeholder="bairro" value="{{ $logado->bairro }}">
        <input type="text" name="numero" placeholder="numero" value="{{ $logado->numero }}">
        <input type="text" name="cep" placeholder="cep" value="{{ $logado->cep }}">
        <input type="text" name="descricao" placeholder="descrição" value="{{ $logado->descrição }}">
        <input type="submit" value="VEM!">
        @csrf
    </form>

    @foreach ($imoveis as $imovel)
    <p>{{ $imovel->id }}</p>
    <form action="deletar_imovel" method="post">
        <input type="hidden" name="id_imovel" value="{{ $imovel->id }}">
        <button type="submit">Deletar</button>
        @csrf
    </form>
    @endforeach


</x-layout>
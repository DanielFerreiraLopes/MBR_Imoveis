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
        <input type="text" name="quarto" placeholder="nome" value="{{ $logado->nome }}">
        <input type="text" name="banheiro" placeholder="email" value="{{ $logado->email }}">
        <input type="text" name="preco" placeholder="telefone" value="{{ $logado->telefone }}">
        <input type="text" name="senha_novo" placeholder="senha" value="{{ $logado->senha }}">
        <input type="submit" value="VEM!">
        @csrf
    </form>

</x-layout>
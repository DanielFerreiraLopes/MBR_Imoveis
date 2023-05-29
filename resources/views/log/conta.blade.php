<title>Conta - MBR Imoveis</title>

<x-layout>

    <link rel="stylesheet" href="/css/log_novo.css">

    <div class="log_novo">
    <H4>Alterar informaçoes da conta</H4>
    <form action="fazer-conta" method="post" class='alt-log'>
        <input type="text" name="nome_novo" placeholder="nome" value="{{ $logado->nome }}">
        <input type="text" name="email_novo" placeholder="email" value="{{ $logado->email }}">
        <input type="text" name="tele_novo" placeholder="telefone" value="{{ $logado->telefone }}">
        <input type="text" name="senha_novo" placeholder="senha" value="{{ $logado->senha }}">
        <input type="submit" value="Alterar">
        @csrf
    </form>

    </div>



    

    @foreach ($imoveis as $imovel)
    <p>{{ $imovel->id }}</p>
    <form action="deletar" method="post">
        <input type="hidden" name="id_imovel" value="{{ $imovel->id }}">
        <button type="submit">Deletar</button>
        @csrf
    </form>
    @endforeach


</x-layout>
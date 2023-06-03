<title>Conta - MBR Imoveis</title>

<x-layout>

    <link rel="stylesheet" href="/css/log_novo.css">

    <div class="log_novo"><br>
        <H4>Alterar informaçoes da conta</H4>
        <form action="fazer-conta" method="post" class='alt-log'>
            <input type="text" name="nome_novo" placeholder="nome" value="{{ $logado->nome }}">
            <input type="text" name="email_novo" placeholder="email" value="{{ $logado->email }}">
            <input type="text" name="tele_novo" placeholder="telefone" value="{{ $logado->telefone }}">
            <input type="text" name="senha_novo" placeholder="senha" value="{{ $logado->senha }}">
            <input type="submit" value="Alterar">
            @csrf
        </form>

        @foreach ($imoveis as $imovel)

        <br>
        <h4>-- Seus Imoveis --</h4>

        <div class="alterar">
            <form action="enviar-imovel" method="post">
                <input type="hidden" name="caminho" value="{{ $imovel->id }}">
                <button>
                    <!-- Essa lilhas estão como botão por causa que vão levar para a pagina de alteração -->
                    <p>ID: {{ $imovel->id }}</p>
                    <p>RUA: {{ $imovel->rua }}</p>
                    <p>NUMERO: {{ $imovel->numero}}</p>
                    @csrf
                </button>
            </form>

            <form action="deletar" method="post">
                <input type="hidden" name="id_imovel" value="{{ $imovel->id }}">
                <button type="submit" class="delete">Deletar</button>
                @csrf
            </form>
            @endforeach
        </div>

    </div>








</x-layout>
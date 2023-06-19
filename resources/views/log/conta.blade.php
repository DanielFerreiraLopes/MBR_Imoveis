<title>Conta - MBR Imoveis</title>

<x-layout>

    <link rel="stylesheet" href="/css/log_novo.css">

    <div id="page-conta">
        <div>
            <h1>Minha conta</h1>
            <form action="fazer-conta" method="post" class="flex-row">
                <input type="text" name="nome_novo" placeholder="Nome" value="{{ $logado->nome }}">
                <input type="text" name="email_novo" placeholder="Email" value="{{ $logado->email }}">
                <input type="text" name="tele_novo" placeholder="Telefone" value="{{ $logado->telefone }}">
                <input type="text" name="senha_novo" placeholder="Senha" value="{{ $logado->senha }}">
                <button type="submit" id="alt">Alterar</button>
                @csrf
            </form>
        </div>

        <hr>
        <div>
            <h1>Seus Imoveis</h1>

            <section id="section-imoveis">
                @foreach($imoveis as $imovel)

                <div class="box-imovel">
                    @if ( $imovel->imagens->isNotEmpty())
                    <img src="{{ $imovel->imagens[0]->arquivo}}">
                    @endif
                    <p>
                        <span class="estado">{{ $imovel->cidade }}/{{ $imovel->estado }}</span> <br>
                        <span class="bairro">{{ $imovel->bairro }}</span> <br><br>
                        <span class="preco">R$ {{ $imovel->preco }}</span><br><br>
                        {{ $imovel->descricao }}
                    </p>
                    <form action="/caminho-imovel" method="post">
                        <input type="hidden" name="caminho" value="{{ $imovel->id }}">
                        <input type="submit" value="Ver Detalhes">
                        @csrf
                    </form>
                    <form action="/deletar" method="post">
                        <input type="hidden" name="id_imovel" value="{{ $imovel->id }}">
                        <button class="deletar">Deletar</button>
                        @csrf
                    </form>
                </div>
                @endforeach
            </section>
        </div>
    </div>

</x-layout>
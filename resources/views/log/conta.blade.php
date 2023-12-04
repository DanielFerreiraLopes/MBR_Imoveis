<title>Conta - MBR Imoveis</title>

<x-layout>

    <link rel="stylesheet" href="/css/conta.css">

    <div id="page-conta">
        <h1 style="color: black;">Minha conta</h1>
        <div id="centralizar">
            <form action="fazer-conta" method="post" id="form-conta">
                <div class="campo"><span>Nome: </span> <input type="text" name="nome_novo" placeholder="Nome" value="{{ $logado->nome }}"></div>
                <div class="campo"><span>Email: </span> <input type="text" name="email_novo" placeholder="Email" value="{{ $logado->email }}"></div>
                <div class="campo"><span>Telefone: </span> <input type="text" name="tele_novo" placeholder="Telefone" value="{{ $logado->telefone }}"></div>
                <div class="campo"><span>Sua Senha: </span> <input type="text" name="senha_novo" placeholder="Senha" value="{{ $logado->senha }}"><br></div>
                <div class="campo"><button type="submit" id="alt">Alterar</button></div>
                @csrf
            </form>
        </div>

        <hr>
        @if(count($imoveis) > 0)
        <div>

            <section id="section-imoveis">
                <h2>Seus Imoveis</h2>

                @foreach($imoveis as $imovel)

                <div class="box-imovel">
                    @if ( $imovel->imagens->isNotEmpty())
                    <img src="{{ $imovel->imagens[0]->arquivo}}">
                    @endif
                    <div class="info-imovel">
                        <p>
                            <span class="estado">{{ $imovel->cidade }}/{{ $imovel->estado }}</span> <br>
                            <span class="bairro">{{ $imovel->bairro }}</span> <br><br>
                            <span class="preco">R$ {{ $imovel->preco }}</span><br><br>
                            <div class="">{{ $imovel->descricao }}</div>
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
                </div>
                @endforeach
            </section>
        </div>
        @else
        <div>

            <section id="section-imoveis">
                <h2>Seus Imoveis</h2>

                <p> Você não tem imoveis </p>
            </section>
        </div>
        @endif

    </div>

</x-layout>
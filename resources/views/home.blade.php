<title>Home - MBR Imoveis</title>
<style>
    table {
        color: azure;
    }
</style>
<x-layout>

    <link rel="stylesheet" href="/css/flex.css">
    <link rel="stylesheet" href="/css/home.css">

    <div id="page-home">
        <div id="area-filtro">
            <x-filtro></x-filtro>
        </div>

        <section id="section-imoveis">
             <form action="/pesquisar" method="post" id="form-pesquisa">
                    <input type="text" name="search" class="pesquisa" placeholder= 'Área de Pesquisa'>
                    <button type="submit"><img src="/img/search.svg" width="20px"></button>
                    @csrf
                </form>
              @foreach($imoveis as $imovel)

            <div class="box_imovel">
                <div id="separacao">
                    @if ( $imovel->imagens->isNotEmpty())
                    <img src="{{ $imovel->imagens[0]->arquivo}}">
                    @endif
                    <div id="escrita">
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
                    </div>
                </div>
            </div>
            @endforeach
            
        </section>
    </div>

</x-layout>
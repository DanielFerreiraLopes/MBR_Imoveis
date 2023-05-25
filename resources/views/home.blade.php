<title>Home - MBR Imoveis</title>
<style>
    table {
        color: azure;
    }
</style>
<x-layout>

    <link rel="stylesheet" href="/css/home.css">
    @foreach($imoveis as $imovel)
    <div class="box_imovel">
        @if ( $imovel->imagens->isNotEmpty())
        <img src="{{ $imovel->imagens[0]->arquivo}}">
        @endif
        <p>
            {{ $imovel->descricao }}
        </p>

        <button>ver ++</button>
    </div>
    @endforeach

</x-layout>
<title>Home - MBR Imoveis</title>
<style>
table {
    color: azure;
}
</style>
<x-layout>

    <link rel="stylesheet" href="/css/home.css">

    <form action="/filtrar" method="post">
        <input type="number" name="quarto">
        <input type="number" name="banheiro">
        <input type="number" name="precomini">
        <input type="number" name="precomax">
        <input type="text" name="estado">
        <input type="text" name="cidade">
        <input type="text" name="rua">
        <input type="text" name="bairro">
        <input type="number" name="numero">
        <input type="number" name="cep">
        <button>Buscar</button>
        @csrf
    </form>





    @foreach($imoveis as $imovel)
    <div class="box_imovel">
        @if ( $imovel->imagens->isNotEmpty())
        <img src="{{ $imovel->imagens[0]->arquivo}}">
        @endif
        <p>
            {{ $imovel->descricao }}
        </p>

        <form action="/caminho-imovel" method="post">
            <input type="hidden" name="caminho" value="{{ $imovel->id }}">
            <button>ver ++</button>
            @csrf
        </form>
    </div>
    @endforeach

</x-layout>
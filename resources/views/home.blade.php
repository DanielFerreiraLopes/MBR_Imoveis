<title>Home - MBR Imoveis</title>
<style>
    table {
        color: azure;
    }
</style>
<x-layout>

    <link rel="stylesheet" href="/css/home.css">

    <form action="/filtrar" method="post">
        <label for="">Quartos:</label> <input type="number" name="quarto">
        <label for="">Banheiros:</label><input type="number" name="banheiro">
        <label for="">Preço minimo:</label><input type="number" name="precomini">
        <label for="">Preço Maximo:</label><input type="number" name="precomax">
        <label for="">Estado:</label><input type="text" name="estado">
        <label for="">Cidade:</label><input type="text" name="cidade">
        <label for="">Rua:</label><input type="text" name="rua">
        <label for="">Bairro:</label><input type="text" name="bairro">
        <label for="">Número:</label><input type="number" name="numero">
        <label for="">Cep:</label><input type="number" name="cep">
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
            <input type="submit" value="Ver Detalhes"></input>
            @csrf
        </form>
    </div>

    @endforeach

</x-layout>
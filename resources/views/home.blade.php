<title>Home - MBR Imoveis</title>
<style>
table {
    color: azure;
}
#form-filtros {
    padding: 20px;
    border-radius: 10px;
    border: 1px solid white;
    color: white;
}
</style>
<x-layout>

    <link rel="stylesheet" href="/css/flex.css">
    <link rel="stylesheet" href="/css/home.css">

    <div id="page-home">
        <form action="/filtrar" method="post" id="form-filtros" class="flex-col gap-20">
            <div class="flex-col">
                <label for="">Quartos:</label>
                <input type="number" name="quarto" step="1">
            </div>
            <div class="flex-col">
                <label for="">Banheiros:</label>
                <input type="number" name="banheiro" step="1">
            </div>
            <div class="flex-col">
                <label for="">Preço minimo:</label>
                <input type="number" name="precomini" step="0.01">
            </div>
            <div class="flex-col">
                <label for="">Preço Maximo:</label>
                <input type="number" name="precomax" step="0.01">
            </div>
            <div class="flex-col">
                <label for="">Estado:</label>
                <input type="text" name="estado">
            </div>
            <div class="flex-col">
                <label for="">Cidade:</label>
                <input type="text" name="cidade">
            </div>
            <div class="flex-col">
                <label for="">Rua:</label>
                <input type="text" name="rua">
            </div>
                
            <div class="flex-col">
                <label for="">Bairro:</label>
                <input type="text" name="bairro">
            </div>
            <div class="flex-col">
                <label for="">Número:</label>
                <input type="number" name="numero">
            </div>
            <div class="flex-col">
                <label for="">Cep:</label>
                <input type="number" name="cep">
            </div>

            <div class="flex-col">
                <label for="">&nbsp;</label>
                <button>Buscar</button>
            </div>
            @csrf
        </form>

        <section id="section-imoveis">
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
        </section>
    </div>

</x-layout>
<title>Imagens - MBR Imoveis</title>
<link rel="stylesheet" href="/css/imagens.css">
<x-layout>

    <h1>Imagens do Imóvel</h1>
    <p id="box-info-imovel">
        {{ $imovel->cidade }}/{{ $imovel->estado }} ({{ $imovel->cep }}) <br>
        {{ $imovel->bairro }} - {{ $imovel->rua }}, {{ $imovel->numero }}
    </p>

    <div>

        <form action=" /imagens" method="POST" enctype="multipart/form-data" class='form-img'>
            @csrf
            <input type="file" name="image">
            <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
            <button type="submit">Enviar</button>
        </form>

        <div class='imagens'>
            @foreach ($imagens as $imagem)
            <div class="box-img-imovel">
                <img src="{{ $imagem->arquivo }}" alt=""><br>

                <form action="/deletar_imagens" method="post">
                    @csrf
                    <input type="hidden" name="id_imagem" value="{{ $imagem->id }}">
                    <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                    <button type="submit" class='delete'>Deletar</button><br>
                </form>
            </div>
            @endforeach
        </div>

        <br><br><br>
        <a href="/conta" class='voltar'>Voltar</a>
    </div>

</x-layout>
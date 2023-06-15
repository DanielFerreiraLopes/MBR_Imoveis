<title>Imagens - MBR Imoveis</title>
<link rel="stylesheet" href="/css/imagens.css">
<x-layout>

    <h1>Imagens do Imóvel</h1>
    <p id="box-info-imovel">
        {{ $imovel->cidade }}/{{ $imovel->estado }} ({{ $imovel->cep }}) <br>
        {{ $imovel->bairro }} - {{ $imovel->rua }}, {{ $imovel->numero }}
    </p>

    <div class='l-imagens'>

        <div class='imagens'>
            <form action=" /imagens" method="POST" enctype="multipart/form-data" class='form-img'>
                @csrf
                <input type="file" name="image">
                <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                <button type="submit">Enviar</button>
            </form>
            @foreach ($imagens as $imagem)
            <img src="{{ $imagem->arquivo }}" alt=""><br>

            <form action="/deletar_imagens" method="post">
                @csrf
                <input type="hidden" name="id_imagem" value="{{ $imagem->id }}">
                <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                <button type="submit" class='delete'>Deletar</button><br>
            </form>
            @endforeach
            
            <br>
            <a href="/conta" class='voltar'>Voltar</a>

        </div>
    </div>

</x-layout>
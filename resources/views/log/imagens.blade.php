<title>Imagens - MBR Imoveis</title>
<x-layout>

    <div class='l-imagens'>

        <form action=" /imagens" method="POST" enctype="multipart/form-data" class='form-img'>
            @csrf
            <input type="file" name="image">
            <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
            <button type="submit">Enviar</button>
        </form>

        <link rel="stylesheet" href="/css/imagens.css">

     <div class='imagens'>   
    @foreach ($imagens as $imagem)
    <img src="{{ $imagem->arquivo }}" alt="">
    @endforeach




        <form action="/" class='form-finalizar'>  
            <button type="submit">Finalizar</button>
        </form>

    </div>

    </div>
</x-layout>
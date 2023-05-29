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
<<<<<<< HEAD
    <img src="{{ $imagem->arquivo }}" alt="">
    @endforeach




        <form action="/" class='form-finalizar'>  
            <button type="submit">Finalizar</button>
        </form>

    </div>

    </div>
=======
    <img src="{{ $imagem->arquivo }}" alt=""><br>
    <form action="/deletar_imagens" method="post">
        @csrf
        <input type="hidden" name="id_imagem" value="{{ $imagem->id }}">
        <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
        <button type="submit">Deletar</button></br>
    </form>
    @endforeach <form action=" /imagens" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
        <button type="submit">Enviar</button>
    </form>

    <a href="/conta">Voltar</a>
    <!-- ideia dos dois botão  -->

>>>>>>> 888e2517b76f70e764c035db8c0b9df1a365ce1c
</x-layout>
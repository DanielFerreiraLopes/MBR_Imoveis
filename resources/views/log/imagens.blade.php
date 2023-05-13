<title>Imagens - MBR Imoveis</title>
<x-layout>

    @foreach ($imagens as $imagem)
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

</x-layout>
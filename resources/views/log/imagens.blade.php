<title>Imagens - MBR Imoveis</title>
<x-layout>

    @foreach ($imagens as $imagem)
    <img src="{{ $imagem->arquivo }}" alt="">
    @endforeach
    <form action=" /imagens" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
        <button type=" submit">Enviar</button>
    </form>
</x-layout>
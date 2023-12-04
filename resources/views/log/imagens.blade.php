<title>Imagens - MBR Imoveis</title>
<link rel="stylesheet" href="/css/imagens.css">
<x-layout>

<div id="page-imagen">

    <h1 style="color: black;">Imagens do Imóvel</h1>
    <p id="box-info-imovel" style="color: black;">
        {{ $imovel->cidade }}/{{ $imovel->estado }} ({{ $imovel->cep }}) <br>
        {{ $imovel->bairro }} - {{ $imovel->rua }}, {{ $imovel->numero }}
    </p>

    <div class="enquadro">
        <form action="/imagens" method="POST" enctype="multipart/form-data" id='form-img'>
            @csrf
            <div class="arquivo">
                <label for="image" class="drop-container" id="dropcontainer">
                    <span class="drop-title">Jogue as imagens aqui</span>
                    ou
                    <input type="file" name="image" id="image" accept="image/*" required>
                    (as imagens são salvas automaticamente depois de envialas)
                </label>
                <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                <button type="submit">Enviar a Imagem</button>
            </div>
        </form>
@if (count($imagens) > 0)
        <div class='imagens'>
            @foreach ($imagens as $imagem)
            <div class="box-img-imovel">
                <img src="{{ $imagem->arquivo }}" alt=""><br>

                <form action="/deletar_imagens" method="post">
                    @csrf
                    <input type="hidden" name="id_imagem" value="{{ $imagem->id }}">
                    <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                    <button type="submit" class='delete' style="">Retirar Imagem</button><br>
                </form>
            </div>
            @endforeach
        </div>
        @else
        <div class="center" style="display= flex; height: 50vh;"><h3>Esse Imóvel Não Tem Imagens</h3></div>
        @endif

        <div class="voltar"><a href="/conta">Concluir</a></div>
    </div>
</div>
    <script>
        const dropContainer = document.getElementById("dropcontainer")
        const fileInput = document.getElementById("image")

        dropContainer.addEventListener("dragover", (e) => {
            // prevent default to allow drop
            e.preventDefault()
        }, false)

        dropContainer.addEventListener("dragenter", () => {
            dropContainer.classList.add("drag-active")
        })

        dropContainer.addEventListener("dragleave", () => {
            dropContainer.classList.remove("drag-active")
        })

        dropContainer.addEventListener("drop", (e) => {
            e.preventDefault()
            dropContainer.classList.remove("drag-active")
            fileInput.files = e.dataTransfer.files
        })
    </script>

</x-layout>
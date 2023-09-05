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
            <div class="">
                <label for="image" class="drop-container" id="dropcontainer">
                    <span class="drop-title">Jogue as imagens aqui</span>
                    ou
                    <input type="file" name="image" id="image" accept="image/*" required>
                    </label>
                <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                <button type="submit">Enviar as Imagens</button>
            </div>
        </form>

        <div class='imagens'>
            @foreach ($imagens as $imagem)
            <div class="box-img-imovel">
                <img src="{{ $imagem->arquivo }}" alt=""><br>

                <form action="/deletar_imagens" method="post">
                    @csrf
                    <input type="hidden" name="id_imagem" value="{{ $imagem->id }}">
                    <input type="hidden" name="id_imovel" value="{{ $id_imovel }}">
                    <button type="submit" class='delete' style="background-color: rgba(0, 0, 0, 0); border: 1px solid red">Retirar Imagem</button><br>
                </form>
            </div>
            @endforeach
        </div>

        <br><br><br>
        <a href="/conta" class='voltar'>Voltar</a>
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
<title>Pesquisa - MBR Imoveis</title>
<link rel="stylesheet" href="/css/imovel.css">
<link rel="stylesheet" href="/css/flex.css">
<x-layout>
    <h1></h1>

    <div id="box-imovel">
        <div id="section-img">
            @if (count($imagens) > 0)
            <img id="img-main" src="{{ $imagens[0]->arquivo }}" alt="">
            @else

            <img id="img-main" src="/img/Logo_Black.png" alt="">
            @endif
        </div>

        <div id="section-imovel">
            <p>
                <span><b>{{ $imovel->cidade}} - {{ $imovel->estado}}</b></span> <br>
                <span class="bairro"><b>{{ $imovel->bairro}}</b></span> <br>
                <span><b>{{ $imovel->rua}}, {{ $imovel->numero}}</b></span>
            </p>
            <br>
            <p>
                <span><b>Preço:</b> R${{ $imovel->preco}}</span><br>
                <span><b>Quartos:</b> {{ $imovel->quarto}}</span><br>
                <span><b>Banheiros:</b> {{ $imovel->banheiro}}</span>
            </p>
        </div>
    </div>

    <div id="box-proprietario">
        <div id="section-proprietario">
            <strong>Proprietário</strong>
            <hr>
            <span class="nome">{{ $proprietario->nome }}</span><br>
            <span class="email">Email: {{ $proprietario->email }}</span><br>
            <span class="telefone">Telefone: {{ $proprietario->telefone }}</span>
        </div>

        <div id="section-descricao">
            <span>{{ $imovel->descricao}}</span>
        </div>
    </div>


    <div class="box-imagens">
        @foreach($imagens as $imagem)
        <img src="{{ $imagem->arquivo }}" alt="" id="showimg">
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
        @endforeach
    </div>

    <div class="flex-row content-center space-30">
        <a href="/">Voltar</a>
    </div>

    <script>
        var modal = document.querySelector("#myModal");
        var modalImg = document.querySelector("#img01");
        var captionText = document.querySelector("#caption");

        var img = document.querySelectorAll("#showimg").forEach((item) => {
            item.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }
        });
        var span = document.querySelectorAll(".close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

</x-layout>
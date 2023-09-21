<title>Pesquisa - MBR Imoveis</title>
 <link rel="stylesheet" href="/css/imovel.css">
 <link rel="stylesheet" href="/css/flex.css">
<x-layout>

    <h1></h1>
    
    <div id="box-info" class="flex-row">
        <div class="flex-col content-center">
            <img id="img-main" src="{{ $imagens[0]->arquivo }}" alt="">
        </div>
        <div class="flex-col grow info-house">
            <p>
                <span>{{ $imovel->cidade}} - {{ $imovel->estado}}</span> <br>
                <span class="bairro">{{ $imovel->bairro}}</span> <br>
                <span>{{ $imovel->rua}}, {{ $imovel->numero}}</span>
            </p>
            
            <p>
                <small>Quartos: {{ $imovel->quarto}}</small>
                <small>Banheiros: {{ $imovel->banheiro}}</small>
                <small>Preço: {{ $imovel->preco}}</small>
            </p>
            <p>
                <span>{{ $imovel->descricao}}</span>
            </p>
        </div>
        <div class="flex-col info-owner gap-30 content-center">
            <strong>Proprietário</strong>
            <span class="nome">{{ $proprietario->nome }}</span>
            <div class="flex-col gap-5">
                <span class="email">Email: {{ $proprietario->email }}</span>
                <span class="telefone">Telefone: {{ $proprietario->telefone }}</span>
            </div>
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
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("showimg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>

</x-layout>
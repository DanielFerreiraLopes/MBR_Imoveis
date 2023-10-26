<title>Pesquisa - MBR Imoveis</title> <link rel="stylesheet" href="/css/imovel.css"> <link rel="stylesheet"
    href="/css/flex.css">
    <x-layout> <h1></h1>

            <div id="box-imovel">
                    <div id="section-img">
                        <img id="img-main" src="{{ $imagens[0]->arquivo }}" alt="">
                    </div>

                <div id="section-imovel">
                    <p>
                        <span>{{ $imovel->cidade}} - {{ $imovel->estado}}</span> <br>
                        <span class="bairro">{{ $imovel->bairro}}</span> <br>
                        <span>{{ $imovel->rua}}, {{ $imovel->numero}}</span>
                    </p>
                    <br>
                    <p>
                        <span>Preço: R${{ $imovel->preco}}</span><br>
                        <span>Quartos: {{ $imovel->quarto}}</span><br>
                        <span>Banheiros: {{ $imovel->banheiro}}</span>
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
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("showimg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>

        </x-layout>
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
                <div class="gallery__item">
                    <img src="{{ $imagem->arquivo }}" alt="">
                </div>
            @endforeach
        </div>

        <div class="flex-row content-center space-30">
            <a href="/">Voltar</a>
        </div>

        <script>
            const images = document.querySelectorAll(".gallery__item img");
            let imgSrc;
            // get images src onclick
            images.forEach((img) => {
                img.addEventListener("click", (e) => {
                    imgSrc = e.target.src;
                    //run modal function
                    imgModal(imgSrc);
                });
            });
            //creating the modal
            let imgModal = (src) => {
                const modal = document.createElement("div");
                modal.setAttribute("class", "modal");
                //adding image to modal
                const newImage = document.createElement("img");
                newImage.setAttribute("src", src);
                //creating the close button
                const closeBtn = document.createElement("i");
                closeBtn.setAttribute("class", "fas fa-times closeBtn");
                //close function
                closeBtn.onclick = () => {
                    modal.remove();
                };
                modal.append(newImage, closeBtn);
            };
        </script>

        </x-layout>
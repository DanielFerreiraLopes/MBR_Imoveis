<link rel="stylesheet" href="/css/filtro.css">
        <form action="/filtrar" method="post" id="form-filtros" class="flex-col gap-20">
            <div class="flex-col titulo">
                <h1>Filtros <img src="/img/filtro (1).png" alt="img filtro" width="30px"
            style="margin: 0 0 0 0;"></h1>
            </div>
            <div class="flex-col">
                <label for="">Quartos:</label>
                <input type="number" name="quarto" step="1">
            </div>
            <div class="flex-col">
                <label for="">Banheiros:</label>
                <input type="number" name="banheiro" step="1">
            </div>
            <div class="flex-col">
                <label for="">Preço minimo:</label>
                <input type="number" name="precomini" step="0.01">
            </div>
            <div class="flex-col">
                <label for="">Preço Maximo:</label>
                <input type="number" name="precomax" step="0.01">
            </div>
            <div class="flex-col">
                <label for="">Estado:</label>
                <input type="text" name="estado">
            </div>
            <div class="flex-col">
                <label for="">Cidade:</label>
                <input type="text" name="cidade">
            </div>
            <div class="flex-col">
                <label for="">Rua:</label>
                <input type="text" name="rua">
            </div>

            <div class="flex-col">
                <label for="">Bairro:</label>
                <input type="text" name="bairro">
            </div>
            <div class="flex-col">
                <label for="">Número:</label>
                <input type="number" name="numero">
            </div>

            <div class="flex-col">
                <label for="">&nbsp;</label>
                <button>Buscar</button>
            </div>
            @csrf
        </form>


<?php

use Illuminate\Support\Facades\Session;

$logado = Session::get("info_usuario");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBR Imoveis</title>
    <link rel="shortcut icon" href="/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/layout.css">
</head>

<body>
    <header>
        <div class="navbar">
            <ul>
                <li><a href="/"><img src="/img/home.svg"></a></li>

                <li><a href="/venda"><img src="/img/dollar_sign.svg" alt=""></a></li>
                <li><a href="/conta"><img src="/img/account.svg"></a></li>
                @if (!$logado)
                <li style="float:right" id="log"><a class="active" href="/login"><img class="log-img" src="/img/log-in.png" alt=""><div class="log-text">Login</div></a></li>
                @else
                <li style="float:right" id="log"><a class="active" href="/fazer-logout"><img class="log-img" src="/img/log-out.png" alt=""><div class="log-text">Sair</div></a></li>
                @endif

                <!-- <li style="float:right"><button type="button" onclick="mostrar()" class="btn-search"><img src="/img/search.svg"></button></li> -->
            </ul>
        </div>
    </header>

    @if (session('mensagem_erro'))
    <div class="error">
        <img src="/img/exclamation.png" alt="" width="22px" style="filter: invert(100); margin: 0 7px 0 0">{{ session('mensagem_erro') }}
    </div>
    @endif

    <div class="conteudo-dinamico">
        {{ $slot }}
    </div>

    <div class="overlay-search hidden">
        <form action="" class="form-search">
            <button type="button" onclick="esconder()" class="btn-hidden"><img src="img/cancel.svg"></button>
            <input type="text" name="search" class="pesquisa">
            <button type="submit">Pesquisar</button>
        </form>
    </div>
    <footer>
        Copyright 2023 © - MBR IMOVEIS
    </footer>

    <script>
        function mostrar() {
            let overlaySearch = document.querySelector(".overlay-search");
            overlaySearch.classList.remove("hidden");
        }

        function esconder() {
            let overlaySearch = document.querySelector(".overlay-search");
            overlaySearch.classList.add("hidden")
        }
    </script>
</body>

</html>
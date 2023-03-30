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
                <li><a href="/">Home</a></li>
                <li><a href="pesquisa">Pesquisar</a></li>
                <li><a href="venda">Vender</a></li>
                <li><a href="conta">Conta</a></li>
                <li style="float:right"><a class="active" href="login">Login</a></li>
             </ul>
        </div>
    </header>
        <div class="conteudo-dinamico">
            {{ $slot }}
        </div>
    <footer>
        Copyright 2022 © - MBR IMOVEIS
    </footer>
</body>
</html>
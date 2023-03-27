<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" href="/img/logo.ico" type="image/x-icon">
    <title>MBR Login</title>
</head>
<body>
    <div class="navbar">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="pesquisa">Pesquisar</a></li>
        <li><a href="venda">Vender</a></li>
        <li><a href="conta">Conta</a></li>
        <li style="float:right"><a class="active" href="login">Login</a></li>
    </ul>
    </div>

    <section class="area-login">
        <div class="login">
            <div>
                <img src="/img/Logo_White.png">
            </div>
        
            <form action="fazer-login">
                <input type="email" name='email' placeholder='Email' required><br>
                <input type="password" name="senha" id="senha" placeholder="Senha" required><br>
                <input type="submit" value="Entrar"><br>
            </form>
            <p>Ainda não tem conta?<a href="cadastro">Criar Conta</a></p>
        </div>
    </section>

    


</body>
</html>
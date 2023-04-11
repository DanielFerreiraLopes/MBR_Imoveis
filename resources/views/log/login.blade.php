<title>Login - MBR Imoveis</title>
<x-layout>
    <link rel="stylesheet" href="/css/login.css">
    <section class="area-login">
        <div class="login">
            <div>
                <img src="/img/Logo_White.png">
            </div>
        
<<<<<<< HEAD
            <form action="/fazer-login" method="post">
=======
            <form action="fazer-login" method="post">
>>>>>>> a5765bfd8da8b7734a55b177e7067cb3719fc580
                <input type="email" name='email' placeholder='Email' required><br>
                <input type="password" name="senha" id="senha" placeholder="Senha" required><br>
                <input type="submit" value="Entrar"><br>
                @csrf
            </form>
            <p>Ainda não tem conta?<a href="cadastro">Criar Conta</a></p>
        </div>
    </section>
</x-layout>
<title>Cadastro - MBR Imoveis</title>
<x-layout>
    
    <link rel="stylesheet" href="/css/login.css">
    <section class="area-login cadastro">
        <div class="login">
            <div>
                <img src="/img/Logo_Black.png">
            </div>

            <form action="fazer-cadastro" method="post" class="form-cadastro">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="tel" name="tele" placeholder="Telefone para Contato" required>
                <input type="email" name="email" placeholder="Email para Contato" required>
                <input type="email" name="confirmemail" placeholder="Confirmar Email" required>
                <input type="password" name="senha" placeholder="Senha" required><br>
                <input type="submit" value="Cadastrar" style="background-color: #5568fe">
                @csrf
            </form>
            <p>Já tem conta?<a href="/login">Fazer Login</a></p>
        </div>
    </section>
</x-layout>
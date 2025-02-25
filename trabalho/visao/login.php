<?php
$title = "Tela de Login";
include_once('cabecalho.php');

session_start();

if (isset($_GET['erro']) && $_GET['erro'] == 'sem_acesso') {
    echo "<script>alert('Usuário não identificado');</script>";
}
if (isset($_GET['error_auten']) && $_GET['error_auten'] == 's') {
    echo "<script>alert('Senha ou Usuário Inválido!');</script>";
}
?>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center min-vh-100 login-background">
        <div class="form-container shadow-lg p-5 bg-white rounded">
            <div class="text-center mb-4">
                <img src="https://www.senacrs.com.br/assets/layout/images/logo_senac.png" alt="Logo Senac" class="logo mb-3" width="150">
                <h2 class="form-title" style="color: #003B5C;">Bem-vindo ao Sistema</h2>
            </div>

            <form action="../controle/login_usuario_controle.php" method="POST">
                <div class="form-group mb-3">
                    <label for="usuario" class="form-label text-dark">Usuário</label>
                    <input type="text" class="form-control shadow-sm border-light" name="usuario" id="usuario" placeholder="Digite seu usuário" required>
                </div>

                <div class="form-group mb-4">
                    <label for="senha" class="form-label text-dark">Senha</label>
                    <input type="password" class="form-control shadow-sm border-light" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="background-color: #003B5C; border-color: #003B5C;">Entrar</button>
            </form>

            <div class="text-center mt-3">
                <a href="cadastrar_usuario.php" class="text-muted">Cadastrar-se</a>
            </div>


        </div>
    </div>

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span style="color: #003B5C;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

</body>

</html>
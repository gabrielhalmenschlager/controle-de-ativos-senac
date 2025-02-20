<?php

$title = "Formulário de Cadastro de Usuário";
include_once('cabecalho.php');

?>

<body>

    <div class="login-background">
        <div class="form-container">
            <img src="https://www.senacrs.com.br/assets/layout/images/logo_senac.png" alt="Logo Senac" class="logo">
            <h2 class="form-title">Cadastrar Novo Usuário</h2>

            <form action="../controle/cadastrar_usuario_controle.php" method="POST">
                <div class="form-group mb-3">
                    <label for="nome" class="form-label" style="color: #054F77;">Nome</label>
                    <input type="text" class="form-control shadow-sm border-light" name="nome" id="nome" placeholder="Digite seu nome" required>
                </div>

                <div class="form-group mb-3">
                    <label for="turma" class="form-label" style="color: #054F77;">Turma</label>
                    <input type="text" class="form-control shadow-sm border-light" name="turma" id="turma" placeholder="Informe sua turma" required>
                </div>

                <div class="form-group mb-3">
                    <label for="usuario" class="form-label" style="color: #054F77;">Usuário</label>
                    <input type="text" class="form-control shadow-sm border-light" name="usuario" id="usuario" placeholder="Crie um nome de usuário" required>
                </div>

                <div class="form-group mb-4">
                    <label for="senha" class="form-label" style="color: #054F77;">Senha</label>
                    <input type="password" class="form-control shadow-sm border-light" name="senha" id="senha" placeholder="Crie uma senha" required>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="background-color: #054F77; border-color: #054F77;">Salvar</button>
            </form>
        </div>
    </div>

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span style="color: #054F77;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

</body>
</html>

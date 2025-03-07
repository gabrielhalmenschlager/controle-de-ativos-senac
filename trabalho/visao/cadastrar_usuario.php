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

    <footer class="footer bg-light text-center py-1 mt-5" style="background-color: gray;">
        <div class="container">
            <div class="row align-items-center">
                <div class=" mt-3 col-6 text-left">
                    <img src="https://cdljundiai.com.br/wp-content/uploads/2020/06/senac.png" alt="Logo Senac" style="width: 120px;">
                </div>
                <div class="mt-3 col-6 text-right">
                    <p style="color: white; margin-bottom: 0; font-size: 15px;">Siga-nos nas redes sociais:</p>
                    <a href="https://www.instagram.com/senacsantacruz" target="_blank" class="mr-2">
                        <img src="https://png.pngtree.com/png-clipart/20180626/ourmid/pngtree-instagram-icon-instagram-logo-png-image_3584852.png" alt="Instagram" style="width: 35px; height: 35px; transition: transform 0.3s;">
                    </a>
                    <a href="https://www.facebook.com/senacsantacruz" target="_blank" class="mr-2">
                        <img src="https://static.vecteezy.com/system/resources/previews/018/930/698/non_2x/facebook-logo-facebook-icon-transparent-free-png.png" alt="Facebook" style="width: 40px; height: 40px; transition: transform 0.3s;">
                    </a>
                </div>
            </div>
            <div class="mt-2">
                <span style="color: white; font-size: 15px;">2025 Senac | Todos os direitos reservados</span>
            </div>
        </div>
    </footer>

</body>
</html>

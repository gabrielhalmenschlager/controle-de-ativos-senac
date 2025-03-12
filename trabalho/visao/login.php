<?php
$title = "Tela de Login";
include_once('cabecalho.php');

session_start();

if (isset($_GET['erro']) && $_GET['erro'] == 'sem_acesso') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: '<span style=\"color: #FFA500;\">Usuário não identificado</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500',
                confirmButtonText: 'OK'
            });
        });
    </script>";
}

if (isset($_GET['error_auten']) && $_GET['error_auten'] == 's') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: '<span style=\"color: #FFA500;\">Senha ou Usuário Inválido!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500',
                confirmButtonText: 'OK'
            });
        });
    </script>";
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
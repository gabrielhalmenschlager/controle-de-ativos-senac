<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');


$title = "Alterar Usuário";

include_once('cabecalho.php');
include_once('menu_superior.php');

$usuario_altera = $_GET['id_usuario'];
$info_bd = busca_info_bd($conexao, 'usuario', 'idUsuario', $usuario_altera);

foreach ($info_bd as $user) {
    $nome = $user['nomeUsuario'];
    $turma = $user['turmaUsuario'];
    $id_user = $user['idUsuario'];
}

?>

<body>

    <div class="container">
        <div class="form-container">

            <img src="https://www.senacrs.com.br/assets/layout/images/logo_senac.png" alt="Logo" class="logo">

            <h2 class="form-title">Alterar Usuário</h2>

            <form action="../controle/login_usuario_controle.php" method="POST">

                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id_user ?>" placeholder="Digite seu Id" required>
                </div>

                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>" placeholder="Digite seu nome" required>
                </div>

                <div class="form-group">
                    <label for="turma" class="form-label">Turma</label>
                    <input type="text" class="form-control" name="turma" id="turma" value="<?php echo $turma ?>" placeholder="Informe sua turma" required>
                </div>

                <!-- Botão Salvar -->
                <button type="submit" class="btn btn-outline-primary">Salvar</button>

            </form>
        </div>
    </div>

    <footer class="footer bg-light text-center py-1 mt-5" style="background-color: gray;">
        <div class="container">
            <div class="row align-items-center">
                <div class=" mt-3 col-6 text-left">
                <img src="https://static.wixstatic.com/media/52bc07_3a4a9b542c644d9385b5366e7995eecf~mv2.png/v1/fill/w_500,h_292,al_c,lg_1,q_85,enc_avif,quality_auto/senac%20branco.png" alt="Logo Senac" style="width: 120px;">
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
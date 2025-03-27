<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$title = "Listar Usuários";

include_once('cabecalho.php');
include_once('menu_superior.php');

$info_bd = busca_info_bd($conexao, 'usuario');
$cargos = busca_info_bd($conexao, 'cargos');
$admin = $_SESSION['admin'];

?>

<body>

    <div class="container mt-5">
        <div>
        <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Usuários</h1>
        </div>
        <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
            <thead>
                <tr>
                    <th style="background-color: #054F77; color: white;" scope="col">Nome</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Usuário</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Turma</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($info_bd as $user) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                ?>
                                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                    <?php echo $user["nomeUsuario"]; ?>
                                </a>
                                <?php
                            } else {
                                echo $user['nomeUsuario'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                ?>
                                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                    <?php echo $user["usuario"]; ?>
                                </a>
                                <?php
                            } else {
                                echo $user['usuario'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                ?>
                                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                    <?php echo $user["turmaUsuario"]; ?>
                                </a>
                                <?php
                            } else {
                                echo $user['turmaUsuario'];
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <input type="hidden" id="idAtivo" value="">
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
</html>

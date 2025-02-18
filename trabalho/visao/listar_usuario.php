<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$title = "Listar Usuários";

include_once('cabecalho.php');
include_once('menu_superior.php');

$info_bd = busca_info_bd($conexao, 'usuario');
$admin = $_SESSION['admin'];

?>

<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #003B5C;">Lista de Usuários</h1>

        <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
            <thead>
                <tr>
                    <th style="background-color: #003B5C; color: white;" scope="col">Nome</th>
                    <th style="background-color: #003B5C; color: white;" scope="col">Usuário</th>
                    <th style="background-color: #003B5C; color: white;" scope="col">Turma</th>
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

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span style="color: #003B5C;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

</body>
</html>

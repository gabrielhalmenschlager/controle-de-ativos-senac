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

    <footer class="footer mt-5 py-3" style="background-color: #f0f0f0;">
        <div class="container text-center">
            <span class="text-muted">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

</body>
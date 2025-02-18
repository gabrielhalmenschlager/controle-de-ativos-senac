<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nomeUsuario'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senhaUsuario'] ? password_hash($_POST['senhaUsuario'], PASSWORD_DEFAULT) : null;
    $turma = $_POST['turmaUsuario'];

    if ($senha) {
        $stmt = $conn->prepare("UPDATE usuarios SET nomeUsuario = ?, usuario = ?, senhaUsuario = ?, turmaUsuario = ?, dataAlteracao = NOW() WHERE idUsuario = ?");
        $stmt->execute([$nome, $usuario, $senha, $turma, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE usuarios SET nomeUsuario = ?, usuario = ?, turmaUsuario = ?, dataAlteracao = NOW() WHERE idUsuario = ?");
        $stmt->execute([$nome, $usuario, $turma, $id]);
    }

    header("Location: listar.php");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE idUsuario = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['idUsuario'] ?>">
        Nome: <input type="text" name="nomeUsuario" value="<?= $user['nomeUsuario'] ?>" required><br>
        Usuário: <input type="text" name="usuario" value="<?= $user['usuario'] ?>" required><br>
        Senha: <input type="password" name="senhaUsuario"><br>
        Turma: <input type="text" name="turmaUsuario" value="<?= $user['turmaUsuario'] ?>"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

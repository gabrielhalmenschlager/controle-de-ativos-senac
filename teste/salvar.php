<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nomeUsuario'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senhaUsuario'], PASSWORD_DEFAULT); // Hash da senha
    $turma = $_POST['turmaUsuario'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nomeUsuario, usuario, senhaUsuario, turmaUsuario, dataCadastro) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$nome, $usuario, $senha, $turma]);

    header("Location: listar.php");
}
?>

<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
$stmt->execute([$id]);

header("Location: listar.php");
?>

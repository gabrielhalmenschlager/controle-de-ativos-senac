<?php
$host = 'localhost';
$db = 'nome_do_banco'; // substitua pelo nome do seu banco de dados
$user = 'usuario'; // substitua pelo seu usuário do banco
$pass = 'senha'; // substitua pela sua senha

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>

<?php 

// Conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '','ativo'); // hostname, username, senha, banco de dados

if(!$conexao){
    echo "Falha na conexão";
    exit();
}

?>
<?php

session_start();

include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$senhaCrip = base64_encode($senha);

$sql = "Select 
            count(*) as quantidade, 
            idUsuario,
            admin
        from 
            usuario
        where
        usuario='$usuario'
        and senhaUsuario='$senhaCrip'";

    $ativos = mysqli_query($conexao, $sql) or die(false);
    $dados = $ativos->fetch_assoc();

if ($dados['quantidade'] > 0) {
    $_SESSION['login_ok'] = true;
    $_SESSION['controle_login'] = true;
    $_SESSION['id_user'] = $dados['idUsuario'];
    if ($dados['admin'] == 'S') {
        $_SESSION['admin'] = "S";
    } else {
        $_SESSION['admin'] = "N";
    }
    header('location: ../visao/listar_usuario.php');
} else {
    $_SESSION['login_ok'] = false;
    unset($_SESSION['controle_login'],$_SESSION['admin']);
    header('location: ../visao/login.php?error_auten=s');
}
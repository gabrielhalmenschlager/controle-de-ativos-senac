<?php

include_once('controle_session.php');
include_once('../modelo/conexao.php');

$nome = $_POST['nome'];
$turma = $_POST['turma'];
$id = $_POST['id'];
$idCargo = $_POST['idCargo'];

$query = "
        UPDATE    
            usuario 
        SET 
            nomeUsuario = '".$nome."',
            TurmaUsuario = '".$turma."',
            idCargo = '".$idCargo."'
        WHERE
            idUsuario = '".$id."'
";

$ativos = mysqli_query($conexao, $query);

if ($ativos) {
    echo "<script> 
            alert('Usuário Alterado');
            window.location.href = '../visao/listar_usuario.php'; 
          </script>";
} else {
    echo "<script> 
            alert('Falha na alteração');
            window.location.href = '../visao/alterar_usuario.php?id_usuario=$id'; 
          </script>";
}

?>

<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR);

include_once('../modelo/conexao.php');
include_once('controle_session.php');

$tipo = $_POST['tipo'];
$acao = $_POST['acao'];
$user = $_SESSION['id_user'];
$idTipo = $_POST['idTipo'];
$statusTipo = $_POST['status'];


if ($acao == 'inserir') {
    $query = "
    INSERT INTO tipo (
        descricaoTipo,
        statusTipo,
        dataCadastro,
        idUsuario
    ) 
    VALUES (
        '" . $tipo . "',
        'S',
        NOW(),
        '" . $user . "'
    )
    ";
   
    $result = mysqli_query($conexao, $query);

    if ($result) {
        echo 'Tipo cadastrado com sucesso!';
    } else {
        echo 'Erro ao cadastrar tipo!';
    }
}

if ($acao == 'alterar_status') {
    $sql = "
        UPDATE tipo SET statusTipo ='$statusTipo' WHERE idTipo=$idTipo
    ";

    $result_status = mysqli_query($conexao, $sql);

    if ($result_status) {
        echo 'Status Alterado!';
    } else {
        echo 'Erro ao alterar status!';
    }
}


if ($acao == "get_info") {
    $sql = "
        SELECT
            idTipo,
            descricaoTipo
        FROM
            tipo
        WHERE
            idTipo = $idTipo
    ";

    $result = mysqli_query($conexao, $sql) or die(false);
    $tipo = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($tipo);
    exit();
}

if ($acao == 'update') {
    $sql = "
        UPDATE tipo SET
            descricaoTipo = '$tipo'
        WHERE idTipo = $idTipo
    ";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo 'Informações alteradas com sucesso!';
    } else {
        echo 'Erro ao alterar informações!';
    }
}

if ($acao == 'remover') {
    $idTipo = $_POST['idTipo'];

    $sql = "
        DELETE FROM tipo WHERE idTipo = $idTipo
    ";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo 'Tipo removido com sucesso!';
    } else {
        echo 'Erro ao remover tipo!';
    }
}

?>

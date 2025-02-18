<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR);

include_once('../modelo/conexao.php');
include_once('controle_session.php');

$marca = $_POST['marca'];
$acao = $_POST['acao'];
$user = $_SESSION['id_user'];
$idMarca = $_POST['idMarca'];
$statusMarca = $_POST['status'];


if ($acao == 'inserir') {
    $query = "
    INSERT INTO marca (
        descricaoMarca,
        statusMarca,
        dataCadastro,
        idUsuario
    ) 
    VALUES (
        '" . $marca . "',
        'S',
        NOW(),
        '" . $user . "'
    )
    ";
   
    $result = mysqli_query($conexao, $query);

    if ($result) {
        echo 'Marca cadastrada com sucesso!';
    } else {
        echo 'Erro ao cadastrar marca!';
    }
}

if ($acao == 'alterar_status') {
    $sql = "
        UPDATE marca SET statusMarca ='$statusMarca' WHERE idMarca=$idMarca
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
            idMarca,
            descricaoMarca
        FROM
            marca
        WHERE
            idMarca = $idMarca
    ";

    $result = mysqli_query($conexao, $sql) or die(false);
    $marca = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($marca);
    exit();
}

if ($acao == 'update') {
    $sql = "
        UPDATE marca SET
            descricaoMarca = '$marca'
        WHERE idMarca = $idMarca
    ";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo 'Informações alteradas com sucesso!';
    } else {
        echo 'Erro ao alterar informações!';
    }
}

if ($acao == 'remover') {
    $idMarca = $_POST['idMarca'];

    $sql = "
        DELETE FROM marca WHERE idMarca = $idMarca
    ";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo 'Marca removido com sucesso!';
    } else {
        echo 'Erro ao remover marca!';
    }
}

?>

<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

include_once('../modelo/conexao.php');

ini_set('display_errors', 0);
error_reporting(E_ERROR);

$ativo = $_POST['idAtivo'];
$idMovimentacao = $_POST['idMovimentacao'];
$tipoMovimentacao = $_POST['tipoMovimentacao'];
$quantidadeMov = $_POST['quantidadeMov'];
$localOrigem = $_POST['localOrigem'];
$localDestino = $_POST['localDestino'];
$descricaoMovimentacao = $_POST['descricaoMovimentacao'];
$statusMov = $_POST['statusMov'];

$acao = $_POST['acao'];

$user = $_SESSION['id_user'];

if ($acao == 'cadastrarMov') {

$sqlTotal = "
    SELECT quantidadeAtivo
    FROM ativo
    WHERE idAtivo = $ativo
";

$result = mysqli_query($conexao, $sqlTotal);

$ativosTotal = mysqli_fetch_assoc($result);
$quantidadeTotal = $ativosTotal['quantidadeAtivo'];

$sqlUso = "
    SELECT COALESCE(quantidadeUso, 0) as quantidadeUso
    FROM movimentacao
    WHERE idAtivo = $ativo
    AND statusMov = 'S'
";

$resultUso = mysqli_query($conexao, $sqlUso);
if (!$resultUso) {
    die("Erro na consulta de ativos em uso: " . mysqli_error($conexao));
}

$ativosUso = mysqli_fetch_assoc($resultUso);
$quantidadeUso = $ativosUso['quantidadeUso'];

if ($tipoMovimentacao == "Adicionar") {
    $total = $quantidadeMov + $quantidadeUso;
    if ($quantidadeTotal < $total) {
        echo "Não é Permitido realizar a Movimentação. Quantidade de ativos em uso mais a quantidade selecionada ultrapassa o total de ativos cadastrados.";
        exit();
    }
} else if ($tipoMovimentacao == "Remover") {
    if ($quantidadeUso - $quantidadeMov < 0) {
        echo "Não é Permitido realizar a Movimentação. Quantidade de ativos a ser removida é maior que a quantidade em uso.";
        exit();
    }
    $total = $quantidadeUso - $quantidadeMov;
} else {
    if ($quantidadeUso - $quantidadeMov < 0) {
        echo "Não é Permitido realizar a Movimentação. Quantidade de ativos a ser realocada é maior que a quantidade em uso.";
        exit();
    }
    $total = $quantidadeUso;
}

$queryUpdate = "
    UPDATE 
        movimentacao
    SET  
        statusMov = 'N'
    WHERE 
        idAtivo = $ativo
";

$resultUpdate = mysqli_query($conexao, $queryUpdate);

$queryInsert = "
    INSERT INTO movimentacao (
        idUsuario,
        idAtivo,
        localOrigem,
        localDestino,
        dataMovimentacao,
        descricaoMovimentacao,
        quantidadeUso,
        statusMov,
        tipoMovimentacao,
        quantidadeMov
    )
    VALUES (
        '" . $user . "',
        '" . $ativo . "',
        '" . $localOrigem . "',
        '" . $localDestino . "',
        NOW(),
        '" . $descricaoMovimentacao . "',
        '" . $total . "',
        'S',
        '" . $tipoMovimentacao . "',
        '" . $quantidadeMov . "'
    )
";

$resultInsert = mysqli_query($conexao, $queryInsert);
if ($resultInsert) {
    echo "sucesso";
} else {
    echo "Erro ao registrar movimentação: " . mysqli_error($conexao);
}

}

if ($acao == 'get_info') {
    $sql = "SELECT
    idMovimentacao,
    descricaoMovimentacao,
    quantidadeMov,
    quantidadeUso,
    statusMov,
    tipoMovimentacao,
    localOrigem,
    localDestino,
    `dataMovimentacao`,
    (SELECT descricaoAtivo FROM ativo a WHERE a.idAtivo = m.idAtivo) as ativo,
    (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = m.idUsuario) as usuario,
    (SELECT quantidadeAtivo FROM ativo a WHERE a.idAtivo = m.idAtivo) as quantidadeAtivo
FROM movimentacao m
WHERE idMovimentacao = $idMovimentacao ";

    $result = mysqli_query($conexao, $sql);
    $movimentacoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($movimentacoes);
}


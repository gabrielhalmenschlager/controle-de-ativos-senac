<?php

ini_set('display_errors', 1);
error_reporting(E_ERROR);

include_once("controle_session.php");
include_once("classe_opcoes.php");
include_once("../modelo/conexao.php");

$acao = $_POST['acao'];

$idOpcao = $_POST['idOpcao'];
$descricaoOpcao = $_POST['descricaoOpcao'];
$nivelOpcao = $_POST['nivelOpcao'];
$urlOpcao = $_POST['urlOpcao'];
$statusOpcao = $_POST['statusOpcao'];
$idUsuario = $_SESSION['id_user'];

$classeOpcoes = new opcoes(); 

if ($acao == 'insert'){
    $retorno = $classeOpcoes->insert($conexao, $descricaoOpcao, $nivelOpcao, $urlOpcao, $idUsuario);

} else if ($acao == 'alterar_status') {
    $retorno = $classeOpcoes->alterar_status($conexao, $statusOpcao, $idOpcao);

} else if ($acao == 'get_info') {
    $retorno = $classeOpcoes->get_info($conexao, $idOpcao);

} else if ($acao == 'update') {
    $retorno = $classeOpcoes->update($conexao, $idOpcao, $descricaoOpcao, $nivelOpcao, $urlOpcao, $idUsuario);
    
} else if ($acao == 'deletar_opcao') {
    $retorno = $classeOpcoes->deletar_opcao($conexao, $idOpcao);
}
echo $retorno;

?>
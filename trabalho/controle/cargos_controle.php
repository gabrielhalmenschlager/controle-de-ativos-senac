<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR);

include_once("controle_session.php");
include_once("classe_cargos.php");
include_once("../modelo/conexao.php");

$acao = $_POST['acao'];

$idCargo = $_POST['idCargo'];
$descricaoCargo = $_POST['descricaoCargo'];
$idUsuario = $_SESSION['id_user'];

$classeCargos = new cargos(); 

if ($acao == 'insert'){
    $retorno = $classeCargos->insert($conexao, $descricaoCargo, $idUsuario);

} else if ($acao == 'alterar_status') {
    $retorno = $classeCargos->alterar_status($conexao, $statusCargo, $idCargo);

} else if ($acao == 'get_info') {
    $retorno = $classeCargos->get_info($conexao, $idCargo);

} else if ($acao == 'update') {
    $retorno = $classeCargos->update($conexao, $idCargo, $descricaoCargo, $idUsuario);

} else if ($acao == 'deletar_cargo') {
    $retorno = $classeCargos->deletar_cargo($conexao, $idCargo);
}

echo $retorno;

?>

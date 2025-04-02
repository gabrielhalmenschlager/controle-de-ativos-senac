<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : $data['cargo'];
$acao = isset($_POST['acao']) ? $_POST['acao'] : $data['acao'];

$user = $_SESSION['id_user'];

if ($acao == 'gravar_acesso') {

    $sql = "SELECT 
            idCargo,
            idOpcao,
            idAcesso,
            statusAcesso
        FROM 
            acesso
        WHERE 
            idCargo = '$cargo' ";

    $result = mysqli_query($conexao, $sql) or die(false);
    $acessos = $result->fetch_all(MYSQLI_ASSOC);

    var_dump($data['acessos']);

    foreach ($data['acessos'] as $infoAcesso) {
        $array_acessos_selecionados[$infoAcesso['idOpcao']] = $infoAcesso['acesso'];
    }

    $sql = "";

    if (!empty($acessos)) {

        foreach ($acessos as $acesso_bd) {
            if (array_key_exists($acesso_bd['idOpcao'], $array_acessos_selecionados)) {
                $sql .= "update acesso set statusAcesso = '" . $array_acessos_selecionados[$acesso_bd['idOpcao']] . " where idAcesso = '" . $acesso_bd['idAcesso'] . "'; '; 
            ";
            } else {
                $sql .= "update acesso set statusAcesso = 'N' where idAcesso = '" . $acesso_bd['idAcesso'] . "'; ";
            }
            unset($array_acessos_selecionados[$acesso_bd['idOpcao']]);
        }
    } else {

        foreach ($array_acessos_selecionados as $idOpcao => $acesso_new) {

            $sql .= "insert into acesso (
                                        idCargo,
                                        idOpcao,
                                        statusAcesso,
                                        idUsuario,
                                        dataCadastro
                                        ) values (
                                        '" . $cargo . "',
                                        '" . $idOpcao . "',
                                        '" . $acesso_new . "',
                                        '" . $user . "',
                                        NOW()
                                        );
        ";
        }
    }

    $sql = substr($sql, 0, -2);

    $result = mysqli_multi_query($conexao, $sql) or die(false);

    if ($result) {

        echo json_encode("Cadastro realizado");
        exit;
    }
}

if ($acao == 'busca_acesso') {

    $sql = "SELECT 
            idCargo,
            idOpcao,
            idAcesso,
            statusAcesso
        FROM 
            acesso
        WHERE 
            idCargo = '$cargo' ";

    $result = mysqli_query($conexao, $sql) or die(false);
    $acessos = $result->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($acessos);

}

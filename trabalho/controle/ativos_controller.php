<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR);

include_once("../modelo/conexao.php");
include_once("controle_session.php");

$ativos = $_POST['ativo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$quantidadeMin = $_POST['quantidadeMin'];
$observacao = $_POST['observacao'];
$acao = $_POST['acao'];
$idAtivo = $_POST['idAtivo'];
$statusAtivo = $_POST['status'];
$user = $_SESSION['id_user'];
$img = $_FILES['img'];

if ($acao == 'inserir') {

  $pasta_base = $_SERVER['DOCUMENT_ROOT'] . '/projeto_senac/trabalho/img_ativo/';

  if (!file_exists($pasta_base)) {
    mkdir($pasta_base);
  }

  $data = date("YmdHis");
  $tipoImagem = $img['type'];
  $quebraTipo = explode('/', $tipoImagem);
  $extensao = $quebraTipo[1];
  $result = move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao);

  if ($result == false) {
    echo "Falha ao mover o arquivo";
    exit();
  }

  $urlImg = 'projeto_senac/trabalho/img_ativo/' . $data . '.' . $extensao;

  $querry = "
            insert into ativo (
                                     descricaoAtivo,
                                     quantidadeAtivo,
                                     quantidadeMinAtivo,
                                     statusAtivo,
                                     observacaoAtivo,
                                     urlImagem,
                                     idMarca,
                                     idTipo,
                                     dataCadastro,
                                     idUsuario
                                    )values(
                                      '" . $ativos . "',
                                      '" . $quantidade . "',
                                      '" . $quantidadeMin . "',
                                      'S',
                                      '" . $observacao . "',
                                      '" . $urlImg . "',
                                      '" . $marca . "',
                                      '" . $tipo . "',
                                      NOW(),
                                      '" . $user . "'
                                    )
                                      ";
                                      
  $result = mysqli_query($conexao, $querry) or die(false);

  if ($result) {
    echo "Cadastro realizado com sucesso!";
  } else {
    echo "Cadastro não realizado";
  }
}

if ($acao == 'alterar_status') {
  $sql = "Update ativo set statusAtivo = '$statusAtivo' where idAtivo = $idAtivo";

  $result = mysqli_query($conexao, $sql) or die(false);

  if ($result) {
    echo "Status alterado";
  } else {
    echo "Status não alterardo";
  }

}

  if($acao == 'get_info'){
    $sql = "
        Select 
            descricaoAtivo,
            quantidadeAtivo,
            quantidadeMinAtivo,
            observacaoAtivo,
            dataCadastro,
            urlImagem,
            a.idMarca,
            a.idTipo,
            (SELECT descricaoMarca FROM marca m WHERE m.idMarca = a.idMarca) as marca,
            (SELECT descricaoTipo FROM tipo t WHERE t.idTipo = a.idTipo) as tipo,  
            (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) as usuario
        From
            ativo a 
        Where
            idAtivo = $idAtivo    
    ";

    $result = mysqli_query($conexao, $sql) or die(false);
    $ativo = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($ativo);

    exit();
};

if ($acao == 'update') {
  $queryUpdate = "UPDATE 
                          ativo 
                  SET 
                          descricaoAtivo = '$ativos', 
                          quantidadeAtivo = '$quantidade', 
                          quantidadeMinAtivo = '$quantidadeMin', 
                          idTipo = '$tipo', 
                          idMarca = '$marca', 
                          observacaoAtivo = '$observacao'";

  if ($img && $img['error'] == 0) {
    $pasta_base = $_SERVER['DOCUMENT_ROOT'] . '/projeto_senac/trabalho/img_ativo/';
    $data = date("YmdHis");
    $extensao = explode('/', $img['type'])[1];

    if (move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao)) {
      $urlImagem = '/projeto_senac/trabalho/img_ativo/' . $data . '.' . $extensao;
      $queryUpdate .= ", urlImagem = '$urlImagem'";
    }
  }

  $queryUpdate .= " WHERE idAtivo = $idAtivo";

  if (mysqli_query($conexao, $queryUpdate)) {
    echo "Informações Alteradas";
  }
}

  if ($acao == 'remover') {
    $idAtivo = $_POST['idAtivo'];

    $sql = "
        DELETE FROM ativo WHERE idAtivo = $idAtivo
    ";

    $resultRemov = mysqli_query($conexao, $sql);

    if ($resultRemov) {
        echo 'Ativo removido com sucesso!';
    } else {
        echo 'Erro ao remover ativo!';
    }
  }

?>
<?php

ini_set('display_errors', 1);
error_reporting(E_ERROR);

include_once('../modelo/conexao.php');
include_once('controle_session.php');
$title = "Relatório Gerado";
include_once('cabecalho.php');
include_once('menu_superior.php');

$ativo = $_POST['ativo'];
$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];
$marca = $_SESSION['marca'];
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];
$tipo_movimentacao = $_POST['tipo_movimentacao'];

$sql = "
    SELECT
        (SELECT descricaoAtivo FROM ativo a WHERE a.idAtivo = m.idAtivo) as ativo,
        (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = m.idUsuario) as usuario,
        descricaoMovimentacao,
        quantidadeMov,
        quantidadeUso,
        statusMov,
        tipoMovimentacao,
        localOrigem,
        localDestino,
        dataMovimentacao
    FROM
        movimentacao m
    WHERE
        idAtivo is not null

";

if ($ativo != '' && $ativo != null) {
    $sql .= " AND m.idAtivo = $ativo";
} else {
    if ($marca != '' && $marca != null) {
        $sql .= " AND m.idAtivo in(SELECT idAtivo FROM ativo a WHERE a.idMarca = $marca)";
    }
    if ($tipo != '' && $tipo != null) {
        $sql .= " AND m.idAtivo in(SELECT idAtivo FROM ativo a WHERE a.idTipo = $tipo)";
    }
}
if ($usuario != '' && $usuario != null) {
    $sql .= " AND m.idUsuario = $usuario";
}
if ($tipo_movimentacao != '' && $tipo_movimentacao != null) {
    $sql .= " AND m.tipoMovimentacao = '$tipo_movimentacao'";
}
if ($data_inicial != '' && $data_inicial != '') {
    $sql .= " AND m.dataMovimentacao > '$data_inicial'";
}
if ($data_final != '' && $data_final != '') {
    $sql .= " AND m.dataMovimentacao < '$data_final'";
}

$result = mysqli_query($conexao, $sql) or die(false);
$movimentacoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center">
                <h1 class="mb-4 text-center" style="color: #054F77;">Relatório Gerado
                    <a href="relatorio.php" class="btn btn-primary" style="background-color: #6c757d; color: white;">Voltar</a>
                </h1>

                <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
                    <thead>
                        <tr>
                            <th style="background-color: #054F77; color: white;" scope="col">Ativo</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Usuário</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Tipo Mov</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Quantidade Uso</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Quantidade Mov</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Local Origem</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Local Destino</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Descrição</th>
                            <th style="background-color: #054F77; color: white;" scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($movimentacoes as $movimentacao) {
                        ?>
                            <tr>
                                <td><?php echo $movimentacao['ativo']; ?></td>
                                <td><?php echo $movimentacao['usuario']; ?></td>
                                <td><?php echo $movimentacao['tipoMovimentacao']; ?></td>
                                <td><?php echo $movimentacao['quantidadeUso']; ?></td>
                                <td><?php echo $movimentacao['quantidadeMov']; ?></td>
                                <td><?php echo $movimentacao['localOrigem']; ?></td>
                                <td><?php echo $movimentacao['localDestino']; ?></td>
                                <td><?php echo $movimentacao['descricaoMovimentacao']; ?></td>
                                <td><?php echo $movimentacao['dataMovimentacao']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>

<footer class="footer bg-light text-center py-3 mt-5">
    <div class="container">
        <span style="color: #054F77;">2024 Senac | Todos os direitos reservados</span>
    </div>
</footer>


<?php

include_once('modal_movimentacoes.php');

?>
<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$title = "Movimentações";
include_once('cabecalho.php');
include_once('menu_superior.php');

$ativos = busca_info_bd($conexao, 'ativo');

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
            (SELECT quantidadeAtivo FROM ativo a WHERE a.idAtivo = m.idAtivo) as quantidadeAtivoTotal
        FROM movimentacao m
        WHERE statusMov = 'S'";

$result = mysqli_query($conexao, $sql);
$movimentacoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<script src="../js/movimentacoes.js"></script>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <button type="button" id="btn_modal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Movimentações</button>
    </div>
    <div class="container mt-5">
        <div class="d-flex flex-column align-items-center">
            <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Movimentações</h1>

            <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
                <thead>
                    <tr>
                        <th style="background-color: #054F77; color: white;" scope="col">Ativo</th>
                        <th style="background-color: #054F77; color: white;" scope="col">Tipo</th>
                        <th style="background-color: #054F77; color: white;" scope="col">Quantidade Uso</th>
                        <th style="background-color: #054F77; color: white;" scope="col">Quantidade Última Mov</th>
                        <th style="background-color: #054F77; color: white;" scope="col">Quantidade Total</th>
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
                            <td><?php echo $movimentacao['tipoMovimentacao']; ?></td>
                            <td><?php echo $movimentacao['quantidadeUso']; ?></td>
                            <td><?php echo $movimentacao['quantidadeMov']; ?></td>
                            <td><?php echo $movimentacao['quantidadeAtivoTotal']; ?></td>
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

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span style="color: #054F77;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

<?php

include_once('modal_movimentacoes.php');

?>

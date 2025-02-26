<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$title = "Listar Ativos";

include_once('cabecalho.php');
include_once('menu_superior.php');

$marcas = busca_info_bd($conexao, 'marca');
$tipos = busca_info_bd($conexao, 'tipo');

$sql = "SELECT
            idAtivo,
            descricaoAtivo,
            quantidadeAtivo,
            quantidadeMinAtivo,
            statusAtivo,
            urlImagem,
            observacaoAtivo,
            (SELECT descricaoMarca FROM marca m WHERE m.idMarca = a.idMarca) AS marca,
            (SELECT descricaoTipo FROM tipo m WHERE m.idTipo = a.idTipo) AS tipo,
            (SELECT usuario FROM usuario m WHERE m.idUsuario = a.idUsuario) AS usuario,
            dataCadastro
        FROM ativo a";

$result = mysqli_query($conexao, $sql) or die(false);
$ativos_bd = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Ativos</h1>

        <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
            <thead>
                <tr>
                    <th style="background-color: #054F77; color: white;" scope="col">Descrição</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Marca</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Tipo</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Quantidade</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Quantidade Min</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Imagem</th>
                    <th style="background-color: #054F77; color: white; text-align:center;" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ativos_bd as $ativos) {
                    $alertaQuantidade = ($ativos['quantidadeAtivo'] < $ativos['quantidadeMinAtivo']) ? true : false;
                ?>
                    <tr>
                        <td><?php echo $ativos['descricaoAtivo']; ?></td>
                        <td><?php echo $ativos['marca']; ?></td>
                        <td><?php echo $ativos['tipo']; ?></td>
                        <td>
                            <?php echo $ativos['quantidadeAtivo']; ?>
                            <?php if ($alertaQuantidade) { ?>
                                <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png" alt="Alerta" style="width: 20px; height: 20px; margin-left: 10px;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade abaixo do mínimo!">
                            <?php } ?>
                        </td>
                        <td>
                            <?php echo $ativos['quantidadeMinAtivo']; ?>
                            <?php if ($alertaQuantidade) { ?>
                                <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png" alt="Alerta" style="width: 20px; height: 20px; margin-left: 10px;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade mínima acima da quantidade total!">
                            <?php } ?>
                        </td>
                        <td>
                            <img onclick="abrirImagem('<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . $ativos['urlImagem']; ?>')" src="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . $ativos['urlImagem']; ?>" style="width: 70px; height: 70px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Imagem">
                        </td>
                        <td>
                            <div class="acoes" style="display: flex; justify-content: space-around;">
                                <div class="muda_status" style="margin-right: 20px;">
                                    <?php
                                    if ($ativos['statusAtivo'] == "S") {
                                    ?>
                                        <div class="inativo" onclick="muda_status('N', '<?php echo $ativos['idAtivo']; ?>')" data-bs-toggle="tooltip" data-bs-placement="top" title="Ativo">
                                            <img src="https://png.pngtree.com/png-clipart/20221028/ourmid/pngtree-right-symbol-png-image_6400869.png" alt="Ativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="ativo" onclick="muda_status('S', '<?php echo $ativos['idAtivo']; ?>')" data-bs-toggle="tooltip" data-bs-placement="top" title="Inativo">
                                            <img src="https://png.pngtree.com/png-vector/20221215/ourmid/pngtree-wrong-icon-png-image_6525689.png" alt="Inativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="edit" style="margin-right: 20px;" onclick="editar('<?php echo $ativos['idAtivo']; ?>')" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4226/4226577.png" alt="Editar" style="width: 20px; height: 20px;">
                                </div>
                                <div class="remover" onclick="remover('<?php echo $ativos['idAtivo']; ?>')" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover">
                                    <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Remover" style="width: 20px; height: 20px;">
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <input type="hidden" id="idAtivo" name="idAtivo">

    </div>

    <div class="modal fade" id="modalImagem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #054F77; color: white;">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Imagem do Ativo</h1>
                    <button type="button" onclick="limpar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="imagemModal" src="" alt="Imagem do Ativo" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function abrirImagem(url) {

            document.getElementById('imagemModal').src = url;

            new bootstrap.Modal(document.getElementById('modalImagem')).show();
        }
    </script>

    <div class="container mt-5">
        <h2 class="text-center" style="color: #054F77;">Gráfico dos Ativos Com Mais Quantidades</h2>
        <div style="display: flex; align-items: center; width: 100%; justify-content: center;">
            <div style="height: 400px; width: 400px;">
                <canvas id="movimentacaoGrafico" width="200px" height="100px"></canvas>
            </div>
        </div>
    </div>

    <?php

    $sqlGrafico = "
    SELECT 
        a.descricaoAtivo, 
        a.quantidadeAtivo
    FROM ativo a
    WHERE a.statusAtivo = 'S'
    ORDER BY a.quantidadeAtivo DESC
    LIMIT 10;
    ";

    $resultGrafico = mysqli_query($conexao, $sqlGrafico);
    $dadosGrafico = [];
    while ($row = mysqli_fetch_assoc($resultGrafico)) {
        $dadosGrafico[] = $row;
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            var labels = <?php echo json_encode(array_column($dadosGrafico, 'descricaoAtivo')); ?>;
            var data = <?php echo json_encode(array_column($dadosGrafico, 'quantidadeAtivo')); ?>;

            var ctx = document.getElementById('movimentacaoGrafico').getContext('2d');
            var movimentacaoChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Quantidade de Ativos',
                        data: data,
                        backgroundColor: ['#36A2EB', '#FFA500', '#FFCD56', '#4BC0C0', '#9966FF', '#FF6655', '#FF3388', '#FF3355', '#FF0000'],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' ativos';
                                }
                            }
                        },
                        legend: {
                            position: 'top',
                            labels: {
                                fontSize: 14,
                                fontColor: '#054F77'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span style="color: #054F77;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

</body>
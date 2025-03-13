<?php
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title = "Tipos";
include_once('cabecalho.php');

$tipos = busca_info_bd($conexao, 'tipo');

include_once('menu_superior.php');
?>

<script src="../js/tipos.js"></script>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <button type="button" id="btn_modal" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Tipos
            </button>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Tipos</h1>

        <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
            <thead>
                <tr>
                    <th style="background-color: #054F77; color: white;" scope="col">Id</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Descrição</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Status</th>
                    <th style="background-color: #054F77; color: white;" scope="col" style="text-align:center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tipos as $tipo) {
                ?>
                    <tr>
                        <td><?php echo $tipo['idTipo']; ?></td>
                        <td><?php echo $tipo['descricaoTipo']; ?></td>
                        <td><?php echo $tipo['statusTipo']; ?></td>
                        <td>
                            <div class="acoes" style="display: flex;justify-content: space-around;">
                                <div class="muda_status">
                                    <?php
                                    if ($tipo['statusTipo'] == "S") {
                                    ?>
                                        <div class="inativo" onclick="muda_status('N','<?php echo $tipo['idTipo']; ?>')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Ativo">
                                            <img src="https://png.pngtree.com/png-clipart/20221028/ourmid/pngtree-right-symbol-png-image_6400869.png" alt="Ativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="ativo" onclick="muda_status('S','<?php echo $tipo['idTipo']; ?>')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Inativo">
                                            <img src="https://png.pngtree.com/png-vector/20221215/ourmid/pngtree-wrong-icon-png-image_6525689.png" alt="Inativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="edit" onclick="editar('<?php echo $tipo['idTipo']; ?>')"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4226/4226577.png" alt="Editar" style="width: 20px; height: 20px;">
                                </div>
                                <div class="remover" onclick="remover('<?php echo $tipo['idTipo']; ?>')"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Remover">
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
        <input type="hidden" id="idTipo" name="idTipo">
        <?php
        include_once('modal_tipo.php');
        ?>
    </div>

</body>

    <?php
    $sqlGraficoTipos = "
        SELECT 
            statusTipo,
            COUNT(*) as quantidade
        FROM tipo
        WHERE statusTipo IN ('S', 'N')  -- Somente ativos e inativos
        GROUP BY statusTipo;
    ";

    $resultGraficoTipos = mysqli_query($conexao, $sqlGraficoTipos);
    $dadosGraficoTipos = ['S' => 0, 'N' => 0];

    while ($row = mysqli_fetch_assoc($resultGraficoTipos)) {
        $dadosGraficoTipos[$row['statusTipo']] = $row['quantidade'];
    }
    $ativos = $dadosGraficoTipos['S'];
    $inativos = $dadosGraficoTipos['N'];
    ?>

    <div class="container mt-5">
        <h2 class="text-center" style="color: #054F77;">Gráfico de Tipos Ativos e Inativos</h2>
        <div style="display: flex; justify-content: center;">
            <div style="height: 400px; width: 400px;">
                <canvas id="graficoTipos" width="200px" height="100px"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            var labels = ['Ativos', 'Inativos'];
            var data = [
                <?php echo $ativos; ?>,
                <?php echo $inativos; ?>
            ];

            var ctx = document.getElementById('graficoTipos').getContext('2d');
            var graficoTipos = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: ['#4CAF50', '#FF6655'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontColor: '#054F77'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <footer class="footer bg-light text-center py-1 mt-5" style="background-color: gray;">
        <div class="container">
            <div class="row align-items-center">
                <div class=" mt-3 col-6 text-left">
                    <img src="https://cdljundiai.com.br/wp-content/uploads/2020/06/senac.png" alt="Logo Senac" style="width: 120px;">
                </div>
                <div class="mt-3 col-6 text-right">
                    <p style="color: white; margin-bottom: 0; font-size: 15px;">Siga-nos nas redes sociais:</p>
                    <a href="https://www.instagram.com/senacsantacruz" target="_blank" class="mr-2">
                        <img src="https://png.pngtree.com/png-clipart/20180626/ourmid/pngtree-instagram-icon-instagram-logo-png-image_3584852.png" alt="Instagram" style="width: 35px; height: 35px; transition: transform 0.3s;">
                    </a>
                    <a href="https://www.facebook.com/senacsantacruz" target="_blank" class="mr-2">
                        <img src="https://static.vecteezy.com/system/resources/previews/018/930/698/non_2x/facebook-logo-facebook-icon-transparent-free-png.png" alt="Facebook" style="width: 40px; height: 40px; transition: transform 0.3s;">
                    </a>
                </div>
            </div>
            <div class="mt-2">
                <span style="color: white; font-size: 15px;">2025 Senac | Todos os direitos reservados</span>
            </div>
        </div>
    </footer>
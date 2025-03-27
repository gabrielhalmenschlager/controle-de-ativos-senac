<?php

include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title = "Opções";
include_once('cabecalho.php');

$sql = "
SELECT 
    idOpcao,  
    descricaoOpcao, 
    urlOpcao,
    statusOpcao,  
    nivelOpcao,
    dataCadastroOpcao,   
    (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) AS usuario,
    (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS descricaoNivel,
    (SELECT idNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS idNivel
FROM 
    opcoes_menu a
WHERE nivelOpcao = 1"

;

$result = mysqli_query($conexao, $sql) or die(false);
$opcoes = $result->fetch_all(MYSQLI_ASSOC);
$niveis = busca_info_bd($conexao, 'nivel_acesso');


$novoArr = [];

foreach ($opcoes as $row) {
    $novoArr[$row['idOpcao']]['DESCR_OPCAO'] = $row['descricaoOpcao'];
    $novoArr[$row['idOpcao']]['NIVEL_OPCAO'] = $row['nivelOpcao'];
    $novoArr[$row['idOpcao']]['URL_OPCAO'] = $row['urlOpcao'];
    $novoArr[$row['idOpcao']]['STATUS_OPCAO'] = $row['statusOpcao'];
    $novoArr[$row['idOpcao']]['DESCR_NIVEL'] = $row['descricaoNivel'];

    $sqlSub = "
    SELECT 
        idOpcao,
        descricaoOpcao,
        nivelOpcao,
        urlOpcao,
        statusOpcao,
        (SELECT descricaoNivel FROM nivel_acesso ac WHERE ac.idNivel = a.nivelOpcao) as descricaoNivel
    FROM
        opcoes_menu a
    WHERE
        idSuperior = " . $row['idOpcao'] . "
";

    $resultSub = mysqli_query($conexao, $sqlSub) or die(false);
    $opcaoSub = $resultSub->fetch_all(MYSQLI_ASSOC);

    foreach ($opcaoSub as $sub){
    $novoArr[$sub['idOpcao']]['DESCR_OPCAO'] = $sub['descricaoOpcao'];
    $novoArr[$sub['idOpcao']]['NIVEL_OPCAO'] = $sub['nivelOpcao'];
    $novoArr[$sub['idOpcao']]['URL_OPCAO'] = $sub['urlOpcao'];
    $novoArr[$sub['idOpcao']]['STATUS_OPCAO'] = $sub['statusOpcao'];
    $novoArr[$sub['idOpcao']]['DESCR_NIVEL'] = $sub['descricaoNivel'];
          
        $sqlOpcao = "
        SELECT 
            idOpcao,
            descricaoOpcao,
            nivelOpcao,
            urlOpcao,
            statusOpcao,
            (SELECT descricaoNivel FROM nivel_acesso ac WHERE ac.idNivel = a.nivelOpcao) as descricaoNivel
        FROM
            opcoes_menu a
        WHERE
            idSuperior = " . $sub['idOpcao'] . "
    ";
    
        $resultOpcao = mysqli_query($conexao, $sqlOpcao) or die(false);
        $opcaoOp = $resultOpcao->fetch_all(MYSQLI_ASSOC);
    
        foreach ($opcaoOp as $opcao){
            $novoArr[$opcao['idOpcao']]['DESCR_OPCAO'] = $opcao['descricaoOpcao'];
            $novoArr[$opcao['idOpcao']]['NIVEL_OPCAO'] = $opcao['nivelOpcao'];
            $novoArr[$opcao['idOpcao']]['URL_OPCAO'] = $opcao['urlOpcao'];
            $novoArr[$opcao['idOpcao']]['STATUS_OPCAO'] = $opcao['statusOpcao'];
            $novoArr[$opcao['idOpcao']]['DESCR_NIVEL'] = $opcao['descricaoNivel'];

        }
    }
}

include_once('menu_superior.php');

?>

<script src="../js/opcoes.js"></script>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <button type="button" id="btn_modal" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Opções
            </button>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Opções</h1>

        <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
            <thead>
                <tr>
                    <th style="background-color: #054F77; color: white;" scope="col">Id</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Descrição</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Descrição Nível</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Nível</th>
                    <th style="background-color: #054F77; color: white;" scope="col">URL</th>
                    <th style="background-color: #054F77; color: white; text-align:center;" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($novoArr as $chave => $opcao) {
                        
                    $nivel = $opcao['NIVEL_OPCAO'];
                    $descr_nivel = $opcao['DESCR_NIVEL'];
                    $id = $chave;
                    $descr_opcao = $opcao['DESCR_OPCAO'];
                    $url = $opcao['URL_OPCAO'];
                    $status = $opcao['STATUS_OPCAO'];

                    if ($nivel == 1) {
                        $padding = "";
                    } else if ($nivel == 2) {
                        $padding = 'padding-left:50px';
                    } else if ($nivel == 3) {
                        $padding = 'padding-left:100px';
                    }
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td style="<?php echo $padding ?>"><?php echo $descr_opcao; ?></td>
                        <td style="<?php echo $padding ?>"><?php echo $descr_nivel; ?></td>
                        <td><?php echo $nivel; ?></td>
                        <td><?php echo $url; ?></td>
                        <td>
                            <div class="acoes" style="display: flex; justify-content: space-around;">
                                <div class="muda_status">
                                    <?php
                                    if ($status == "S") {
                                    ?>
                                        <div class="inativo" onclick="muda_status('N','<?php echo $id; ?>')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Ativo">
                                            <img src="https://png.pngtree.com/png-clipart/20221028/ourmid/pngtree-right-symbol-png-image_6400869.png" alt="Ativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="ativo" onclick="muda_status('S','<?php echo $id; ?>')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Inativo">
                                            <img src="https://png.pngtree.com/png-vector/20221215/ourmid/pngtree-wrong-icon-png-image_6525689.png" alt="Inativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="edit" onclick="editar('<?php echo $id; ?>')"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4226/4226577.png" alt="Editar" style="width: 20px; height: 20px;">
                                </div>
                                <div class="remover" onclick="remover('<?php echo $id; ?>')"
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
        <input type="hidden" id="idOpcao" name="idOpcao">
    </div>

    <?php
    $sqlGraficoOpcoes = "
    SELECT 
        statusOpcao,
        COUNT(*) as quantidade
    FROM opcoes_menu
    WHERE statusOpcao IN ('S', 'N')
    GROUP BY statusOpcao;
";

    $resultGraficoOpcoes = mysqli_query($conexao, $sqlGraficoOpcoes);
    $dadosGraficoOpcoes = ['S' => 0, 'N' => 0];

    while ($row = mysqli_fetch_assoc($resultGraficoOpcoes)) {
        $dadosGraficoOpcoes[$row['statusOpcao']] = $row['quantidade'];
    }
    $ativos = $dadosGraficoOpcoes['S'];
    $inativos = $dadosGraficoOpcoes['N'];
    ?>

    <div class="container mt-5">
        <h2 class="text-center" style="color: #054F77;">Gráfico de Opções Ativas e Inativas</h2>
        <div style="display: flex; justify-content: center;">
            <div style="height: 400px; width: 400px;">
                <canvas id="graficoOpcoes" width="200px" height="100px"></canvas>
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

            var ctx = document.getElementById('graficoOpcoes').getContext('2d');
            var graficoOpcoes = new Chart(ctx, {
                type: 'polarArea',
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

    <?php

    include_once('modal_opcoes.php');

    ?>

    <footer class="footer bg-light text-center py-1 mt-5" style="background-color: gray;">
        <div class="container">
            <div class="row align-items-center">
                <div class=" mt-3 col-6 text-left">
                    <img src="https://static.wixstatic.com/media/52bc07_3a4a9b542c644d9385b5366e7995eecf~mv2.png/v1/fill/w_500,h_292,al_c,lg_1,q_85,enc_avif,quality_auto/senac%20branco.png" alt="Logo Senac" style="width: 120px;">
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

</body>
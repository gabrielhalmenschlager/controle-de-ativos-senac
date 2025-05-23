<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$title = "Relatórios";

include_once('cabecalho.php');
include_once('menu_superior.php');

$marcas = busca_info_bd($conexao, 'marca', 'statusMarca', 'S');
$tipos = busca_info_bd($conexao, 'tipo', 'statusTipo', 'S');
$ativos = busca_info_bd($conexao, 'ativo', 'statusAtivo', 'S');
$marcas = busca_info_bd($conexao, 'marca');
$tipos = busca_info_bd($conexao, 'tipo');
$ativos = busca_info_bd($conexao, 'ativo');
$usuarios = busca_info_bd($conexao, 'usuario');
$movimentacoes = busca_info_bd($conexao, 'movimentacao');

?>

<script src="../js/relatorio.js"></script>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #054F77;">Informe os filtros que deseja gerar o relatório</h1>
        <form method="POST" action="resultado_relatorios.php" class="bg-light p-4 rounded shadow-sm">
            <form method="POST" action="relatorio.php" class="bg-light p-4 rounded shadow-sm">
                <div class="row mb-1">

                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="ativo" class="form-label" style="color: #054F77;">Ativo</label>
                                <select id="ativo" name="ativo" class="form-select shadow-sm border-light">
                                    <option value="">Todos Ativos</option>
                                    <?php
                                    foreach ($ativos as $ativo) {
                                        echo '<option value="' . $ativo['idAtivo'] . '">' . $ativo['descricaoAtivo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="marca" class="form-label" style="color: #054F77;">Marca</label>
                                <select id="marca" name="marca" class="form-select shadow-sm border-light">
                                    <option value="">Todas Marcas</option>
                                    <option value="todas">Todas Marcas</option>
                                    <?php
                                    foreach ($marcas as $marca) {
                                        echo '<option value="' . $marca['idMarca'] . '">' . $marca['descricaoMarca'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="tipo" class="form-label" style="color: #054F77;">Tipo</label>
                                <select id="tipo" name="tipo" class="form-select shadow-sm border-light">
                                    <option value="">Todos Tipos</option>
                                    <option value="todos">Todos Tipos</option>
                                    <?php
                                    foreach ($tipos as $tipo) {
                                        echo '<option value="' . $tipo['idTipo'] . '">' . $tipo['descricaoTipo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="data_inicial" class="form-label" style="color: #054F77;">Data Inicial</label>
                                <input type="date" id="data_inicial" name="data_inicial" class="form-control shadow-sm border-light">
                            </div>
                            <div class="col-md-6">
                                <label for="data_final" class="form-label" style="color: #054F77;">Data Final</label>
                                <input type="date" id="data_final" name="data_final" class="form-control shadow-sm border-light">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="usuario" class="form-label" style="color: #054F77;">Usuário responsável</label>
                                <select id="usuario" name="usuario" class="form-select shadow-sm border-light">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($usuarios as $usuario) {
                                        echo '<option value="' . $usuario['idUsuario'] . '">' . $usuario['nomeUsuario'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="tipo_movimentacao" class="form-label" style="color: #054F77;">Tipo de Movimentação</label>
                                <select id="tipo_movimentacao" name="tipo_movimentacao" class="form-select shadow-sm border-light">
                                    <option value="">Selecione</option>
                                    <option value="Adicionar">Adicionar</option>
                                    <option value="Realocar">Realocar</option>
                                    <option value="Remover">Remover</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" style="background-color: #FFA500; color: white;">Gerar Relatório</button>
                    <button type="reset" onclick="limpar_modal()" class="btn btn-primary" style="background-color: gray; color: white;">Limpar Filtros</button>
                </div>
            </form>
    </div>

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

    <style>
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
        }
    </style>

</body>
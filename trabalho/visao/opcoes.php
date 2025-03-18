<?php

include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title = "Opções";
include_once('cabecalho.php');

$opcoes = busca_info_bd($conexao, 'opcoes_menu');

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
                        <th style="background-color: #054F77; color: white;" scope="col">Nível</th>
                        <th style="background-color: #054F77; color: white;" scope="col">URL</th>
                        <th style="background-color: #054F77; color: white; text-align:center;" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($opcoes as $opcao) {
                    ?>
                        <tr>
                            <td><?php echo $opcao['idOpcao']; ?></td>
                            <td><?php echo $opcao['descricaoOpcao']; ?></td>
                            <td><?php echo $opcao['nivelOpcao']; ?></td>
                            <td><?php echo $opcao['urlOpcao']; ?></td>
                            <td>
                                <div class="acoes" style="display: flex; justify-content: space-around;">
                                    <div class="muda_status">
                                            <?php
                                            if ($opcao['statusOpcao'] == "S") {
                                            ?>
                                                <div class="inativo" onclick="muda_status('N','<?php echo $opcao['idOpcao']; ?>')"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Ativo">
                                                    <img src="https://png.pngtree.com/png-clipart/20221028/ourmid/pngtree-right-symbol-png-image_6400869.png" alt="Ativo" style="width: 20px; height: 20px;">
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="ativo" onclick="muda_status('S','<?php echo $opcao['idOpcao']; ?>')"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Inativo">
                                                    <img src="https://png.pngtree.com/png-vector/20221215/ourmid/pngtree-wrong-icon-png-image_6525689.png" alt="Inativo" style="width: 20px; height: 20px;">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <div class="edit" onclick="editar('<?php echo $opcao['idOpcao']; ?>')"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <img src="https://cdn-icons-png.flaticon.com/512/4226/4226577.png" alt="Editar" style="width: 20px; height: 20px;">
                                    </div>
                                    <div class="remover" onclick="remover('<?php echo $opcao['idOpcao']; ?>')"
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

include_once('modal_opcoes.php');

?>

</body>
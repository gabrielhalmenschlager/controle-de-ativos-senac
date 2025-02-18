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
        <div class="d-flex flex-column align-items-center">
            <button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Tipos</button>
        </div>

        <div class="container mt-5">
            <h1 class="mb-4 text-center" style="color: #003B5C;">Lista de Tipos</h1>

            <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
                <thead>
                    <tr>
                        <th style="background-color: #003B5C; color: white;" scope="col">Id</th>
                        <th style="background-color: #003B5C; color: white;" scope="col">Descrição</th>
                        <th style="background-color: #003B5C; color: white;" scope="col">Status</th>
                        <th style="background-color: #003B5C; color: white;" scope="col" style="text-align:center;">Ações</th>
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

        <footer class="footer bg-light text-center py-3 mt-5">
            <div class="container">
                <span style="color: #003B5C;">2024 Senac | Todos os direitos reservados</span>
            </div>
        </footer>
</body>
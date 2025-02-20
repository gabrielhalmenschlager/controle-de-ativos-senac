<?php
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title = "Marcas";
include_once('cabecalho.php');

$marcas = busca_info_bd($conexao, 'marca');

include_once('menu_superior.php');
?>

<script src="../js/marcas.js"></script>

<body>
    <div class="container mt-5">
        <div class="d-flex flex-column align-items-center">
            <button type="button" onclick="limpar_modal()" id="btn_modal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Marcas</button>
        </div>

        <div class="container mt-5">
            <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Marcas</h1>

            <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
                <thead>
                    <tr>
                        <th style="background-color: #054F77; color: white;" scope="col">Id</th>
                        <th style="background-color: #054F77; color: white;" scope="col">Descrição</th>
                        <th style="background-color: #054F77; color: white;" scope="col">Status</th>
                        <th style="background-color: #054F77; color: white; text-align:center;" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($marcas as $marca) {
                    ?>
                        <tr>
                            <td><?php echo $marca['idMarca']; ?></td>
                            <td><?php echo $marca['descricaoMarca']; ?></td>
                            <td><?php echo $marca['statusMarca']; ?></td>
                            <td>
                                <div class="acoes" style="display: flex; justify-content: space-around;">
                                    <div class="muda_status">
                                        <?php
                                        if ($marca['statusMarca'] == "S") {
                                        ?>
                                            <div class="inativo" onclick="muda_status('N','<?php echo $marca['idMarca']; ?>')"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Ativo">
                                                <img src="https://png.pngtree.com/png-clipart/20221028/ourmid/pngtree-right-symbol-png-image_6400869.png" alt="Ativo" style="width: 20px; height: 20px;">
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="ativo" onclick="muda_status('S','<?php echo $marca['idMarca']; ?>')"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Inativo">
                                                <img src="https://png.pngtree.com/png-vector/20221215/ourmid/pngtree-wrong-icon-png-image_6525689.png" alt="Inativo" style="width: 20px; height: 20px;">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="edit" onclick="editar('<?php echo $marca['idMarca']; ?>')"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <img src="https://cdn-icons-png.flaticon.com/512/4226/4226577.png" alt="Editar" style="width: 20px; height: 20px;">
                                    </div>
                                    <div class="remover" onclick="remover('<?php echo $marca['idMarca']; ?>')"
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
            <input type="hidden" id="idMarca" name="idMarca">
        <?php 
            include_once('modal_marca.php'); 
        ?>
    </div>

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span style="color: #054F77;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </footer>

</body>
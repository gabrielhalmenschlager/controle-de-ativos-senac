<?php

include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title = "Cargos";
include_once('cabecalho.php');

$cargos = busca_info_bd($conexao, 'cargos');

include_once('menu_superior.php');

?>

<script src="../js/cargos.js"></script>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <button type="button" id="btn_modal" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Cargos
            </button>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #054F77;">Lista de Cargos</h1>

        <table class="table table-striped table-bordered table-hover" id="tabela-personalizada">
            <thead>
                <tr>
                    <th style="background-color: #054F77; color: white;" scope="col">Id</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Descrição</th>
                    <th style="background-color: #054F77; color: white;" scope="col">Usuario</th>
                    <th style="background-color: #054F77; color: white; text-align:center;" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cargos as $cargo) {
                ?>
                    <tr>
                        <td><?php echo $cargo['idCargo']; ?></td>
                        <td><?php echo $cargo['descricaoCargo']; ?></td>
                        <td><?php echo $cargo['idUsuario']; ?></td>
                        <td>
                            <div class="acoes" style="display: flex; justify-content: space-around;">
                                <div class="muda_status">
                                    <?php
                                    if ($cargo['statusCargo'] == "S") {
                                    ?>
                                        <div class="inativo" onclick="muda_status('N','<?php echo $cargo['idCargo']; ?>')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Ativo">
                                            <img src="https://png.pngtree.com/png-clipart/20221028/ourmid/pngtree-right-symbol-png-image_6400869.png" alt="Ativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="ativo" onclick="muda_status('S','<?php echo $cargo['idCargo']; ?>')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Inativo">
                                            <img src="https://png.pngtree.com/png-vector/20221215/ourmid/pngtree-wrong-icon-png-image_6525689.png" alt="Inativo" style="width: 20px; height: 20px;">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="edit" onclick="editar('<?php echo $cargo['idCargo']; ?>')"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4226/4226577.png" alt="Editar" style="width: 20px; height: 20px;">
                                </div>
                                <div class="remover" onclick="remover('<?php echo $cargo['idCargo']; ?>')"
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
        <input type="hidden" id="idCargo" name="idCargo">
    </div>

    <?php

    include_once('modal_cargos.php');

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
<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$title = "Acessos";

include_once('cabecalho.php');
include_once('menu_superior.php');

$cargos = busca_info_bd($conexao, 'cargos');

$sql = "SELECT 
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
        WHERE 
            nivelOpcao = 1";

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

    foreach ($opcaoSub as $sub) {
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

        foreach ($opcaoOp as $opcao) {
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

<script src="../js/acessos.js"></script>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-4" style="color: #054F77;">Acessos Usuários</h1>
                <select class="form-select" onchange="busca_acesso()" name="cargo" id="cargo" required>
                    <option value="">Selecione</option>
                    <?php
                    foreach ($cargos as $cargo) {
                        echo "<option value='" . $cargo['idCargo'] . "'>" . $cargo['descricaoCargo'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <button type="button" id="salvarAcesso" class="btn btn-primary custom-btn salvarAcesso">
                    Salvar Acessos
                </button>
            </div>
        </div>

        <div class="row mt-5">
            <?php
            foreach ($novoArr as $idOpcao => $opcao) {
            ?>
                <div class="row">
                    <?php

                    $nivel = $opcao['NIVEL_OPCAO'];

                    if ($nivel == 1) {
                        $padding = "";
                    } else if ($nivel == 2) {
                        $padding = 'padding-left:50px';
                    } else if ($nivel == 3) {
                        $padding = 'padding-left:100px';
                    }
                    ?>
                    <div class="linha_opcao" style="<?php echo $padding; ?>">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0 check <?php echo $idOpcao; ?>" type="checkbox" value="<?php echo $idOpcao; ?>" aria-label="Checkbox for following text input">
                            </div>
                            <?php
                            echo $opcao['DESCR_OPCAO'];
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
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
        /* Input group for Checkboxes */
        .input-group {
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: flex;
            align-items: center;
            transition: box-shadow 0.3s ease;
        }

        .input-group:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .input-group-text {
            border: none;
            background-color: transparent;
        }

        .form-check-input {
            margin-top: 0;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
        }
    </style>

</body>
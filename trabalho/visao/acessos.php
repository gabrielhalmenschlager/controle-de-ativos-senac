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
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <label for="cargo" class="form-label">Cargo</label>
                <select class="form-select" name="cargo" id="cargo" required>
                    <option value="">Selecione</option>
                    <?php
                    foreach ($cargos as $cargo) {
                        echo "<option value='" . $cargo['idCargo'] . "'>" . $cargo['descricaoCargo'] . "</option>";
                    }
                    ?>
                </select>
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
                                <input class="form-check-input mt-0 check" type="checkbox" value="<?php echo $idOpcao;?>" aria-label="Checkbox for following text input">
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
            <div class="container mt-5">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary salvarAcesso">
                        Salvar Acesso
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
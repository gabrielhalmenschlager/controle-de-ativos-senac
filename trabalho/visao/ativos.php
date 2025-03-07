<?php

include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
$title = "Ativos";
include_once('cabecalho.php');
include_once('menu_superior.php');

?>

<script src="../js/ativos.js"></script>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cadastrar Ativos
        </button>
    </div>
</div>

<?php

include_once('listar_ativos.php');
include_once('modal_ativo.php');

?>
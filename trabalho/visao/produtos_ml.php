<?php

ini_set("display_errors", 1);
error_reporting(E_ERROR);
include_once("../controle/controle_session.php");
include_once("../modelo/conexao.php");
include_once("../controle/funcoes.php");
$title = "Busca Produtos Mercado Livre ";
include_once("menu_superior.php");
include_once("cabecalho.php");

$sql = "
    SELECT 
        quantidadeAtivo,
        quantidadeMinAtivo,
        descricaoAtivo,
        (select quantidadeUso from movimentacao m WHERE m.idAtivo = a.idAtivo and m.statusMov='S') as quantidade_uso,
        (select descricaoMarca from marca ma WHERE ma.idMarca = a.idMarca) as descr_marca
    FROM 
        ativo a
";

$result = mysqli_query($conexao, $sql) or die(false);
$ativos = $result->fetch_all(MYSQLI_ASSOC);
$resultado = "";

foreach ($ativos as $ativo) {
    $quantidade_disponivel = $ativo['quantidadeAtivo'] - $ativo['quantidade_uso'];

    if ($quantidade_disponivel < $ativo['quantidadeMinAtivo']) {
        $termo_busca = $ativo['descricaoAtivo'] . $ativo['descr_marca'];
        $resultado .= busca_prod_ml($termo_busca);
    }
}
?>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #003B5C;">Resultados da Pesquisa</h1>
        <div class="row justify-content-center g-4">
            <?php
                echo $resultado;
            ?>
        </div>
    </div>

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span>2024 Mercado Livre | Todos os direitos reservados</span>
        </div>
    </footer>
</body>
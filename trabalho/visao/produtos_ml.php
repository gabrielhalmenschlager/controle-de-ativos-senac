<?php

ini_set("display_errors", 1);
error_reporting(E_ERROR);
include_once("../controle/controle_session.php");
include_once("../modelo/conexao.php");
include_once("../modelo/funcoes.php");
$title = "Busca Produtos Mercado Livre ";
include_once("menu_superior.php");

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
        echo $termo_busca = $ativo['descricaoAtivo'] . $ativo['descr_marca'];
        $resultado .= busca_prod_ml($termo_busca);
    }
}

?>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #003B5C;">Resultados da Pesquisa</h1>
        <div class="row justify-content-center g-4">
            <?php
            ob_start();
            foreach ($data['results'] as $produto) {
                $image_url = $produto['thumbnail'];
            ?>
                <div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                    <div class='product-card'>
                        <div class='product-title'>
                            <h5>
                                <?php echo $produto['title'] ?>
                            </h5>
                        </div>
                        <div class='contorno_image'>
                            <?php echo "<img src='" . $image_url . "' alt='" . $produto['title'] . "' class='product-image'>"; ?>
                        </div>
                        <div class='product-info'>
                            <div class='product-price'>
                                <?php echo "R$" . number_format($produto['price'], 2, ',', '.'); ?>
                            </div>
                            <div class='button-container mt-3'>
                                <a href='<?php echo $produto['permalink']; ?>' target='_blank' class='btn btn-primary'>Ver Produto</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            $html = ob_get_contents()
            ?>
        </div>
    </div>

    <footer class="footer bg-light text-center py-3 mt-5">
        <div class="container">
            <span>2024 Mercado Livre | Todos os direitos reservados</span>
        </div>
    </footer>
</body>
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
        <h1 class="text-center mb-4" style="color: #054F77; font-size: 2rem;">Resultados da Pesquisa</h1>
        <div class="row justify-content-center g-4">
            <?php
                echo $resultado;
            ?>
        </div>
    </div>

    <footer class="footer bg-light text-center py-1 mt-5" style="background-color: gray;">
        <div class="container">
            <div class="row align-items-center">
                <div class=" mt-3 col-6 text-left">
                    <img src="https://cdljundiai.com.br/wp-content/uploads/2020/06/senac.png" alt="Logo Senac" style="width: 120px;">
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
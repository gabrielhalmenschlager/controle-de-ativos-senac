<?php
include_once('controle_session.php');
function busca_info_bd($conexao, $tabela, $coluna_where = false, $valor_where = false)
{
    $sql = "select * from " . $tabela;

    if ($coluna_where != false) {
        $sql .= " where  $coluna_where = '" . $valor_where . "' ";
    }

    $result = mysqli_query($conexao, $sql) or die(false);
    $dados = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $dados;

};

function busca_prod_ml($pesquisa){
    
    $pesq = urlencode($pesquisa);
    $url = "https://api.mercadolibre.com/sites/MLB/search?q=" . $pesq . "&condition=new&status=active&sort=best_seller&limit=20";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($output, true);

    $html = "";
    foreach ($data['results'] as $produto) {
        $image_url = $produto['thumbnail'];
        $html .= '

        <div class="col-md-3">
            <div class="product-card">
                <div class="product-title">
                    <h5>' . $produto['title'] . '</h5>
                </div>
                <div class="contorno_image">
                    <img src="' . $image_url . '" alt="' . $produto['title'] . '" class="product-image">
                </div>
                <div class="product-info">
                    <div class="product-price">
                        R$ '. number_format($produto['price'], 2, ',', '.'). '
                    </div>
                    <div class="button-container mt-3">
                        <a href="'. $produto['permalink'] .'" target="_blank" class="btn btn-primary btn-block">Ver Produto</a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    return $html;
}
<?php

// Criação de um array com itens de tecnologia
$array1 = array(
    "computador",
    "mouse",
    "teclado",
    "mousepad",
    "monitor",
    "mesa",
    "cadeira",
    "projetor",
    "hack",
    "tv"
);

// Criação de um array associativo com itens e suas respectivas chaves
$array2 = array(
    "UM" => "computador",
    "DOIS" => "mouse",
    "TRÊS" => "teclado",
    "QUATRO" => "mousepad",
    "CINCO" => "monitor",
    "SEIS" => "mesa",
    "SETE" => "cadeira",
    "OITO" => "projetor",
    "NOVE" => "hack",
    "DEZ" => "tv",
);

// Itera sobre o primeiro array e exibe suas chaves e valores
foreach ($array1 as $chave => $valor) {
    echo "A minha chave " . $chave . " tem o valor de " . $valor . "<br>";
}

echo "<p>";

// Itera sobre o segundo array associativo e exibe suas chaves e valores
foreach ($array2 as $chave => $valor) {
    echo "A minha chave " . $chave . " tem o valor de " . $valor . "<br>";
}

?>

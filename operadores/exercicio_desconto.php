<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio de Desconto</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    text-align: left;
}

h1 {
    color: #0056b3;
    margin-bottom: 20px;
    font-size: 2em;
}

.resultado {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 10px;
    width: 320px;
    max-width: 90%;
}

.resultado h2 {
    margin: 0;
    font-size: 1.5em;
    color: #0056b3;
    border-bottom: 2px solid #007BFF;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.resultado p {
    margin: 10px 0;
    font-size: 1.1em;
    color: #555;
}
    </style>

</head>
<body>

<h1>Exercicio de Desconto</h1>

<div class="resultado">

<?php

// Variável do Valor da Compra
$valorCompra = 150;
// Variável do Percentual de Desconto
$percentualDesconto = 10;

// Usando If e Else
    if ($valorCompra <= 100) {
        $percentualDesconto = 5;

    }else if ($valorCompra <= 200) {
        $percentualDesconto = 10;

    }else if ($valorCompra > 200) {
        $percentualDesconto = 15;
    }

// Variável do Valor do Desconto
$valorDesconto = ($valorCompra * $percentualDesconto) / 100;
// Variável do Preço Final
$precoFinal = ($valorCompra - $valorDesconto);

echo "<h2>Usando If e Else:<h2>";
echo "<br>";

// Valor da Compra
echo "Valor da Compra: " . $valorCompra . "R$";
echo "<br>";

// Valor do Percentual de Desconto
echo "Valor do Percentual de Desconto: " . $percentualDesconto . "%";
echo "<br>";

// Valor do Desconto
echo "Valor do Desconto: " . $valorDesconto . "R$";
echo "<br>";

// Valor do Preço Final
echo "Valor do Preço Final: " . $precoFinal . "R$";

// Usando Switch e Case
switch (true) {
    case ($valorCompra <= 100):
        $percentualDesconto = 5;
        break;
    case ($valorCompra <= 200):
        $percentualDesconto = 10;
        break;
    case ($valorCompra > 200):
        $percentualDesconto = 15;
        break;
}

echo "<h2>Usando Switch e Case:<h2>";
echo "<br>";

// Valor da Compra
echo "Valor da Compra: " . $valorCompra . "R$";
echo "<br>";

// Valor do Percentual de Desconto
echo "Valor do Percentual de Desconto: " . $percentualDesconto . "%";
echo "<br>";

// Valor do Desconto
echo "Valor do Desconto: " . $valorDesconto . "R$";
echo "<br>";

// Valor do Preço Final
echo "Valor do Preço Final: " . $precoFinal . "R$";

?>

</div>

</body>
</html>


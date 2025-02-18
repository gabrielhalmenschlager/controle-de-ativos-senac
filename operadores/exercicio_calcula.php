<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio Calcula</title>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #555;
            margin: 10px 0;
            text-align: center;
        }

        .resultado {
            background-color: #e7f3fe;
            border: 1px solid #b8daff;
            border-radius: 5px;
            padding: 10px;
            margin: 20px auto;
            width: 50%;
            text-align: center;
        }
</style>

</head>
<body>
    
<h1>Exercicio Calcula</h1>
<h2>Número 1 = 5</h2>
<h2>Número 2 = 10</h2>

<?php

$num1 = 5;
$num2 = 10;
$operacao = "multiplicacao";

if ($operacao == "soma") {
    $soma = $num1 + $num2;
    echo "<div class='resultado'><h2>Resultado da soma: $soma</h2></div>";

} else if ($operacao == "subtracao") {
    $subtracao = $num1 - $num2;
    echo "<div class='resultado'><h2>Resultado da subtração: $subtracao</h2></div>";

} else if ($operacao == "multiplicacao") {
    $multiplicacao = $num1 * $num2;
    echo "<div class='resultado'><h2>Resultado da multiplicação: $multiplicacao</h2></div>";
    
} else {
    $divisao = $num1 / $num2;
    echo "<div class='resultado'><h2>Resultado da divisão: $divisao</h2></div>";
}

?>

</body>
</html>

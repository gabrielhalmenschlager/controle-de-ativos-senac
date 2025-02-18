<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Telefone</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: auto;
            padding: 20px;
        }

        h1 {
            color: royalblue;
            text-align: center;
        }
        h2 {
            font-size: 18px;
            margin-bottom: 20px;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 10px;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
            margin: auto;
        }
    </style>

</head>

<body>

    <h1>Exercício Telefone</h1>
    <h2>Desenvolver um algoritmo que:
        * Crie uma string com um número de telefone "(11) 11111-1111";
        * Remova os caracteres especiais "()" e "_";
        * Exiba a frase original e a string resultante.
        * Exiba o tamanho da string original e a string resultante</h2>

</body>

</html>

<?php

$telefoneOriginal = "(11) 11111-1111";
$telefoneLimpo = str_replace(array('(', ')', '-'), '', $telefoneOriginal);

echo "<div class='resultado'>";
echo "Telefone Original: " . $telefoneOriginal . "<br>";
echo "Telefone Limpo: " . $telefoneLimpo . "<br>";
echo "</div>";

$tamanhoOriginal = strlen($telefoneOriginal);
$tamanhoLimpo = strlen($telefoneLimpo);

echo "<div class='resultado'>";
echo "O tamanho do telefone original é: " . $tamanhoOriginal . "<br>";
echo "O tamanho do telefone limpo é: " . $tamanhoLimpo . "<br>";
echo "</div>";

?>
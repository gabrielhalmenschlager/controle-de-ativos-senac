<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If e Switch</title>
    <style>
        body {
            background-color: #0077cc; /* Azul forte */
            color: #ffffff; /* Texto branco */
            font-family: 'Arial', sans-serif; /* Fonte padrão */
            padding: 20px;
            text-align: center; /* Centralizar texto */
        }
        h1 {
            font-size: 2.5em; /* Tamanho maior para o título */
            margin-bottom: 20px;
            text-transform: uppercase; /* Texto em maiúsculas */
        }
        p {
            font-size: 1.2em; /* Tamanho da fonte para os parágrafos */
            margin: 10px 0; /* Espaçamento entre os parágrafos */
        }
    </style>
</head>
<body>

<h1>If e Switch</h1>

<?php

// Valores
$valor1 = 4;
$valor2 = 5;

// Usando o if
if ($valor1 === $valor2) {
    echo "<p>Os valores são IGUAIS</p>";
} else {
    echo "<p>Os valores são DIFERENTES</p>";
}

// Usando o Switch
switch ($valor1 || $valor2) {
    case ($valor1 === $valor2):
        echo "<p>Os valores são IGUAIS</p>";

        break;
    case ($valor1 != $valor2):
        echo "<p>Os valores são DIFERENTES</p>";

        break;
    default:
        echo "<p>Os valores são INVALIDOS</p>";
        break;
}

?>

</body>
</html>

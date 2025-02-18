<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Número</title>

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
            font-size: larger;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
            margin: auto;
            font-size: large;
        }
    </style>

</head>
<body>
    
<h1>Exercício Número</h1>

</body>
</html>

<?php

$numero = 148320.816;

$numero_formatado = number_format($numero, 2, ',', '.');
$numero_inteiro = (int)$numero;
$numero_floor = floor($numero);
$numero_ceil = ceil($numero);


echo "<div class='resultado'>";

echo "Número: " . $numero . "<br>";
echo "Número formatado: " . $numero_formatado . "<br>";
echo "Número inteiro: " . $numero_inteiro . "<br>";
echo "Número arredondado para baixo: " . $numero_floor . "<br>";
echo "Número arredondado para cima: " . $numero_ceil . "<br>";

echo "</div>";

?>
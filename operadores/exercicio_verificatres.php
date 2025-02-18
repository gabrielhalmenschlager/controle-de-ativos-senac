<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio Verifica Três</title>

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

<h1>Exercicio Verifica Três</h1>
<h2>Número 1 = 4</h2>
<h2>Número 2 = 6</h2>
<h2>Número 3 = 4</h2>

</body>
</html>

<?php

$num1 = 5;
$num2 = 6;
$num3 = 5;

if ($num1 == $num2 || $num1 == $num3 || $num2 == $num3) {
    echo "<div class='resultado'><h2> Dois números são iguais. </h2></div>";

} else {
    echo "<div class='resultado'><h2> Todos os números são diferentes. </h2></div>";

}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício</title>

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

<h1>Exercício</h1>
    
</body>
</html>

<?php

$frase = " Aprendendo PHP é divertido! ";

$tres_primeiras = substr($frase, 0, 4);
$tres_ultimas = substr($frase, -3);
$trecho = substr($frase, 3, 12);

echo "<div class='resultado'>"; 

echo "Frase normal: " . $frase . "<br>";
echo "Os primeiros 3 caracteres: " . $tres_primeiras . "<br>";
echo "Os últimos 3 caracteres: " . $tres_ultimas . "<br>";
echo "Trecho: " . $trecho . "<br>";

echo "</div>";

?>
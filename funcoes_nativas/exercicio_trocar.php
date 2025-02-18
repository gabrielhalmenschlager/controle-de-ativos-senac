<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Trocar</title>

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
<h2>Exercício
Desenvolver um algoritmo que:
<br>* Crie uma frase "Olá, meu nome é :";
<br>* Dentro da frase troque a palavra "Olá" por "Oi";
<br>* Dentro da frase troque a palavra "meu" por "seu";
<br>* Exiba a frase original e a frase resultante.</h2>

</body>
</html>

<?php

$fraseOriginal = "Olá, meu nome é Gabriel";

$fraseModificada = str_replace("Olá" ,"Oi", $fraseOriginal);
$fraseModificada = str_replace("meu" ,"seu", $fraseModificada);

echo "<div class='resultado'>";

echo "A frase original é: " . $fraseOriginal . "<br>";
echo "A frase modificada é: " . $fraseModificada . "<br>";

echo "</div>";

?>
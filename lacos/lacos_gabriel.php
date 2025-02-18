<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laço de Impar e Par</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        h2 {
            font-size: 18px;
            margin-bottom: 20px;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #7f8c8d;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
        }
        .par {
            color: blue;
        }
        .impar {
            color: #e74c3c;
        }
    </style>
    
</head>
<body>

<h1>Exercício</h1>
<h2>Desenvolver um algoritmo onde:
<br>* Definir numero número para inicio do laço;
<br>* Definir numero número para fim do laço;
<br>* Verificar quantos números pares tem no intervalo informado;
* Somar os números impares do intervalo</h2>

<?php

$inicio = 1;
$fim = 20;

$quantidadePares = 0;
$somaImpares = 0;

    echo "USANDO FOR:<br><br>";

    for ($i = $inicio; $i <= $fim; $i++) {
    if ( $i % 2 == 0) {
        echo "<span class='par'>Par: " . $i . "</span><br>";
        $quantidadePares ++;

    } else {
        echo "<span class='impar'>Impar: " . $i . "</span><br>";
        $somaImpares += $i;
    }
    }

    echo "<div class='resultado'>";
    echo "Quantidade de números pares no intervalo: " . $quantidadePares . "<br>";
    echo "Soma dos números impares no intervalo: " . $somaImpares . "<p>";
    echo "</div>";

$inicio = 1;
$fim = 20;

$quantidadePares = 0;
$somaImpares = 0;
    
echo "USANDO WHILE:<br><br>";

    $i = $inicio;
while ($i <= $fim) {
    if ($i % 2 == 0) {
        echo "<span class='par'>Par: " . $i . "</span><br>";
        $quantidadePares++;
    } else {
        echo "<span class='impar'>Impar: " . $i . "</span><br>";
        $somaImpares += $i;
    }
    $i++;
}

    echo "<div class='resultado'>";
    echo "Quantidade de números pares no intervalo: " . $quantidadePares . "<br>";
    echo "Soma dos números impares no intervalo: " . $somaImpares . "<br>";
    echo "</div>";

?>

</body>
</html>



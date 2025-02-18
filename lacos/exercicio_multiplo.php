<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>?Multiplo de 3 e 5</title>

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
    </style>

</head>
<body>

<h1>Exercício</h1>
<h2>Desenvolver um algoritmo onde o número for múltiplo de 3 exiba a mensagem 
    "múltiplo de 3" e quando for múltiplo de 5 exiba a mensagem "múltiplo de 5" .</h2>

<?php

$inicio = 20;
$fim = 280;

echo "<div class='resultado'>";

    for ($i = $inicio; $i <= $fim; $i++) {
        
    if ( $i % 3 == 0 && $i % 5 == 0) {
        echo "Multiplo 3 e 5: " . $i . "<br>";

    } else if ( $i % 3 == 0) {
        echo "Multiplo 3: " . $i . "<br>";

    } else if ( $i % 5 == 0) {
        echo "Multiplo 5: " . $i . "<br>";
    }
    }

echo "</div>";

?>

</body>
</html>

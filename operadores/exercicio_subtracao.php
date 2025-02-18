<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtração</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #666;
            text-align: center;
        }
        p {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        body {
            padding: 20px;
        }
    </style>

</head>
<body>

<h1>Exercício 1 </h1>
<h2>Subtração: </h2>
    
<?php 

    $numero1 = 8;
    $numero2 = 4;
    $numero3 = 6;
    $numeros = $numero1. ', ' .$numero2. ' e ' .$numero3.':';

    $soma = $numero1 + $numero2;

    $subtracao = $soma - $numero3;

    echo "O primeiro número é: ". $numero1;
    echo "<br>O segundo número é: ". $numero2;
    echo "<br>O terceiro número é: ". $numero3;

    echo "<p>Todos os números são: ". $numeros;

    echo "<p>A soma dos dois primeiros números é: ". $soma;
    echo "<br>";
    echo "<p>A soma subtraçao pelo terceiro número foi de: ". $subtracao;

    if ($subtracao % 2 == 0) {
        echo "<p>O número $subtracao é par.";
    } else {
        echo "<p>O número $subtracao é ímpar.";
    }

?>

</body>
</html>

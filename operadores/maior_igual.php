<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maior ou Igual</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

    </style>

</head>
<body>

<h1>Maior ou Igual</h1>

<?php

$valor1 = 10;
$valor2 = 7;

if ($valor1 === $valor2) {
    echo "Os valores são $valor1, $valor2 e são IDENTICAS";

}else if ($valor1 == $valor2){
    echo "Os valores são $valor1, $valor2 e são IGUAIS";

}else if ($valor1 > $valor2) {
    echo "O valor 1 é $valor1 que é MAIOR que o valor 2 que é $valor2.";

}else{
    echo "O valor 2 é $valor2 que é MAIOR que o valor 1 que e $valor1.";

}

?>

</body>
</html>

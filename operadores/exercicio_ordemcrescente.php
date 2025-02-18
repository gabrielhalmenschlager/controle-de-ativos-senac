<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem CRESCENTE ou DECRESCENTE</title>

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

<h1>Ordem Crescente ou Decrescente</h1>

</body>
</html>

<?php

$num1 = 1;
$num2 = 3;
$num3 = 2;

if ($num1 < $num2 && $num2 < $num3) {
    echo "Os numeros $num1, $num2 e $num3 estão em ordem CRESCENTE.";

}else if ($num1 > $num2 && $num2 > $num3) {
    echo "Os numeros $num1, $num2 e $num3 estão em ordem DECRESCENTE.";

} else {
    echo "Os numeros $num1, $num2 e $num3 não estão em ORDEM.";
}
?>

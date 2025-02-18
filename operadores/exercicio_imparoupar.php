<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impar ou Par</title>

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

<h1>Impar ou Par</h1>

<?php

$numero1 = 12;
$numero2 = 10;

$resultado = $numero1 + $numero2;


if ($resultado % 2 == 0) {
    echo "<p>O resultado é $resultado e ele é um número PAR.";

} else {
    echo "<p>O resultado é $resultado e ele é um número IMPAR.";

}

?>
    
</body>
</html>

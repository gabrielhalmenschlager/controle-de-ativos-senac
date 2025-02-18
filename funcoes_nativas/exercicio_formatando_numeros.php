<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatando Números</title>
    
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
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
            margin: auto;
        }    
    </style>

</head>
<body>
    
<h1>Exercício Formatando Números</h1>

<?php

$num = 1234567.89;
$porcentagem =  27.7;
$resultado = ($num * $porcentagem) / 100;

echo "<div class='resultado'>";
echo "A porcentagem de: " . $porcentagem . "% de " . $num . " é: " . number_format($resultado,2);
echo "</div>";

?>

</body>
</html>


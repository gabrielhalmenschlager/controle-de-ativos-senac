<!DOCTYPE html>
<html lang="en">
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

<h1>Formatando Números</h1>

</body>
</html>

<?php

$num = 4.5;
$roun = round($num);
$cima = ceil($num);
$baixo = floor($num);

echo "<div class='resultado'>";
echo $roun . "<br>";
echo $cima . "<br>";
echo $baixo . "<br>";
echo "</div>";

$num2 = 1000;

$formata = number_format($num2,2,".",".");

echo "<div class='resultado'>";
echo $formata ."<br>";
echo "</div>";

?>
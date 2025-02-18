<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fahrenheit e Celsius</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .resultado {
            border: 1px solid #2980b9;
            padding: 15px;
            border-radius: 8px;
            background-color: #ecf0f1;
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
        }
    </style>

</head>
<body>

<h1>Conversão de Temperatura</h1>

<div class="resultado">
    
<?php
$temperaturaF = 68;
$temperaturaC = ($temperaturaF - 32) / 1.8;

// Exibição da temperatura
echo "Temperatura em Fahrenheit: $temperaturaF °F<br>";
echo "Temperatura em Celsius: $temperaturaC °C<br>";

// Verificação da temperatura
if ($temperaturaC < 10) {
    echo "<p>A temperatura está FRIO</p>";

} else if ($temperaturaC >= 10 && $temperaturaC <= 25) {
    echo "<p>A temperatura está AMENA</p>";

} else {
    echo "<p>A temperatura está QUENTE</p>";
}

?>
</div>

</body>
</html>

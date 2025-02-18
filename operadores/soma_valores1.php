<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma Valores 1</title>

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

        .resultado {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 24px;
            font-weight: bold;
        }
    </style>

</head>
<body>

<h1>Soma de Valores:</h1>

<div class="resultado">

    <?php

    $numero1 = 10;
    $numero2 = 7;

    $soma = $numero1 + $numero2;

    echo "A soma é: " . $soma;
    
    ?>

</div>

</body>
</html>

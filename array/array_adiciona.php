<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Array Adiciona</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #343a40;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: left;
            color: #007bff;
            margin-bottom: 10px;
        }
        .resultado1 {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px 0;
            text-align: left;
            color: #003366;
        }

    </style>

</head>

<body>

    <h1>Exercício Array Adiciona</h1>

</body>

</html>

<?php 

// Inicia um bloco de saída HTML
echo "<div class='resultado1'>";

// Cria um array com frutas
$frutas = array("tomate", "banana", "laranja");

// Exibe uma quebra de linha
echo "<br>";

// Adiciona mais frutas ao array
array_push($frutas, "uva", "bergamota");

// Exibe o array formatado
echo "<pre>";
print_r($frutas);
echo "</pre>";

// Fecha o bloco de saída HTML
echo "</div>";

?>

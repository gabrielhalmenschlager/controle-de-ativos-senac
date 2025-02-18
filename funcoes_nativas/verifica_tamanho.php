<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica Tamanho</title>

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
    
<h1>Verifica Tamanho</h1>

</body>
</html>

<?php
echo "<div class='resultado'>";

$texto = "Meu nome é Gabriel";
$verifica_tamanho_string = strlen($texto);

$meu_array = array("Gabriel","Halmenschlager");

$verifica_tamanho_string = count($meu_array);
echo $verifica_tamanho_string . "<br>";
var_dump($meu_array);

echo "</div>";
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troca de Caracter</title>

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

<h1>Troca de Caracter</h1>
    
<?php

$frase = "Ola! Meu nome é Gabriel! Sou lindo!";
$troca_caracter = str_replace("!","?", $frase);
$troca_caracter = str_replace("A","@", $troca_caracter);

echo "<div class='resultado'>";
echo $frase . "<br>";
echo $troca_caracter . "<br>";
echo "</div>";

?>

</body>
</html>


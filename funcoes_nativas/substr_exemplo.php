<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo usando SUBSRT</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(226, 223, 223);
        color: royalblue;
        text-align: left;
        padding: 50px;
    }

    h1 {
        color: royalblue; 
        margin-bottom: 20px;
    }
    .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
    }
    </style>

    
</head>
<body>
    
<h1>Exemplo usando SUBSRT</h1>

<?php

$nome = "Gabriel";

$tres_primeiras = substr($nome, 0, 3);
$tres_ultimas = substr($nome, -3);
$tres_meio = substr($nome, 1, 3);
$segunda_letra = substr($nome, 1, 3);
$quinta_letra = substr($nome, 5, -1);

echo "<div class='resultado'>"; 

echo "Meu nome é: " . $nome . "<p>";
echo "Os primeiros 3 caracteres: " . $tres_primeiras . "<p>";
echo "Os últimos 3 caracteres: " . $tres_ultimas . "<p>";
echo "Parte do meio: " . $tres_meio . "<p>";
echo "A partir da segunda letra exiba mais duas letras: " . $segunda_letra . "<p>";
echo "A partir da quinta letra menos a ultima: " . $quinta_letra . "<p>";


echo "</div>";

?>

</body>
</html>


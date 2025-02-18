<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Tabuada</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
            font-size: 18px;
        }
        br {
            margin-bottom: 10px;
        }
    </style>

</head>
<body>

<h1>Exercício Tabuada</h1>
<h2>Fazendo a tabuada até o 20 usando os valores de 5 e 10</h2>

<?php

// Inicializa a variável $i com 1
$i = 1;
// Define o número que será multiplicado no loop FOR
$numero_for = 5;

// Exibe um título para a seção usando FOR
echo "<p>Usando FOR<br>";

// Loop FOR que vai de 1 até 20
for ($i = 1; $i <= 20; $i++) {
    // Calcula o resultado da multiplicação
    $resultado_for = $numero_for * $i;
    // Exibe o resultado da multiplicação
    echo $numero_for . " x " . $i . " é igual a: " . $resultado_for . "<br>";

    // Verifica se o número tem raiz quadrada exata
    $raiz_for = sqrt(num: $resultado_for);
    if ($raiz_for == floor(num: $raiz_for)) {
        echo "A raiz quadrada de " . $resultado_for. " é " . $raiz_for . "<br>";
    }        
}

// Define o número que será multiplicado no loop WHILE
$numero_while = 10; 
// Inicializa a variável $y com 1
$y = 1;

// Exibe um título para a seção usando WHILE
echo "<p>Usando WHILE<br>";

// Loop WHILE que vai de 1 até 20
while ($y <= 20) {
    // Calcula o resultado da multiplicação
    $resultado_while = $numero_while * $y;
    // Exibe o resultado da multiplicação
    echo $numero_while . " x " . $y . " é igual a: " . $resultado_while . "<br>";    
    // Incrementa $y em 1 a cada iteração
    $y++;

        // Verifica se o número tem raiz quadrada exata
        $raiz_while = sqrt(num: $resultado_while);
        if ($raiz_while == floor(num: $raiz_while)) {
            echo "A raiz quadrada de " . $resultado_while . " é " . $raiz_while . "<br>";
        }
}

?>

</body>
</html>


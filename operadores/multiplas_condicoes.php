<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplas Condições</title>

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

<h1>Multiplas Condições</h1>

<div class="resultado">

<?php

$var1 = 10;
$var2 = 20;
$var3 = 30;
$var4 = 30;

// Condição de negação (!=)
if ($var1 != $var2) {
    echo "<p>Essa condição verifica se as condições são diferentes";
    echo "<br>";
    echo "A variável um que é: " . $var1 . " é diferente da variável dois que é: " . $var2;

} else if ($var3 != $var4) {
    echo "<p>Essa condição verifica se as condições são diferentes";
    echo "<br>";
    echo "A variável três que é: " . $var3 . " é diferente da variável quatro que é: " . $var4;
}

// Condição de igualdade (===)
if ($var1 === $var2) {
    echo "<p>Essa condição verifica se as condições são iguais";
    echo "<br>";
    echo "A variável um que é: " . $var1 . " é igual a variável dois que é: " . $var2;

} else if ($var3 === $var4) {
    echo "<p>Essa condição verifica se as condições são iguais";
    echo "<br>";
    echo "A variável três que é: " . $var3 . " é igual a variável quatro que é: " . $var4;
}

// Condição dupla ultilizando (AND - &&)
if ($var1 != $var2 && $var3 != $var4) {
    echo "<p>Essa condição dupla verifica se as condições são diferentes";
    echo "<br>";
    echo "A variável um que é:" . $var1 . " é diferente da variável dois que é: ". $var2 . " ou a variável três que é: " . $var3 . "é diferente da variável quatro que é:" . $var4;

} else if ($var1 != $var3 && $var2 != $var4) {
    echo "<p>Essa condição dupla verifica se as condições são diferentes";
    echo "<br>";
    echo "A variável um que é:" . $var1 . " é diferente da variável três que é: ". $var3 . " ou a variável dois que é: " . $var2 . "é diferente da variável quatro que é:" . $var4;
}

// Condição dupla ultilizando (OR - ||)
if ($var1 === $var2 || $var3 === $var4) {
    echo "<p>Essa condição dupla verifica se as condições são iguais";
    echo "<br>";
    echo "A variável um que é:" . $var1 . " é igual da variável dois que é: ". $var2 . " ou a variável três que é: " . $var3 . "é igual a variável quatro que é:" . $var4;
}

?>

</div>

</body>
</html>


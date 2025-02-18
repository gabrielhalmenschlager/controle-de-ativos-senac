<?php

// Criação de um array com números
$array = [3, 12, 5, 20, 8, 15];

// Definição de várias variáveis
$var1 = 20;
$var2 = 5;
$var3 = 2;
$var4 = 4;

// Agrupa as variáveis em um novo array
$variavel = [$var1, $var2, $var3, $var4];

// Itera sobre cada valor no array de variáveis
foreach ($variavel as $var) {
    // Verifica se o valor é maior ou igual a 10
    if ($var >= 10) {
        array_push($array, $var); // Adiciona ao array se maior que 10
        echo "O valor " . $var . " é maior que DEZ<br>";
    } else {
        array_pop($array); // Remove o último elemento se menor que 10
        echo "O valor " . $var . " é menor que DEZ<br>";
    }
}

// Exibe o array resultante em formato legível
echo "<pre>";
print_r($array); // Mostra o array modificado
echo "</pre>";

?> 

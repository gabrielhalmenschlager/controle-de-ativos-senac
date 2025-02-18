<?php

// Criação de um array com números de 1 a 10
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Inicializa arrays para números pares e ímpares
$par = [0]; // Começa com 0 para os pares
$impar = [1]; // Começa com 1 para os ímpares

// Itera sobre o array de números
foreach ($array as $value) {
    // Verifica se o número é par
    if ($value % 2 === 0) {
        array_push($par, $value); // Adiciona aos pares
    } else {
        array_unshift($impar, $value); // Adiciona aos ímpares
    }
}

// Exibe os arrays de pares e ímpares em formato legível
echo "<pre>";
print_r($par); // Mostra os números pares
echo "<br>";
print_r($impar); // Mostra os números ímpares
echo "<pre>";

// Exibe os números pares em formato de lista
foreach ($par as $value) {
    echo "" . $value . ", ";
}

// Exibe os números ímpares em formato de lista
foreach ($impar as $value) {
    echo "" . $value . ", ";
}

?>

<?php

// Criação de um array com alguns números
$array = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

// Usa array_slice para extrair 3 elementos a partir do índice 4
$subArray = array_slice($array, 4, 3);

// Exibe o array original e o array resultante
echo "<pre>";
print_r($array);
print_r($subArray);
echo "</pre>";

?>

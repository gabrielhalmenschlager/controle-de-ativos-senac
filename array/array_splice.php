<?php

// Criação de um array com alguns números
$array = [10, 20, 30, 40, 50, 60];

// Usa array_splice para remover 2 elementos a partir do índice 2 e adicionar novos valores
$removidos = array_splice($array, 2, 2, [99, 100]);

// Exibe o array original modificado e os elementos removidos
echo "<pre>";
print_r($array);
print_r($removidos);
echo "</pre>";

?>

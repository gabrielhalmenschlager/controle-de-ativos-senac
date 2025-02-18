<?php

// Criação de um array com números e strings
$array = array(0, 1, 2, 3, 4, "Gabriel", 5, 6, 7, 8, "Halmenschlager", 9, 10);

// Usa array_slice para extrair 4 elementos a partir do índice 6
$resultadoNome = array_slice($array, offset: 6, length: 4);

// Usa array_splice para substituir o elemento no índice 10 por "Nome do Meio"
$resultadoTroca = array_splice($array, 10, 1, "Nome do Meio");

// Exibe os resultados em formato legível
echo "<pre>";
print_r($resultadoNome); // Mostra os elementos extraídos
print_r($array); // Mostra o array modificado
echo "</pre>";

?>

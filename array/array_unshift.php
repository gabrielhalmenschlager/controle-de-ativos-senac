<?php 

// Criação de um array com cores
$array = array("roxo", "vermelho", "rosa", "verde");

// Adiciona "1" e 2 ao início do array
array_unshift($array, "1", 2);

// Exibe o array resultante em formato legível
echo "<pre>";
print_r($array); // Mostra o array modificado
echo "</pre>";

?> 

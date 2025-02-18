<?php 

// Criação de um array com 5 tipos de peças de roupas e calçados
$arrayRoupas = array("camisa", "calca", "jaqueta", "tenis", "sapato");

// Adiciona 2 itens no fim do array
$arrayAdiciona = $arrayRoupas;
array_push($arrayAdiciona,"bermuda", "meia");

// Remove o primeiro item do array
array_shift($arrayAdiciona);

// Adiciona 1 tipo de calçado no início do array
array_unshift($arrayAdiciona, "chinelo");

// Remove o último item do array
array_pop($arrayAdiciona);

// Exibe o array original e o array resultante
echo "<pre>";
echo "Array Original: <br>";
print_r($arrayRoupas); // Exibindo o array original
echo "Array Resultante: <br>";
print_r($arrayAdiciona); // Exibindo o array resultante
echo "</pre>";

?>
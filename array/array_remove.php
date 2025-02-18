<?php 

// Criação de um array com cores
$qualquer_coisa = array("roxo", "vermelho");

// Remove o último elemento do array
array_pop($qualquer_coisa);

// Adiciona "azul" e "amarelo" ao final do array
array_push($qualquer_coisa, "azul", "amarelo");

// Exibe o array resultante em formato legível
echo "<pre>";
print_r($qualquer_coisa); // Mostra o array modificado
echo "</pre>";

?> 

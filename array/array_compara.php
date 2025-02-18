<?php 

// Criação de um array base com números
$arrayBase = array(1, 2, 3, 4);

// Criação de um array para comparação
$arrayCompara = array(1, 2, 6, 7);

// Usa array_diff para encontrar elementos em $arrayBase que não estão em $arrayCompara
$resultado = array_diff($arrayBase, $arrayCompara);

// Usa array_intersect para encontrar elementos comuns entre $arrayBase e $arrayCompara
$igual = array_intersect($arrayBase, $arrayCompara);

// Exibe os resultados em formato legível
echo "<pre>";
print_r($resultado); // Mostra os elementos únicos do array base
print_r($igual); // Mostra os elementos comuns entre os dois arrays
echo "</pre>";

?>

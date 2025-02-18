<?php 

// Criação de um array com números, incluindo duplicados
$array = array(1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5);

// Usa array_unique para remover os valores duplicados do array
$remove_duplicados = array_unique($array);

// Exibe o array sem duplicados em formato legível
echo "<pre>";
print_r($remove_duplicados); // Mostra os valores únicos do array
echo "</pre>";

?>

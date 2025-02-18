<?php

// Criação de dois arrays
$array1 = [1, 2, 3, 4, 5];
$array2 = [4, 5, 6, 7, 8];

// Usa array_diff para encontrar os elementos que estão em $array1 mas não em $array2
$diferenca = array_diff($array1, $array2);

// Exibe o array original e a diferença
echo "Array 1:<br>";
print_r($array1);

echo "<br><br>Array 2:<br>";
print_r($array2);

echo "<br><br>Elementos em Array 1 que não estão em Array 2:<br>";
print_r($diferenca);

?>

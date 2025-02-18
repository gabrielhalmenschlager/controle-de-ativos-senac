<?php

// Criação de dois arrays
$array1 = ["maçã", "banana", "laranja", "uva"];
$array2 = ["banana", "kiwi", "laranja", "manga"];

// Usa array_intersect para encontrar os elementos comuns entre os dois arrays
$resultado = array_intersect($array1, $array2);

// Exibe os arrays originais e os elementos comuns
echo "Array 1:<br>";
print_r($array1);

echo "<br><br>Array 2:<br>";
print_r($array2);

echo "<br><br>Elementos Comuns:<br>";
print_r($resultado);

?>

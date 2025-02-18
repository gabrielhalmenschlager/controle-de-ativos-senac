<?php

// Criar um array de 0 a 100
$array = [];
for ($i = 0; $i <= 100; $i++) {
    array_push($array, $i);
}

echo "<pre>";
print_r($array);
echo "</pre>";

// Dividir o array em 5 partes
$partes = array_chunk($array,5);

echo "<pre>";
print_r($partes);
echo "</pre>";
?>

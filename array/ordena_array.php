<?php 

// Define um array associativo de números de 0 a 12
$array = [
    "0"=> 0,
    "1"=> 12,
    "2"=> 2,
    "3"=> 3,
    "4"=> 4,
    "5"=> 5,
    "6"=> 6,
    "7"=> 7,
    "8"=> 8,
    "9"=> 9,
    "10"=> 10,
    "11"=> 11,
    "12"=> 1,
];

// Ordena o array em ordem crescente
asort($array);
echo "<pre>"; 
echo "Forma Crescente <br>";
echo "Usando asort: <br>"; 
print_r($array); 
echo "</pre>";

// Ordena o array em ordem decrescente
arsort($array);
echo "<pre>";
echo "Forma Decrescente <br>"; 
echo "Usando arsort: <br>"; 
print_r($array); 
echo "</pre>";

// Ordena o array por chaves em ordem crescente
ksort($array);
echo "<pre>";
echo "Ordem por Chaves Crescente <br>"; 
echo "Usando ksort: <br>"; 
print_r($array); 
echo "</pre>";

// Ordena o array por chaves em ordem decrescente
krsort($array);
echo "<pre>";
echo "Ordem por Chaves Decrescente <br>"; 
echo "Usando krsort: <br>"; 
print_r($array); 
echo "</pre>";

// Ordena o array em ordem crescente (sem chaves)
sort($array);
echo "<pre>";
echo "Ordem Crescente Sem Chaves <br>"; 
echo "Usando sort: <br>"; 
print_r($array); 
echo "</pre>";

// Ordena o array em ordem decrescente (sem chaves)
rsort($array);
echo "<pre>";
echo "Ordem Decrescente Sem Chaves <br>"; 
echo "Usando rsort: <br>"; 
print_r($array); 
echo "</pre>";

?>

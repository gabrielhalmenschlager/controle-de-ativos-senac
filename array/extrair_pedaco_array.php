<?php 

$array = array(1,2,3,4,5,6,7,8,9,10);
//$resultado = array_slice($array,2,6);
//$resultado_com_chaves = array_slice($array,2,6,true);

//$array_add = array_splice($array,2,6,"sad");
//$input = array("vermelho","verde","azul","amarelo");
//array_splice($input,2, 2,array("preto","marrom"));

$array_cores = array("vermelho","verde","azul","amarelo");
$junta = array_merge($array,$array_cores);

echo "<pre>";
//var_dump($resultado, $resultado_com_chaves);
var_dump($junta);
//var_dump($array_add);
echo "</pre>";

echo "<br>";

?>


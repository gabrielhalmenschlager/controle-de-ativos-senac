<?php 

// Criação de um array
$array = array(
    "nome" => "Gabriel",
    "idade" => "16",
    "time" => "Inter",
);

// Usa array_keys para encontrar as chaves que têm o valor 'Gabriel'
$chaves = array_keys($array, 'Gabriel');

// Exibe as chaves encontradas em formato legível
echo "<pre>";
print_r($chaves); // Mostra as chaves que correspondem ao valor 'Gabriel'
echo "</pre>";

?>

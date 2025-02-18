<?php 

// Criação de um array associativo com informações pessoais
$array = array(
    "nome" => "Gabriel",
    "idade" => "16",
    "time" => "Inter",
);

// Usa array_values para extrair todos os valores do array associativo
$valores = array_values($array);

// Exibe os valores em formato legível
echo "<pre>";
print_r($valores); // Mostra os valores do array: Gabriel, 16, Inter
echo "</pre>";

?>

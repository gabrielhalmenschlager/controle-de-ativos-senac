<?php 

// Criação de um array associativo com informações pessoais
$arrayBase = array(
    "nome" => "Gabriel",
    "idade" => "16",
    "time" => "Inter",
);

// Criação de outro array associativo para comparação
$arrayCompara = array(
    "nome" => "Gabriel",
    "idade" => "16",
    "time" => "Gremio",
);

// Usa array_diff para encontrar elementos em $arrayBase que não estão em $arrayCompara
$diferenca = array_diff($arrayBase, $arrayCompara);

// Usa array_intersect para encontrar elementos comuns entre $arrayBase e $arrayCompara
$igual = array_intersect($arrayBase, $arrayCompara);

// Extrai os valores dos arrays
$valorBase = array_values($arrayBase);
$valorCompara = array_values($arrayCompara);
$resultadoValor = array_merge($valorBase, $valorCompara); // Combina os valores dos dois arrays

// Extrai as chaves dos arrays
$chavesBase = array_keys($arrayBase);
$chavesCompara = array_keys($arrayCompara);
$resultadoChaves = array_merge($chavesBase, $chavesCompara); // Combina as chaves dos dois arrays

echo "<pre>";
echo "Diferença: <br>";
print_r($diferenca); // Mostra os elementos únicos do arrayBase

echo "<br>Iguais: <br>";
print_r($igual); // Mostra os elementos que estão em ambos os arrays

echo "<br>Chaves: <br>";
print_r($resultadoChaves); // Mostra todas as chaves combinadas
echo "<br>Valores: <br>";

print_r($resultadoValor); // Mostra todos os valores combinados
echo "</pre>";

?>

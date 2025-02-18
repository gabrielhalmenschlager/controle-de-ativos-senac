<?php 

// Criação do array de pessoas com nome e idade
$pessoas = [
    ["nome" => "Gabriel", "idade" => 25],
    ["nome" => "Pedro", "idade" => 17],
    ["nome" => "Bruno", "idade" => 30],
    ["nome" => "Ferrao", "idade" => 22],
    ["nome" => "Milico", "idade" => 15],
];

// Exibe o array de pessoas
echo "<pre>";
echo "Pessoas: <br>";
print_r($pessoas);
echo "</pre>";

// Array para armazenar idades de pessoas maiores de 18 anos
$pessoasMaiores = [];

// Filtra e armazena idades maiores de 18 anos
foreach ($pessoas as $pessoa) {
    if ($pessoa["idade"] > 18) {
        $pessoasMaiores[] = $pessoa["idade"];
    }
}

// Ordena as idades em ordem crescente
sort($pessoasMaiores);

echo "<pre>";
echo "Pessoas Maiores de Idade: <br>";
print_r($pessoasMaiores);
echo "</pre>";

// Calcula a soma das idades
$somaIdade = array_sum($pessoasMaiores);
// Calcula a média das idades
$mediaIdade = $somaIdade / count($pessoasMaiores);

// Exibe a média das idades
echo "<pre>";
echo "<br>Média das idades: " . number_format($mediaIdade, 1) . "<br>";
echo "</pre>";

?>

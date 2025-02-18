<?php
// Inicializa uma variável com o valor 30
$numero = 30;

// Inicializa uma string com informações pessoais
$texto = "Meu nome é Gabriel, tenho 16 anos, sou colorado, sou lindo";

// Usa a função explode para dividir a string em partes, usando a vírgula como delimitador
$quebra_texto = explode(",", $texto);

echo $texto . "<br>";
var_dump($quebra_texto);

// Loop para iterar sobre cada elemento do array resultante da divisão
for ($i = 0; $i < count($quebra_texto); $i++) {
    // Exibe cada elemento do array, removendo espaços em branco extras
    echo trim($quebra_texto[$i]) . "<br>";
}

// Exibe informações detalhadas sobre o array $quebra_texto para depuração
var_dump($quebra_texto);
?>

s
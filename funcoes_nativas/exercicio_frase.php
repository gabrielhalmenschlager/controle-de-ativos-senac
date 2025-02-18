<?php

// Define uma string com informações pessoais
$texto = "Meu nome e Gabriel; Sou Colorado; Moro em Santa Cruz; Sou Lindo; Estudo no Goias; Tenho 16";

// Divide a string em frases usando ";" como delimitador
$quebra_texto = explode(";", $texto);

// Itera sobre cada frase
for ($i = 0; $i < count($quebra_texto); $i++) {
    // Remove espaços em branco das extremidades da frase
    $frase = trim($quebra_texto[$i]);

    // Exibe a frase atual
    echo "FRASE: " . $frase . "<br>";

    // Divide a frase em palavras usando espaço como delimitador
    $quebra_frase = explode(" ", $frase);

    // Itera sobre cada palavra
    for ($a = 0; $a < count($quebra_frase); $a++) {
        $palavra = $quebra_frase[$a];
        // Se o índice da palavra é par, converte para maiúsculas; caso contrário, para minúsculas
        if ($a % 2 == 0) {
            echo "PALAVRA: " . mb_strtoupper($palavra, "UTF-8") . "<br>";
        } else {
            echo "PALAVRA: " . mb_strtolower($palavra, "UTF-8") . "<br>";
        }
    }
}
?>

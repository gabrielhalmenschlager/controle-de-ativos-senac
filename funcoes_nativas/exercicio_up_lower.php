<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Up e Lower</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(226, 223, 223);
        color: royalblue;
        text-align: left;
        padding: 50px;
    }

    h1 {
        color: royalblue; 
        margin-bottom: 20px;
    }
    .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
    }
    </style>

</head>
<body>

<h1>Exercício Up e Lower</h1>

<?php

// Define o nome a ser manipulado
$nome = "Gabriel Halmenschlager";

// Separa o nome em palavras usando espaço como delimitador
$quebra_tudo = explode(" ", $nome);

// Loop para cada palavra no nome
for ($i = 0; $i < count($quebra_tudo); $i++) {
    // Exibe a palavra atual
    echo "<br>" . $quebra_tudo[$i] . ":";
    
    // Converte a palavra para maiúsculas
    $nome_maiusculo = mb_strtoupper($quebra_tudo[$i]);
    
    // Converte a palavra para minúsculas
    $nome_minusculo = mb_strtolower($quebra_tudo[$i]);
    
    // Converte a primeira letra da palavra para maiúscula
    $primeira_letra = ucfirst($quebra_tudo[$i]);

    // Inicializa uma string para o formato alternado
    $formato_alternado = '';
    
    // Loop para alternar entre maiúsculas e minúsculas
    for ($j = 0; $j < mb_strlen($quebra_tudo[$i]); $j++) {
        if ($j % 2 == 0) {
            // Se o índice é par, transforma em maiúscula
            $formato_alternado .= mb_strtoupper(mb_substr($quebra_tudo[$i], $j, 1));
        } else {
            // Se o índice é ímpar, transforma em minúscula
            $formato_alternado .= mb_strtolower(mb_substr($quebra_tudo[$i], $j, 1));
        }
    }

    echo "<div class='resultado'>"; // Exibe os resultados

    echo "$nome_maiusculo" . "<br>"; // Exibe a palavra em maiúsculas
    echo "$nome_minusculo" . "<br>"; // Exibe a palavra em minúsculas
    echo "$primeira_letra" . "<br>";  // Exibe a palavra com a primeira letra maiúscula
    echo "$formato_alternado" . "<br>"; // Exibe a palavra em formato alternado

    echo "</div>"; // Fecha a div de resultados
}
?>


</body>
</html>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Lista de Compras</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: auto;
            padding: 20px;
        }

        h1 {
            color: royalblue;
            text-align: center;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 20px;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 10px;
            font-size: larger;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
            margin: auto;
            font-size: large;
        }
    </style>

</head>

<body>

    <h1>Exercício Lista de Compras</h1>
    <h2>Exercício (Apresentação)
        Desenvolver um algoritmo que:
        <br>* Crie uma string de lista de compras, cada item da lista separadas por virgula (,)
        <br>* Divida a string acima pelo delimitador da virgula (.)
        <br>* Com o resultado da divisão faça um laço que exiba cada frase em uma linha separada e informe o número que cada item está na lista.
    </h2>

</body>

</html>

<?php

// String com a lista de compras
$listaCompras = "pão, queijo, presunto, refri, picanha, arroz, feijão";

// Separa o nome em palavras usando espaço como delimitador
$quebra_tudo = explode(" ", $listaCompras);

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
?>
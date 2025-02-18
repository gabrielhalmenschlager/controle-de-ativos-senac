<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício removendo espaços</title>

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

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
            margin: auto;
        }
    </style>

</head>

<body>

    <h1>Exercício removendo espaços</h1>

    <?php

    $texto = "   REMOVENDO ESPAÇOS   ";
    $tira_espaco_esquerda = ltrim($texto); // Retira espaços a esquerda
    $tira_espaco_direita = rtrim($texto); // Retira espaços a direita
    $tira_espaco_inicio_fim = trim($texto); // Retira espaços no inicio e no fim

    $tamanho_texto = strlen($texto);
    $tamanho_texto_esquerda  = strlen($tira_espaco_esquerda);
    $tamanho_texto_direita = strlen($tira_espaco_direita);
    $tamanho_texto_inicio_fim = strlen($tira_espaco_inicio_fim);

    echo "<div class='resultado'>";

    echo $texto . "<br>";
    echo "O tamanho do texto : " . $tamanho_texto . "<p>";

    echo $tira_espaco_esquerda . "<br>";
    echo "O tamanho do texto removendo os espaços da esquerda é: " . $tamanho_texto_esquerda . "<p>";

    echo $tira_espaco_direita . "<br>";
    echo "O tamanho do texto removendo os espaços da direita é: " . $tamanho_texto_direita . "<p>";

    echo $tira_espaco_inicio_fim . "<br>";
    echo "O tamanho do texto removendo os espaços do inicio e do fim é: " . $tamanho_texto_inicio_fim . "<p>";

    echo "</div>";

    ?>

</body>

</html>
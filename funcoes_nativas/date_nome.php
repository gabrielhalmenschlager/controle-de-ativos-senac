<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e Hora</title>

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

    <h1>Data e Hora</h1>

    <?php

    // Define o fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    // Define a data de nascimento
    $dataNascimento = strtotime('2007-12-14');

    // Obtém a data atual
    $dataAtual = time();

    // Calcula os segundos desde a data de nascimento
    $segundosPassados = $dataAtual - $dataNascimento;

    // Calcula a idade
    $idadeAnos = date('Y', $dataAtual) - date('Y', $dataNascimento);

    // Calcula a idade em dias
    $idadeDias = round($segundosPassados / (365 * 60 * 60 * 24)); // segundos para dias

    // Calcula a idade em meses
    $idadeMeses = round($idadeDias / 30); // aproximadamente

    // Exibe os resultados
    echo "<div class='resultado'>";
    // Mostra os segundos passados
    echo "Segundos que se passaram desde 14 de dezembro de 2007: " . number_format($segundosPassados, 1) . "<br>";
    // Mostra a idade em anos
    echo "Idade: " . $idadeAnos . " anos<br>";
    // Mostra a idade em meses
    echo "Idade: " . $idadeMeses . " meses<br>";
    // Mostra a idade em dias
    echo "Idade: " . $idadeDias . " dias";

    echo "</div>"; // Fecha a div

    ?>




</body>

</html>
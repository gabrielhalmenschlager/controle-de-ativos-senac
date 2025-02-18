<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #343a40;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: left;
            color: #007bff;
            margin-bottom: 10px;
        }

        h2 {
            text-align: left;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .resultado {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px 0 20px 0;
            text-align: left;
        }
    </style>

</head>

<body>

    <h1>Exercício</h1>
    <h2>Desenvolver um algoritmo que :
        <br>* Exiba a data atual no formato (dia/mês/ano);
        <br>* Exiba a hora atual no formato (hora:minuto:segundo);
        <br>* Exiba a data e a hora atual no formato (dia/mês/ano hora:minuto:segundo);
        <br>* Exiba qual dia da semana cai a data atual;
    </h2>

    <?php

    echo "<div class='resultado'>";

    date_default_timezone_set('America/Sao_Paulo');

    $dataAtual = time();
    $data = date('d/m/Y') . "<br>";
    $horaAtual = date('H:i:s') . "<br>";
    $DataHoraAtual = date('d/m/Y H:i:s') . "<br>";
    $diaDaSemana = date('l', strtotime($dataAtual));

    echo "A data atual é: " . $data;
    echo "A hora atual é: " . $horaAtual;
    echo "A data e a hora atual é: " . $DataHoraAtual;
    echo "A data cai em uma " . $diaDaSemana;

    $dataNascimento = '2024-12-14';
    $resultado = strtotime($dataNascimento) - $dataAtual;    
    $diasFaltando = ceil($resultado / (60 * 60 * 24));  

    echo "<br>Faltam " . $diasFaltando . " dias para o seu aniversário.";
     
    ?>

</body>

</html>
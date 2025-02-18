<!DOCTYPE html>
<html lang="tp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e Hora</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #343a40;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 20px;
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

    echo "<div class='resultado'>";

    date_default_timezone_set('America/Sao_Paulo');
    echo date('d/m/Y H:i:s') . "<br>";
    echo date('Y') . "<br>";
    echo date('d') . "<br>";

    echo number_format(strtotime("2007-12-14"), 0, ",", ".");

    echo "</div>";
    ?>

</body>

</html>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter String</title>

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

    <h1>Converter String</h1>

    <?php

    // Define uma variável com o nome
    $nome = "Gabriel Halmesnchlager";
    $quebra_primeira = explode(" ", $nome);
    echo "<div class='resultado'>";

    for ($i = 0; $i < count($quebra_primeira); $i++) {
        echo trim($quebra_primeira[$i]) . "<br>";

        // Converte a primeira letra do nome para maiúscula e exibe
        $primeira_letra = ucfirst($nome);
        echo $primeira_letra . "<br>";

        // Converte todo o nome para letras maiúsculas e exibe
        $tudo_maiusculo = mb_strtoupper($nome, "UTF-8");
        echo $tudo_maiusculo . "<br>";

        // Converte todo o nome para letras minúsculas e exibe
        $tudo_minusculo = mb_strtolower($nome, "UTF-8");
        echo $tudo_minusculo . "<br>";
    }

    echo "</div>";

    ?>


</body>

</html>
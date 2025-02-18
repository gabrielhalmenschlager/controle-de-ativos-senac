<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Removendo e Verificando</title>

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

    <h1>Exercício Removendo e Verificando</h1>

    <?php

    function verificar($texto) {
        $textoExplode = explode(" ", $texto);

        for ($i = 0; $i < count($textoExplode); $i++) {
            echo trim($textoExplode[$i]) . "<br>";
        }
    }

    $texto = "removendo espaços e verificando resultado  ";

    $removidoInicio = ltrim($texto);
    $removidoFim = rtrim($texto);
    $removidoInicioFim = trim($texto);

    $tamanhoTexto = strlen($texto);
    $tamanhoTextoInicio  = strlen($removidoInicio);
    $tamanhoTextoFim = strlen($removidoFim);
    $tamanhoTextoInicioFim = strlen($removidoInicioFim);

    echo "<div class='resultado'>";

    echo "String original: " . $texto . "<br>";
    echo "O tamanho do texto: " . $tamanhoTexto . "<p>";

    echo "Após remover espaços do início: " . $removidoInicio . "<br>";
    echo "O tamanho do texto após remover espaços do início: " . $tamanhoTextoInicio . "<p>";

    echo "Após remover espaços do fim: " . $removidoFim . "<br>";
    echo "O tamanho do texto após remover espaços do fim: " . $tamanhoTextoFim . "<p>";

    echo "Após remover espaços do início e do fim: " . $removidoInicioFim . "<br>";
    echo "O tamanho do texto após remover espaços do início e fim: " . $tamanhoTextoInicioFim . "<p>";

    if ($texto != $texto) {
        echo "A string resultante é diferente da original.<br>";
    } else {
        echo "A string resultante é igual à original.<br>";
    }

    if ($removidoInicio != $texto) {
        echo "A string resultante é diferente da original.<br>";
    } else {
        echo "A string resultante é igual à original.<br>";
    }

    if ($removidoFim != $texto) {
        echo "A string resultante é diferente da original.<br>";
    } else {
        echo "A string resultante é igual à original.<br>";
    }

    if ($removidoInicioFim != $texto) {
        echo "A string resultante é diferente da original.<p>";
    } else {
        echo "A string resultante é igual à original.<p>";
    }

    verificar($texto) . "<p>";
    verificar($removidoInicio) . "<p>";
    verificar($removidoFim) . "<p>";
    verificar($removidoInicioFim) . "<p>";

    echo "</div>";
    

    ?>

</body>

</html>
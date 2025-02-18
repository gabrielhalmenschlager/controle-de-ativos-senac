<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação Dupla</title>

    <style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    h1 {
        color: #2c3e50;
        margin-bottom: 20px;
    }

</style>

</head>
<body>

<h1>Validação Dupla</h1>

<?php

$valor1 = 3;
$valor2 = 2;
$valor3 = 5;
$valor4 = 10;

if ($valor2 > $valor1 && $valor3 < $valor4) {
    echo "é MAIOR";

}else if ($valor2 == $valor3 && $valor4 > $valor1){
    echo "CAIU NO ELSE IF";

}else if ($valor3 != $valor4) {
    echo "TERCEIRA";

}else{
    echo "NÃO é";
}

?>
    
</body>
</html>

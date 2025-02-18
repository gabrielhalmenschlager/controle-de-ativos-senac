<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparação</title>

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

<h1>Comparação</h1>

<?php

$numero1 = 9;
$numero2 = 10;

if($numero1 === $numero2){
    echo "<p>Ambas as variaveis são Identicas";

} else if ($numero1 == $numero2) {
    echo "<p>As variaveis são iguais";

} else if ($numero1 != $numero2) {
    echo "<p>As variaveis tem valores diferentes";

} if ($numero1 > $numero2) {
    echo "<p>A variavel 1 que é: $numero1 é maior que a variavel 2 que é: $numero2";

} else if ($numero2 > $numero1) {
    echo "<p>A variavel 2 que é: $numero2 é maior que a variavel 1 que é: $numero1";

} else {
    echo "<p>As variaveis tem o mesmo valor";
}

?>

</body>
</html>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caluculo de Média</title>

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

<h1>Caluculo de Média</h1>

<?php

$nota1 = 90;
$nota2 = 80;
$nota3 = 70;

$soma = $nota1 + $nota2 + $nota3;
$media = $soma / 3;

if ($media >= 70) {
    echo "Seu média é $media e o aluno foi APROVADO";

} else if ($media >= 50 && $media <= 69 ) {
    echo "Seu média é $media e o aluno foi está em RECUPERAÇÃO";

} else {
    echo "Seu média é $media e o aluno foi REPROVADO";

}

?>

</body>
</html>

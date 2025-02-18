<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressões</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin: 0;
        }

        p {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    
</head>
<body>

<h1>Minhas Informações:</h1>

<?php 

$nome = "Gabriel";
$sobrenome = "Halmenschlager";
$nome_sobrenome = $nome . ' ' . $sobrenome;
$idade = 16;

print("<p>Meu nome é: ". $nome);
print("<p>Meu sobrenome é: ". $sobrenome);
print("<p>Meu nome completo é: ". $nome_sobrenome);
print("<p>Minha idade é: ". $idade);

?>

</body>
</html>

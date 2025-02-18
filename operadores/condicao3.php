<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário e Senha</title>

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

    <h1>Usuário e Senha</h1>

<?php

    $user = "gabriel";
    $senha = "bonito";

    $user_correto = "gabriel";
    $senha_correta = "bonito";

// Validação USUARIO
    if ($user === $user_correto) {
        echo "O Usuário está CORRETO";

    } else if ($user != $user_correto) {
        echo "O Usuário está INCORRETO";

    } else {
        echo "Usuário INVALIDO";
    }

// Espaçamento
    echo "<br>";

// Validação SENHA
    if ($senha === $senha_correta) {
        echo "A Senha está CORRETO";

    } else if ($senha != $senha_correta) {
        echo "A Senha está INCORRETO";

    } else {
        echo "Senha INVALIDA";
    }

// Espaçamento
    echo "<br>";

// Validação USUÁRIO e SENHA
    if ($user === $user_correto && $senha === $senha_correta) {
        echo "O Usuário e a Senha estão CORRETOS";

    } else if ($user != $user_correto || $senha != $senha_correta) {
        echo "O Usuário e a Senha estão INCORRETAS";

    } else {
        echo "O Usuário e a Senha estão INVALIDAS";
    }

?>
    
</body>
</html>


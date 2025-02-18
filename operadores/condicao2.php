<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condição 2</title>

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

<h1>Condição 2</h1>

<?php

$user = "test";
$senha =  "121";

$user_correto = "teste";
$senha_correta = "123";

if ($user === $user_correto && $senha === $senha_correta) {
    echo "O usuário acessou:" . $user. " <br> senha de acesso:" .$senha. "<br> informações corretas";

} else if ($user != $user_correto || $senha != $senha_correta) {
    echo "O usuário não acessou:" . $user. " <br> senha de acesso:" .$senha. "<br> informações incorretas";

} else if ($senha !=$senha_correta) {
    echo "SENHA INCORRETA";
    
} else {
    echo "FALHA AO LOGIN";
}

echo "<br>";

if ($user != $user_correto || $senha != $senha_correta) {
    echo "USUARIO E SENHA INCORRETAS";
}

?>
    
</body>
</html>


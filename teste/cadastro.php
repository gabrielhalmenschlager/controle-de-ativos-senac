<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form action="salvar.php" method="POST">
        Nome: <input type="text" name="nomeUsuario" required><br>
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senhaUsuario" required><br>
        Turma: <input type="text" name="turmaUsuario"><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

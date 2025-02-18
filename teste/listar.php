<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Usuários</title>
</head>
<body>
    <h1>Usuários Cadastrados</h1>
    <a href="cadastro.php">Cadastrar Novo Usuário</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
        <?php
        $stmt = $conn->query("SELECT * FROM usuarios");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['idUsuario']}</td>
                <td>{$row['nomeUsuario']}</td>
                <td>{$row['usuario']}</td>
                <td>
                    <a href='editar.php?id={$row['idUsuario']}'>Editar</a>
                    <a href='excluir.php?id={$row['idUsuario']}'>Excluir</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>

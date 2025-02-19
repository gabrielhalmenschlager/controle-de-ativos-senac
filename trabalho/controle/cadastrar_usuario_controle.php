<?php

include ('../modelo/conexao.php');

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$turma = $_POST['turma'];

if (strlen($senha) < 8) {
    echo "<script> alert('A senha deve ter no mínimo 8 caracteres.')
    window.location.href = '../visao/cadastrar_usuario.php'
    </script>";
    exit();
}

if (!preg_match('/\d/', $senha)) {
    echo "<script> alert('A senha deve conter pelo menos um número.')
    window.location.href = '../visao/cadastrar_usuario.php'
    </script>";
    exit();
}

if (!preg_match('/[a-zA-Z]/', $senha)) {
    echo "<script> alert('A senha deve conter pelo menos uma letra.')
    window.location.href = '../visao/cadastrar_usuario.php'
    </script>";
    exit();
}

if (preg_match('/(\d)\1{2,}/', $senha)) {
    echo "<script> alert('A senha não pode ser uma sequência de números consecutivos.')
    window.location.href = '../visao/cadastrar_usuario.php'
    </script>";
    exit();
}

echo "Usuário cadastrado com suceso!!!<br>"."Nome: ".$nome."<br>"."Usuario: ". $usuario."<br>"."Turma: ".$turma."<br>";

$senhaCrip = base64_encode($senha);

$query="
            insert into usuario (
                                nomeUsuario,
                                usuario,
                                senhaUsuario,
                                turmaUsuario,
                                dataCadastro
                                )values ('".$nome."',
                                '".$usuario."',
                                '".$senhaCrip."',
                                '".$turma."',
                                    NOW())";

$ativos = mysqli_query($conexao,$query)or die(false);

if($ativos){
    echo"<script> alert ('usuario cadastrado')
    window.location.href = '../visao/listar_usuario.php'
 </script>";
}
else{
    echo"<script> alert ('usuario cadastrado')
   window.location.href = '../visao/cadastro_usuario.php'
   </script>";
}


?>
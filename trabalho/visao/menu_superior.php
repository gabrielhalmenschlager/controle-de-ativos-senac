<?php

include_once('cabecalho.php');
include_once('../modelo/conexao.php');

$cargo = $_SESSION['idCargo'];

$sqlMenu = "SELECT 
                idOpcao,
                descricaoOpcao,
                urlOpcao
            FROM
                opcoes_menu O
            WHERE
                nivelOpcao = 1
                AND statusOpcao = 'S'
                AND idOpcao IN (
                    SELECT idOpcao FROM acesso A WHERE A.idOpcao = O.idOpcao AND statusAcesso = 'S' AND idCargo = $cargo
                )
            ";
        
$result = mysqli_query($conexao, $sqlMenu) or die(false);
$acessos_menu = $result->fetch_all(MYSQLI_ASSOC);

?>

<!--

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://cdljundiai.com.br/wp-content/uploads/2020/06/senac.png" alt="Logo" style="height: 90px; transition: transform 0.3s ease;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php">Início
                        <i class="bi bi-house"></i>
                    </a>
                </li>
                <li class="nav-item dropdown usuario-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuário
                        <i class="bi bi-people"></i>
                    </a>
                    <ul class="dropdown-menu sub-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="cadastrar_usuario.php">Cadastrar Usuários</a></li>
                        <li><a class="dropdown-item" href="listar_usuario.php">Lista de Usuários</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ativos-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAtivos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastro
                        <i class="bi bi-file-earmark-plus"></i>
                    </a>
                    <ul class="dropdown-menu sub-menu" aria-labelledby="navbarDropdownAtivos">
                        <li><a class="dropdown-item" href="ativos.php">Ativos</a></li>
                        <li><a class="dropdown-item" href="marcas.php">Marcas</a></li>
                        <li><a class="dropdown-item" href="tipos.php">Tipos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movimentacoes.php">Movimentações
                        <i class="bi bi-arrows-move"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="relatorio.php">Relatórios
                        <i class="bi bi-file-earmark-text"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos_ml.php">Produtos
                        <i class="bi bi-cart-plus"></i>
                    </a>
                </li>
                <li class="nav-item dropdown ativos-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAtivos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                        <i class="bi bi-gear"></i>
                    </a>
                    <ul class="dropdown-menu sub-menu" aria-labelledby="navbarDropdownAtivos">
                        <li><a class="dropdown-item" href="opcoes.php">Opções</a></li>
                        <li><a class="dropdown-item" href="cargos.php">Cargos</a></li>
                        <li><a class="dropdown-item" href="acessos.php">Acessos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sair" href="sair.php">
                        Sair
                        <img src="https://cdn-icons-png.freepik.com/256/16697/16697253.png?semt=ais_hybrid" alt="Ícone de Sair" style="width: 18px; height: 18px; margin-left: 8px;">
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav> 

-->

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php
        foreach ($acessos_menu as $acesso) {

            $sqlSubMenu = "SELECT 
                idOpcao,
                descricaoOpcao,
                urlOpcao
            FROM
                opcoes_menu O
            WHERE
                idSuperior = '" . $acesso['idOpcao'] . "' 
                AND statusOpcao = 'S'
                AND idOpcao IN (
                    SELECT idOpcao FROM acesso A WHERE A.idOpcao = O.idOpcao AND statusAcesso = 'S' AND idCargo = $cargo
                )
            ";

            $resultSubMenu = mysqli_query($conexao, $sqlSubMenu) or die(false);
            $acessos_subMenu = $resultSubMenu->fetch_all(MYSQLI_ASSOC);

            if (count($acessos_subMenu) > 0) {
        ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $acesso['descricaoOpcao']; ?>
                  </a>
                  <ul class="dropdown-menu">
                    <?php
                    foreach ($acessos_subMenu as $subMenu) {
                        echo '
                            <li>
                                <a class="dropdown-item" href="' . $subMenu['urlOpcao'] . '">' . $subMenu['descricaoOpcao'] . '</a>
                            </li>';
                    }
                    ?>
                  </ul>
                </li>
        <?php
            } else {
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="' . $acesso['urlOpcao'] .'">' . $acesso['descricaoOpcao'] .'</a>
                    </li>';
            }
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<style>

    #sair {
        color: red !important;
    }

    .navbar-brand {
        margin-left: 20px;
    }

    .navbar-brand img {
        height: 50px;
        width: auto;
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover img {
        transform: scale(1.05);
    }

    .navbar-nav .nav-link {
        color: #054F77 !important;
        font-weight: 600;
        font-size: 16px;
        padding: 12px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        background-color: #FFA500;
        color: white !important;
        border-radius: 5px;
    }

    .usuario-menu,
    .ativos-menu {
        position: relative;
    }

    .sub-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #054F77;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        min-width: 180px;
        z-index: 1;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: translateY(10px);
    }

    .usuario-menu:hover .sub-menu,
    .ativos-menu:hover .sub-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .sub-menu .dropdown-item {
        color: #054F77;
        padding: 12px 20px;
        font-size: 15px;
        transition: background-color 0.3s ease;
    }

    .sub-menu .dropdown-item:hover {
        background-color: #FFA500;
        border-radius: 5px;
        color: white;
    }

    .navbar-toggler-icon {
        background-color: #FFA500;
    }

    .navbar-nav {
        display: flex;
        gap: 25px;
        margin-left: auto;
    }

    .container {
        padding-left: 0;
        padding-right: 0;
    }

    .navbar-collapse {
        justify-content: flex-end;
    }

    .navbar-nav .nav-link {
        text-transform: none;
    }

    .nav-link:hover {
        color: red;
        background-color: red;
    }
</style>
<?php
$title = "Página Inicial Senac RS";
include_once('cabecalho.php');
include_once('menu_superior.php');
?>

<body>
    <div class="inicio-container mt-5">
        <div class="welcome-content text-center">
            <img src="https://www.senacrs.com.br/assets/layout/images/logo_senac.png" alt="Logo Senac" class="logo mb-4 logo">
            <h1 class="welcome-title">Bem-vindo ao Senac RS</h1>
            <p class="welcome-message">Acesse o Sistema de Ativos do Senac para consultar, gerenciar e realizar atividades relacionadas aos seus cursos e materiais.</p>
            <a href="cadastrar_usuario.php" class="btn btn-primary" style="background-color: #054F77;">Cadastrar-se</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Card de Ativos -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <i class="fas fa-cogs card-icon"></i>
                    <img src="https://cdn-icons-png.flaticon.com/512/3534/3534139.png" alt="Icone de Cadastros">
                    <div class="card-body">
                        <h5 class="card-title">Cadastros</h5>
                        <p class="card-text">Gerencie e cadastre os ativos, tipos e marcas disponíveis no sistema.</p>
                        <div class="card-footer">
                            <a href="ativos.php" class="btn btn-primary">Cadastrar Ativo</a>
                            <a href="marcas.php" class="btn btn-primary">Cadastrar Marca</a>
                            <a href="tipos.php" class="btn btn-primary">Cadastrar Tipo</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card de Usuários -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <i class="fas fa-users card-icon"></i>
                    <img src="https://cdn-icons-png.flaticon.com/512/3633/3633137.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Usuários</h5>
                        <p class="card-text">Cadastre e faça login com seus dados para acessar o sistema.</p>
                        <div class="card-footer">
                            <a href="cadastrar_usuario.php" class="btn btn-primary">Cadastrar Usuário</a>
                            <a href="login.php" class="btn btn-primary">Login Usuários</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card de Movimentações -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <i class="fas fa-exchange-alt card-icon"></i>
                    <img src="https://cdn-icons-png.flaticon.com/512/4024/4024382.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Movimentações</h5>
                        <p class="card-text">Controle as movimentações de ativos e visualize relatórios.</p>
                        <div class="card-footer">
                            <a href="movimentacoes.php" class="btn btn-primary">Movimentações</a>
                            <a href="relatorio.php" class="btn btn-primary">Relatórios</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card de Produtos -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <i class="fas fa-boxes card-icon"></i>
                    <img src="https://cdn-icons-png.flaticon.com/512/6725/6725427.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Produtos</h5>
                        <p class="card-text">Gerencie os produtos disponíveis e sua disponibilidade.</p>
                        <div class="card-footer">
                            <a href="produtos_ml.php" class="btn btn-primary">Ver Produtos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../css/img_carrossel/1.jpg" class="d-block w-100 img" alt="Imagem ">
                </div>
                <div class="carousel-item">
                    <img src="../css/img_carrossel/2.jpeg" class="d-block w-100 img" alt="Imagem 2">
                </div>
                <div class="carousel-item">
                    <img src="../css/img_carrossel/3.jpeg" class="d-block w-100 img" alt="Imagem 3">
                </div>
                <div class="carousel-item">
                    <img src="../css/img_carrossel/4.jpeg" class="d-block w-100 img" alt="Imagem 4">
                </div>
                <div class="carousel-item">
                    <img src="../css/img_carrossel/6.jpg" class="d-block w-100 img" alt="Imagem 5">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <div class="info-container mt-5">
        <h3 class="info-title">Senac Santa Cruz do Sul</h3>

        <div class="contact-info">
            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <p><strong>Telefone:</strong> (51) 3715-9335</p>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-phone-square-alt"></i>
                <div>
                    <p><strong>Mais Contatos:</strong></p>
                    <ul>
                        <li>(51) 3711-6460 - Telefone Comercial</li>
                        <li>(51) 3711-6460 - Informações de Curso</li>
                    </ul>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <p><strong>Endereço:</strong> Venâncio Aires, 300 - CENTRO - SANTA CRUZ DO SUL - RS</p>
                    <p><strong>CEP:</strong> 96.810-204</p>
                    <a href="https://www.google.com/maps?q=Venâncio+Aires,+300,+CENTRO,+SANTA+CRUZ+DO+SUL+-+RS&hl=pt" target="_blank" class="btn-google-maps">
                        <i class="fab fa-google"></i> Ver no Google Maps
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <div>
                    <p><strong>Horário de Funcionamento:</strong></p>
                    <ul>
                        <li>Segunda a sexta-feira: 07:00 às 22:00</li>
                        <li>Sábado: 09:00 às 12:00</li>
                    </ul>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-share-alt"></i>
                <div>
                    <p><strong>Redes Sociais:</strong></p>
                    <ul>
                        <li><strong>Instagram:</strong> <a href="https://www.instagram.com/senacsantacruz" target="_blank">senacsantacruz</a></li>
                        <li><strong>Facebook:</strong> <a href="https://www.facebook.com/senacsantacruz" target="_blank">senacsantacruz</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-light text-center py-3 mt-5" style="background-color: gray;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 text-left">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Senac_logo.svg/2560px-Senac_logo.svg.png" alt="Logo Senac" style="width: 150px;">
            </div>
            <div class="col-6 text-right">
                <p style="color: white; margin-bottom: 0;">Siga-nos nas redes sociais:</p>
                <a href="https://www.instagram.com/senacsantacruz" target="_blank" class="mr-3">
                    <img src="https://png.pngtree.com/png-clipart/20180626/ourmid/pngtree-instagram-icon-instagram-logo-png-image_3584852.png" alt="Instagram" style="width: 30px; height: 30px; transition: transform 0.3s;">
                </a>
                <a href="https://www.facebook.com/senacsantacruz" target="_blank" class="mr-3">
                    <img src="https://static.vecteezy.com/system/resources/previews/018/930/698/non_2x/facebook-logo-facebook-icon-transparent-free-png.png" alt="Facebook" style="width: 30px; height: 30px; transition: transform 0.3s;">
                </a>
            </div>
        </div>
        <div class="mt-3">
            <span style="color: white;">2024 Senac | Todos os direitos reservados</span>
        </div>
    </div>
</footer>

</body>

</html>

<style>
    /* Estilo geral dos cards */
    .card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: box-shadow 0.3s ease;
        padding: 20px;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card .card-body {
        padding: 20px;
    }

    .card .card-icon {
        color: #054F77;
        margin-bottom: 20px;
        font-size: 3rem;
    }

    .card-title {
        font-size: 1.5rem;
        color: #054F77;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
        margin-bottom: 20px;
    }

    .card-footer {
        text-align: center;
        margin-top: 15px;
    }

    .card-footer a {
        margin: 5px;
    }

    /* Botões */
    .btn-primary {
        background-color: #054F77;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #00507D;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1.3rem;
        }

        .card-text {
            font-size: 0.9rem;
        }

        .col-md-3 {
            margin-bottom: 20px;
        }
    }

    /* Adicionando margens nos contêineres */
    .inicio-container,
    .container {
        padding-left: 15px;
        padding-right: 15px;
    }

    .inicio-container {
        margin-top: 50px;
    }

    .welcome-content {
        margin-top: 50px;
    }

    .welcome-title {
        font-size: 2rem;
        font-weight: bold;
        color: #054F77;
    }

    .welcome-message {
        font-size: 1.1rem;
        color: #666;
    }

    .info-container {
        margin-top: 50px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .info-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #054F77;
    }

    .contact-info {
        margin-top: 30px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .contact-item i {
        font-size: 1.5rem;
        color: #054F77;
        margin-right: 15px;
    }

    .contact-item p,
    .contact-item ul {
        font-size: 1rem;
        color: #555;
    }
</style>
<?php
include_once('cabecalho.php');
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #054F77; color: white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Marcas</h1>
                <button type="button" onclick="limpar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-cadastrar-marca">
                    <div class="mb-3">
                        <label class="form-label">Descrição da Marca</label><span style="color: red;"> * </span>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Digite a descrição da marca" required>
                        <input type="hidden" class="form-control" id="idMarca" name="idMarca">
                    </div>
                    <div class="mb-3">
                        <span style="color: red;"> * Campos Obrigatórios </span>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" onclick="limpar_modal()" class="btn btn-outline-secondary"><i class="bi bi-arrow-clockwise"></i> Limpar</button>
                        <button type="button" class="btn salvar" style="background-color: #054F77; color: white;" id="salvar"><i class="bi bi-save"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        background-color: #d3d3d3;
        border-radius: 15px;
    }

    h1 {
        color: white;
        font-size: 2rem;
    }

    .modal-header {
        border-bottom: 2px solid #054F77;
    }

    .modal-body {
        font-size: 16px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
        font-size: 15px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #003B5C;
        box-shadow: 0 0 5px rgba(0, 59, 92, 0.5);
    }

    .btn-outline-secondary {
        border-radius: 10px;
        padding: 10px 20px;
    }

    .btn {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
    }

    .btn-close {
        background-color: transparent;
        border: none;
    }

    .btn-close:hover {
        background-color: #bfddf3;
        border-radius: 50%;
    }

    .modal-footer button {
        padding: 12px 25px;
    }

    .modal-title {
        font-size: 1.5rem;
    }

    /* Animations */
    .modal.fade .modal-dialog {
        transform: translate(0, -50px);
        transition: transform 0.3s ease;
    }

    .modal.fade.show .modal-dialog {
        transform: translate(0, 0);
    }

    .modal-content {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
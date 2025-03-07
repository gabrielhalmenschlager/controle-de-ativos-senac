$(document).ready(function () {
    $(".salvar").click(function () {
        let tipo = $("#tipo").val();
        let idTipo = $("#idTipo").val();

        $(".form-control, .form-select").removeClass("borda-vermelha");

        if(tipo == "") {
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Campo obrigatório!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500',
                confirmButtonText: 'OK'
            });

            $("#tipo").addClass("borda-vermelha");
            return false;
        }

        let acao;
        if (idTipo == "") {
            acao = 'inserir';
        } else {
            acao = 'update';
        }

        $.ajax({
            type: 'POST',
            url: "../controle/controle_tipo.php",
            data: {
                acao: acao,
                tipo: tipo,
                idTipo: idTipo
            },

            success: function (result) {
                Swal.fire({
                    icon: 'success',
                    title: '<span style="color: #FFA500;">' + result + '</span>',
                    background: '#F5F5F5',
                    color: '#054F77',
                    confirmButtonColor: '#FFA500',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: '<span style="color: #FFA500;">Erro ao realizar a operação!</span>',
                    text: xhr.responseText,
                    background: '#F5F5F5',
                    color: '#054F77',
                    confirmButtonColor: '#FFA500',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

function muda_status(statustipo, idTipo) {
    $.ajax({
        type: 'POST',
        url: "../controle/controle_tipo.php",
        data: {
            acao: 'alterar_status',
            status: statustipo,
            idTipo: idTipo
        },

        success: function (result) {
            Swal.fire({
                icon: 'success',
                title: '<span style="color: #FFA500;">' + result + '</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                location.reload();
            });
        }
    });
}

function editar(idTipo) {
    $('#idTipo').val(idTipo);

    $.ajax({
        type: 'POST',
        url: "../controle/controle_tipo.php",
        data: {
            acao: 'get_info',
            idTipo: idTipo
        },

        success: function (result) {
            let retorno = JSON.parse(result);

            $('#btn_modal').click();
            $("#tipo").val(retorno[0]['descricaoTipo']);
            $("#idTipo").val(retorno[0]['idTipo']);
        }
    });
}

function remover(idTipo) {
    Swal.fire({
        title: 'Tem certeza?',
        text: 'Você não poderá reverter isso!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FFA500',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: "../controle/controle_tipo.php",
                data: {
                    acao: 'remover',
                    idTipo: idTipo
                },
                success: function (result) {
                    Swal.fire({
                        icon: 'success',
                        title: '<span style="color: #FFA500;">' + result + '</span>',
                        background: '#F5F5F5',
                        color: '#054F77',
                        confirmButtonColor: '#FFA500',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }
    });
}

function limpar_modal() {
    $("#tipo").val('');
    $("#idTipo").val('');
    $(".form-control, .form-select").removeClass("borda-vermelha");
}

document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});

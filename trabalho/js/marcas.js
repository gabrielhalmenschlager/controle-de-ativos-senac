$(document).ready(function () {
    $(".salvar").click(function () {

        let marca = $("#marca").val();
        let idMarca = $("#idMarca").val();

        if(marca == "") {
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Campo obrigatório!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500'
            });
            return false;
        }

        if (idMarca == "") {
            acao = 'inserir';
        } else {
            acao = 'update';
        }

        $.ajax({
            type: 'POST',
            url: "../controle/controle_marca.php",
            data: {
                acao: acao,
                marca: marca,
                idMarca: idMarca
            },

            success: function (result) {
                Swal.fire({
                    icon: 'success',
                    title: '<span style="color: #FFA500;">' + result + '</span>',
                    background: '#F5F5F5',
                    color: '#054F77',
                    confirmButtonColor: '#FFA500'
                }).then(() => {
                    location.reload();
                });
            }
        });
    });
});

function muda_status(statusMarca, idMarca) {
    $.ajax({
        type: 'POST',
        url: "../controle/controle_marca.php",
        data: {
            acao: 'alterar_status',
            status: statusMarca,
            idMarca: idMarca
        },

        success: function (result) {
            Swal.fire({
                icon: 'success',
                title: '<span style="color: #FFA500;">' + result + '</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500'
            }).then(() => {
                location.reload();
            });
        }
    });
}

function editar(idMarca) {

    $('#idMarca').val(idMarca);

    $.ajax({
        type: 'POST',
        url: "../controle/controle_marca.php",
        data: {
            acao: 'get_info',
            idMarca: idMarca
        },

        success: function (result) {

            retorno = JSON.parse(result)

            $('#btn_modal').click();
            $("#marca").val(retorno[0]['descricaoMarca']);
            $("#idMarca").val(retorno[0]['idMarca']);

            console.log(retorno)
        }
    });

}

function remover(idMarca) {
    Swal.fire({
        title: 'Tem certeza?',
        text: 'Você não poderá reverter isso!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FFA500',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!',
        background: '#F5F5F5',
        color: '#054F77',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: "../controle/controle_marca.php", 
                data: {
                    acao: 'remover',
                    idMarca: idMarca
                },
                success: function (result) {
                    Swal.fire({
                        icon: 'success',
                        title: '<span style="color: #FFA500;">' + result + '</span>',
                        background: '#F5F5F5',
                        color: '#054F77',
                        confirmButtonColor: '#FFA500'
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }
    });
}


function limpar_modal() {a

    $("#marca").val('');
    $("#idMarca").val('');

}

document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});

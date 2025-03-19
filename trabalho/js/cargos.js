$(document).ready(function () {
    $(".salvar").click(function () {

        let idCargo = $("#idCargo").val();
        let descricaoCargo = $("#descricaoCargo").val();
        let statusCargo = $("#statusCargo").val();

        $(".form-control, .form-select").removeClass("borda-vermelha");
        $("#imgAtivo").removeClass("borda-vermelha");

        if (descricaoCargo == "") {
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Campo obrigatório!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500'
            });

            if (descricaoCargo == "") $("#descricaoCargo").addClass("borda-vermelha");
            return false;
        }

        if (idCargo == "") {
            acao = 'insert';
        } else {
            acao = 'update';
        }

        $.ajax({
            type: 'POST',
            url: "../controle/cargos_controle.php",
            data: {
                acao: acao,
                idCargo: idCargo,
                descricaoCargo: descricaoCargo,
                statusCargo: statusCargo
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

function muda_status(statusCargo, idCargo) {
    $.ajax({
        type: 'POST',
        url: "../controle/cargos_controle.php",
        data: {
            acao: 'alterar_status',
            statusCargo: statusCargo,
            idCargo: idCargo
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

function editar(idCargo) {

    $('#idCargo').val(idCargo);

    $.ajax({
        type: 'POST',
        url: "../controle/cargos_controle.php",
        data: {
            acao: 'get_info',
            idCargo: idCargo
        },

        success: function (result) {

            retorno = JSON.parse(result);

            $('#btn_modal').click();
            $("#idCargo").val(retorno[0]['idCargo']);
            $("#descricaoCargo").val(retorno[0]['descricaoCargo']);

            console.log(retorno);
        }
    });

}

function remover(idCargo) {
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
                url: "../controle/cargos_controle.php",
                data: {
                    acao: 'deletar_cargo',
                    idCargo: idCargo
                },
                success: function (result) {
                    Swal.fire({
                        icon: 'success',
                        title: '<span style="color: #FFA500;">' + result + '</span>',
                        background: '#F5F5F5',
                        color: '#054F77',
                        confirmButtonColor: '#FFA500',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }
    });
}

function limpar_modal() {
    $("#idCargo").val('');
    $("#descricaoCargo").val('');
}

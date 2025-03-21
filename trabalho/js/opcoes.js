$(document).ready(function () {
    $("#nivelOpcao").change(function () {

        let nivelOpcao = $(this).val() - 1;

        console.log(nivelOpcao);

        if (nivelOpcao == 0 || nivelOpcao == -1 || nivelOpcao == '') {
            $("#campoSuperior").hide();
            return;

        } else {
            $("#campoSuperior").show();
            carregarOpcoesSuperior(nivelOpcao);
        }
    });

    function carregarOpcoesSuperior(nivel) {
        $.ajax({
            type: 'POST',
            url: "../controle/opcoes_controle.php",
            data: { acao: 'get_opcoes_superior', nivelOpcao: nivel },

            success: function (result) {

                let options = JSON.parse(result);
                let select = $("#idSuperior");
                select.empty();

                select.append('<option selected value="">Selecione</option>');

                options.forEach(function (opcao) {
                    select.append('<option value="' + opcao.idOpcao + '">' + opcao.descricaoOpcao + '</option>');
                });
            }
        });
    }
});

$(document).ready(function () {
    $(".salvar").click(function () {

        let idOpcao = $("#idOpcao").val();
        let idSuperior = $("#idSuperior").val();
        let descricaoOpcao = $("#descricaoOpcao").val();
        let nivelOpcao = $("#nivelOpcao").val();
        let urlOpcao = $("#urlOpcao").val();
        let statusOpcao = $("#statusOpcao").val();

        $(".form-control, .form-select").removeClass("borda-vermelha");
        $("#imgAtivo").removeClass("borda-vermelha");

        if (descricaoOpcao == "" || nivelOpcao == "") {
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Campo obrigatório!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500'
            });

            if (descricaoOpcao == "") $("#descricaoOpcao").addClass("borda-vermelha");
            if (nivelOpcao == "") $("#nivelOpcao").addClass("borda-vermelha");
            return false;
        }

        if (idOpcao == "") {
            acao = 'insert';
        } else {
            acao = 'update';
        }

        $.ajax({
            type: 'POST',
            url: "../controle/opcoes_controle.php",
            data: {
                acao: acao,
                idOpcao: idOpcao,
                idSuperior: idSuperior,
                descricaoOpcao: descricaoOpcao,
                nivelOpcao: nivelOpcao,
                urlOpcao: urlOpcao
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

function muda_status(statusOpcao, idOpcao) {
    $.ajax({
        type: 'POST',
        url: "../controle/opcoes_controle.php",
        data: {
            acao: 'alterar_status',
            statusOpcao: statusOpcao,
            idOpcao: idOpcao
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

function editar(idOpcao) {

    $('#idOpcao').val(idOpcao);

    $.ajax({
        type: 'POST',
        url: "../controle/opcoes_controle.php",
        data: {
            acao: 'get_info',
            idOpcao: idOpcao
        },

        success: function (result) {

            retorno = JSON.parse(result)

            $('#btn_modal').click();
            $("#idOpcao").val(retorno[0]['idOpcao']);
            $("#descricaoOpcao").val(retorno[0]['descricaoOpcao']);
            $("#nivelOpcao").val(retorno[0]['nivelOpcao']);
            $("#urlOpcao").val(retorno[0]['urlOpcao']);

            console.log(retorno)
        }
    });

}

function remover(idOpcao) {
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
                url: "../controle/opcoes_controle.php",
                data: {
                    acao: 'deletar_opcao',
                    idOpcao: idOpcao
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

    $("#idOpcao").val('');
    $("#descricaoOpcao").val('');
    $("#nivelOpcao").val('');
    $("#urlOpcao").val('');
    $("#urlOpcao").val('');

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
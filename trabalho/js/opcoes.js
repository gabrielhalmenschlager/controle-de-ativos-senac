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
            exibeSuperior('opcao', retorno[0]['nivelOpcao'], retorno[0]['idSuperior'] )

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

function exibeSuperior(elemento, nivel = false,idSup = false) {
    if(nivel != false) {
        nivel = nivel;
    }else{
        nivel = elemento.value;
    }

    let nivelSuperior = nivel - 1;

    console.log(nivel);

    if (nivel == 1 || nivel == '') {
        $('.divSuperior').attr('style', 'display:none;');
    } else {
        $.ajax({
            type: 'POST',
            url: "../controle/opcoes_controle.php",
            data: {
                acao: 'busca_superior',
                nivelOpcao: nivelSuperior
            },
            success: function (result) {
                retorno = JSON.parse(result);
                let select = '<select class="form-select" id="idSuperior" name="idSuperior"><option value="">Selecione um Nível Superior</option>';
                $(retorno).each(function (index, element) {
                    if(idSup == element.idOpcao){
                    select += '<option value="' + element.idOpcao + '"selected>' + element.descricaoOpcao + '</option>';
                } else {
                    select += '<option value="' + element.idOpcao + '">' + element.descricaoOpcao + '</option>';
                }
            });
                select += "</select>";
                $('#select').html(select);
            }
        });
        $('.divSuperior').attr('style', 'display:block;');
    }
}

function limpar_modal() {

    $("#idOpcao").val('');
    $("#idSuperior").val('');
    $("#descricaoOpcao").val('');
    $("#nivelOpcao").val('');
    $("#urlOpcao").val('');
    $("#urlOpcao").val('');
    $('.divSuperior').attr('style', 'display:none;');
    $('#select').html('');

}

document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});
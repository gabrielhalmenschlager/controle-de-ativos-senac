$(document).ready(function () {
    $(".salvar").click(function () {

        let tipo = $("#tipo").val();
        let idTipo = $("#idTipo").val();

        if(tipo == "") {
            alert ("Campo obrigatório!");
            return false;
        }

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
                alert(result);
                location.reload();
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
            alert(result);
            location.reload();
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

            retorno = JSON.parse(result)

            $('#btn_modal').click();
            $("#tipo").val(retorno[0]['descricaoTipo']);
            $("#idTipo").val(retorno[0]['idTipo']);

            console.log(retorno)
        }
    });

}

function remover(idTipo) {
    if (confirm('Tem certeza de que deseja remover este tipo?')) {
        $.ajax({
            type: 'POST',
            url: "../controle/controle_tipo.php", 
            data: {
                acao: 'remover',
                idTipo: idTipo
            },
            success: function (result) {
                alert(result);
                location.reload();
            }
        });
    }
}

function limpar_modal() {

    $("#tipo").val('');
    $("#idTipo").val('');

}

document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});

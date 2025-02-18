$(document).ready(function () {
    $(".salvar").click(function () {

        let marca = $("#marca").val();
        let idMarca = $("#idMarca").val();

        if(marca == "") {
            alert ("Campo obrigatório!");
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
                alert(result);
                location.reload();
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
            alert(result);
            location.reload();
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
    if (confirm('Tem certeza de que deseja remover esta marca?')) {
        $.ajax({
            type: 'POST',
            url: "../controle/controle_marca.php", 
            data: {
                acao: 'remover',
                idMarca: idMarca
            },
            success: function (result) {
                alert(result);
                location.reload();
            }
        });
    }
}

function limpar_modal() {

    $("#marca").val('');
    $("#idMarca").val('');

}

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    });

$(document).ready(function () {
    $("#salvar_info").click(function () {
        let ativo = $("#ativo").val();
        let marca = $("#marca").val();
        let tipo = $("#tipo").val();
        let quantidade = $("#quantidade").val();
        let quantidadeMin = $("#quantidadeMin").val();
        let observacao = $("#observacao").val();
        let idAtivo = $("#idAtivo").val();

        let imgAtivo = $("#imgAtivo");
        let img = imgAtivo[0].files[0];

        if (ativo == "") {
            alert("Campo obrigatório!");
            return false;
        }

        let acao;
        if (idAtivo == "") {
            acao = 'inserir';
        } else {
            acao = 'update';
        }

        var formData = new FormData();
        formData.append('acao', acao);
        formData.append('ativo', ativo);
        formData.append('marca', marca);
        formData.append('tipo', tipo);
        formData.append('quantidade', quantidade);
        formData.append('quantidadeMin', quantidadeMin);
        formData.append('observacao', observacao);
        formData.append('idAtivo', idAtivo);
        formData.append('img', img);

        $.ajax({
            type: 'POST',
            url: "../controle/ativos_controller.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                alert(result);
                //location.reload();
            }
        });
    });
});

    function muda_status(status, idAtivo) {
        $.ajax({
            type: 'POST',
            url: "../controle/ativos_controller.php",
            data: {
                acao: 'alterar_status',
                status: status,
                idAtivo: idAtivo
            },

            success: function (result) {
                alert(result);
                location.reload();
            }
        });
    }

    function editar(idAtivo) {
        $('#idAtivo').val(idAtivo);

        $.ajax({
            type: 'POST',
            url: "../controle/ativos_controller.php",
            data: {
                acao: 'get_info',
                idAtivo: idAtivo
            },

            success: function (result) {
                retorno = JSON.parse(result);
                $('#btn_modal').click();
                $("#ativo").val(retorno[0]['descricaoAtivo']);
                $("#marca").val(retorno[0]['idMarca']);
                $("#tipo").val(retorno[0]['idTipo']);
                $("#quantidade").val(retorno[0]['quantidadeAtivo']);
                $("#quantidadeMin").val(retorno[0]['quantidadeMinAtivo']);
                $("#observacao").val(retorno[0]['observacaoAtivo']);

                if (retorno[0]['urlImagem'] != "") {
                    let imgPreview = $("#imgPreview");
                    let divPreview = $(".divPreview");
                    imgPreview.attr("src", window.location.protocol + "//" + window.location.host + '/' + retorno[0]['urlImagem']);
                    divPreview.attr("style", "display:block");
                } else {
                    divPreview.attr("style", "display:none");
                }
                console.log(retorno);
            }
        });
    }

    function remover(idAtivo) {
        if (confirm('Tem certeza de que deseja remover este ativo?')) {
            $.ajax({
                type: 'POST',
                url: "../controle/ativos_controller.php", 
                data: {
                    acao: 'remover',
                    idAtivo: idAtivo
                },
                success: function (result) {
                    alert(result);
                    location.reload();
                }
            });
        }
    }

    function limpar_modal() {
        $("#ativo").val('');
        $("#marca").val('');
        $("#tipo").val('');
        $("#quantidade").val('');
        $("#quantidadeMin").val('');
        $("#observacao").val('');
        $("#imgAtivo").val('');
        $("#idAtivo").val('');
        $(".divPreview").attr("style", "display:none")
    }

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    });
$(document).ready(function () {
    $("#salvar_info").click(function () {
        let ativo = $("#ativo").val();
        let marca = $("#marca").val();
        let tipo = $("#tipo").val();
        let quantidade = $("#quantidade").val();
        let quantidadeMin = $("#quantidadeMin").val();
        let observacao = $("#observacao").val();
        let idAtivo = $("#idAtivo").val();
        let observacaoQuantidade = $("#observacaoQuantidade").val();

        let imgAtivo = $("#imgAtivo");
        let img = imgAtivo[0].files[0];

        $(".form-control, .form-select").removeClass("borda-vermelha");
        $("#imgAtivo").removeClass("borda-vermelha");

        if (ativo == "" || marca == "" || tipo == "") {
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Campos obrigatórios não preenchidos!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500',
                confirmButtonText: 'OK'
            });

            if (ativo == "") $("#ativo").addClass("borda-vermelha");
            if (marca == "") $("#marca").addClass("borda-vermelha");
            if (tipo == "") $("#tipo").addClass("borda-vermelha");

            return false;
        }

        let acao;
        if (idAtivo == "") {
            acao = 'inserir';
        } else {
            acao = 'update';
        }

        if (!img && acao == 'inserir') {
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Imagem obrigatória não selecionada!</span>',
                background: '#F5F5F5',
                color: '#054F77',
                confirmButtonColor: '#FFA500',
                confirmButtonText: 'OK',
            });
            $("#imgAtivo").addClass("borda-vermelha");
            return false;
        }

        if (idAtivo !== "") {
            if ($("#quantidade").val() != $("#quantidade").data('original')) {
                if (observacaoQuantidade.trim() === "") {
                    alert('Por Favor, informe o motivo da alteração da quantidade');
                    return false;
                }
            }
        }

        if (idAtivo !== "") {
            if ($("#observacaoQuantidade").val() == $("#observacaoQuantidade").attr('original')) {
                Swal.fire({
                    icon: 'warning',
                    title: '<span style="color: #FFA500;">Negado, troque o motivo da troca</span>',
                    background: '#F5F5F5',
                    color: '#054F77',
                    confirmButtonColor: '#FFA500',
                    confirmButtonText: 'OK'
                });
            }
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
        formData.append('observacaoQuantidade', observacaoQuantidade);

        $.ajax({
            type: 'POST',
            url: "../controle/ativos_controller.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "<span style='color: #FFA500;'>Ativo cadastrado com sucesso</span>",
                    text: result,
                    background: "#F5F5F5",
                    color: "#054F77",
                    confirmButtonColor: "#FFA500",
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "<span style='color: #FFA500;'>Ocorreu um erro na operação.</span>",
                    text: xhr.responseText,
                    background: "#F5F5F5",
                    color: "#054F77",
                    confirmButtonColor: "#FFA500",
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    $("#quantidade").on('input', function () {
        let original = $(this).attr('original');
        let atual = $(this).val();
        if ($('.modal_info').attr('data-edita') == 'sim') {
            if (original !== undefined && atual != original) {
                $("#divObsQuant").attr('style', 'display:block');
                $("#observacaoQuantidade").prop('required', true);
            } else {
                $("#divObsQuant").slideUp();
                $("#observacaoQuantidade").prop('required', false);
            }
        }
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
            limpar_modal(true);
            $('#btn_limpaModal').attr('onclick','limpar_modal(true)');
            $("#ativo").val(retorno[0]['descricaoAtivo']);
            $("#marca").val(retorno[0]['idMarca']);
            $("#tipo").val(retorno[0]['idTipo']);
            $("#quantidade").val(retorno[0]['quantidadeAtivo']);
            $("#observacaoQuantidade").val(retorno[0]['observacaoQuantidade']);
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
            //$('.modal_info').attr('data-edita', 'sim');
            $('#quantidade').attr('original', (retorno[0]['quantidadeAtivo']));
            $('#observacaoQuantidade').attr('original', (retorno[0]['observacaoQuantidade']));
        }
    });
}

function remover(idAtivo) {
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
                url: "../controle/ativos_controller.php",
                data: {
                    acao: 'remover',
                    idAtivo: idAtivo
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

function infos(idAtivo) {
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
            $('#infos').click();
            $("#descricaoInfos").val(retorno[0]['descricaoAtivo']);
            $("#quantidadeInfos").val(retorno[0]['quantidadeAtivo']);
            $("#quantidadeMinInfos").val(retorno[0]['quantidadeMinAtivo']);
            $("#marcaInfos").val(retorno[0]['marca']);
            $("#tipoInfos").val(retorno[0]['tipo']);
            $("#observacaoInfos").val(retorno[0]['observacaoAtivo']);
            $("#dataInfos").val(retorno[0]['dataCadastro']);
            $("#usuarioInfos").val(retorno[0]['usuario']);
            if (retorno[0]['urlImagem']) {
                $("#previewImagemInfos").attr("src", window.location.protocol + "//" + window.location.host + '/' + retorno[0]['urlImagem']);
                $(".div_previer").attr('style', 'display:block');
            } else {
                $(".div_previer").attr('style', 'display:none');
            }
            console.log(result);
        }
    });
};

function limpar_modal(edita = false) {


    $("#ativo").val('');
    $("#marca").val('');
    $("#tipo").val('');
    $("#quantidade").val('');
    $("#quantidadeMin").val('');
    $("#observacaoQuantidade").val('');
    $("#observacao").val('');
    $("#imgAtivo").val('');
    $("#imgAtivo").val('');
    $("#idAtivo").val('');
    $(".divPreview").attr("style", "display:none");
    $(".form-control, .form-select").removeClass("borda-vermelha");

    if (edita == false) {
        $('.modal_info').attr('data-edita', 'nao');
        $("#divObsQuant").attr("style", "display:none");
    } else {
        $('.modal_info').attr('data-edita', 'sim'); 
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});

$(document).ready(function () {
    $("#salvar").click(function () {

        let idAtivo = $("#idAtivo").val();
        let tipoMovimentacao = $("#tipoMovimentacao").val();
        let quantidadeMov = $("#quantidadeMov").val();
        let localOrigem = $("#localOrigem").val();
        let localDestino = $("#localDestino").val();
        let descricaoMovimentacao = $("#descricaoMovimentacao").val();

        $(".form-control, .form-select").removeClass("borda-vermelha");

        if (idAtivo == "" || tipoMovimentacao == "" || quantidadeMov == "") {
            alert("Campos obrigatórios não preenchidos!");

            if (idAtivo == "") $("#idAtivo").addClass("borda-vermelha");
            if (tipoMovimentacao == "") $("#tipoMovimentacao").addClass("borda-vermelha");
            if (quantidadeMov == "") $("#quantidadeMov").addClass("borda-vermelha");

            return false;
        }

        $.ajax({
            type: 'POST',
            url: "../controle/controle_movimentacao.php",
            data: {
                idAtivo: idAtivo,
                tipoMovimentacao: tipoMovimentacao,
                quantidadeMov: quantidadeMov,
                localOrigem: localOrigem,
                localDestino: localDestino,
                descricaoMovimentacao: descricaoMovimentacao,

            },

            success: function (result) {
                alert(result);
                location.reload();
            }
        });
    });
});

function limpar_modal() {

    $("#ativo").val('');
    $("#tipoMovimentacao").val('');
    $("#quantidadeMov").val('');
    $("#localOrigem").val('');
    $("#localDestino").val('');
    $("#descricaoMovimentacao").val('');
    $(".form-control, .form-select").removeClass("borda-vermelha");

}
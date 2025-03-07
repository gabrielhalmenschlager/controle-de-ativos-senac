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
            Swal.fire({
                icon: 'warning',
                title: '<span style="color: #FFA500;">Campos obrigatórios não preenchidos!</span>',
                background: '#F5F5F5',  
                color: '#054F77',      
                confirmButtonColor: '#FFA500',
                confirmButtonText: 'OK'
            });

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
                Swal.fire({
                    icon: 'success',
                    title: '<span style="color: #FFA500;">Movimentação realizada com sucesso!</span>',
                    text: result,
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
                    title: '<span style="color: #FFA500;">Erro ao realizar a movimentação!</span>',
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

function limpar_modal() {
    $("#idAtivo").val('');
    $("#tipoMovimentacao").val('');
    $("#quantidadeMov").val('');
    $("#localOrigem").val('');
    $("#localDestino").val('');
    $("#descricaoMovimentacao").val('');
    $(".form-control, .form-select").removeClass("borda-vermelha");
}

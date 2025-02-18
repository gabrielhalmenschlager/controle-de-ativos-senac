$(document).ready(function () {
    let ativo = $("#ativo");
    let marca = $("#marca");
    let tipo = $("#tipo");

    const atualizarCampos = () => {
        const ativoValor = ativo.val();
        const marcaValor = marca.val();
        const tipoValor = tipo.val();

        if (ativoValor !== 'todos' && ativoValor !== '') {
            marca.prop('disabled', true);
            tipo.prop('disabled', true);
        } else if (marcaValor !== 'todas' && marcaValor !== '') {
            ativo.prop('disabled', true);
            tipo.prop('disabled', true);
        } else if (tipoValor !== 'todos' && tipoValor !== '') {
            ativo.prop('disabled', true);
            marca.prop('disabled', true);
        } else {
            ativo.prop('disabled', false);
            marca.prop('disabled', false);
            tipo.prop('disabled', false);
        }
    };

    ativo.change(atualizarCampos);
    marca.change(atualizarCampos);
    tipo.change(atualizarCampos);

    atualizarCampos();
});

function limpar_modal() {

    $("#ativo").prop('disabled', false);
    $("#marca").prop('disabled', false);
    $("#tipo").prop('disabled', false);
    $("#data_inicial").val('');
    $("#data_final").val('');
    $("#usuario").val('');
    $("#tipo_movimentacao").val('');

}

let table = new DataTable('#myTable');
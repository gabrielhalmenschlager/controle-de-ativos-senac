$(document).ready(function () {
    $(".salvarAcesso").click(function () {

        $inputs = $('.check');
        let array_acesso = {};
        $inputs.each(function(index, elemento) {

            if (!array_acesso[index]) {
                array_acesso[index] = {};
            }
            
            if ($(elemento).is(':checked')) {
                array_acesso[index]['idOpcao'] = $(elemento).val();
                array_acesso[index]['acesso'] = 'S';
            } else {
                array_acesso[index]['idOpcao'] = $(elemento).val();
                array_acesso[index]['acesso'] = 'N';
            }
            
        });

        cargo = $('#cargo').val();

        let array_dados = {};

        array_dados['acao'] = 'gravar_acesso';
        array_dados['cargo'] = cargo;
        array_dados['acessos'] = array_acesso;

        console.log(array_acesso);

        $.ajax({
            method: 'POST',
            url: "../controle/acessos_controller.php",
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(array_dados),
            success: function(result){
                location.reload();
                alert(result)
            }
        });
    });
});

function busca_acesso() {

    let cargo = $('#cargo').val();

    $('.check').each(function (index, acesso) {
        $(this).prop('checked', false);
    });

    $.ajax({
        type: 'POST',
        url: "../controle/acessos_controller.php",
        data: {
            acao: 'busca_acesso',
            cargo: cargo
        },

        success: function (result) {
            
            let retorno = JSON.parse(result);

            $(retorno).each(function (index, acesso) {

                if (acesso.statusAcesso == 'S') {
                    $('.' + acesso.idOpcao).prop('checked', true)
                } else {
                    $('.' + acesso.idOpcao).prop('checked', false)
                }
            });
            
        }
    });
}

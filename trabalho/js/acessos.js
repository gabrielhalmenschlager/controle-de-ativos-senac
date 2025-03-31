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
                alert(result)
            }
        });
    });
});

<?php 

class opcoes {

    public function insert($conexao, $descricaoOpcao, $nivelOpcao, $urlOpcao, $idUsuario) {    
        
        $query = " INSERT INTO opcoes_menu (
            descricaoOpcao,
            nivelOpcao,
            urlOpcao,
            statusOpcao,
            idUsuario,
            dataCadastroOpcao
        ) VALUES (
            '" . $descricaoOpcao . "',
            '" . $nivelOpcao . "',
            '" . $urlOpcao . "',
            'S',
            '" . $idUsuario . "',
            NOW()
        )";

        $result = mysqli_query($conexao, $query);

        if ($result) {
            $resultado = "Opção inserida com sucesso!";
        } else {
            $resultado = "Erro ao inserir a opção!";
        }
        return $resultado;
    }

    public function alterar_status($conexao, $statusOpcao, $idOpcao) {

        $sql = "UPDATE opcoes_menu SET statusOpcao = '$statusOpcao' WHERE idOpcao = $idOpcao";

        $result = mysqli_query($conexao, $sql) or die(false);

        if ($result) {
            $resultado = "Status alterado com sucesso!";;
        } else {
            $resultado = "Erro ao alterar status!";
        }
        return $resultado;

      }

      public function get_info($conexao, $idOpcao) {
        $sql = "
            SELECT 
                idOpcao,
                descricaoOpcao,
                nivelOpcao,
                urlOpcao,
                statusOpcao,
                idUsuario,
                dataCadastroOpcao,
                (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) as usuario
            FROM
                opcoes_menu a
            WHERE
                idOpcao = $idOpcao
        ";

        $result = mysqli_query($conexao, $sql);
        $opcao = $result->fetch_all(MYSQLI_ASSOC);

        $resultado = json_encode($opcao);
        return $resultado;
    }

    public function update($conexao, $idOpcao, $descricaoOpcao, $nivelOpcao, $urlOpcao) {
        $sql = "
            UPDATE 
                opcoes_menu 
            SET 
                descricaoOpcao = '$descricaoOpcao', 
                nivelOpcao = '$nivelOpcao', 
                urlOpcao = '$urlOpcao'
            WHERE 
                idOpcao = $idOpcao
        ";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo 'Informações alteradas com sucesso!';
    } else {
        echo 'Erro ao alterar informações!';
    }
    }
    
    public function deletar_opcao($conexao, $idOpcao) {
        $sql = "DELETE FROM opcoes_menu WHERE idOpcao = $idOpcao";
        
        $resultRemov = mysqli_query($conexao, $sql);
        
        if ($resultRemov) {
            $resultado = 'Opção removida com sucesso!';
        } else {
            $resultado = 'Erro ao remover opção!';
        }
        return $resultado;
    }

}
?>
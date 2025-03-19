<?php

class cargos {

    public function insert($conexao, $descricaoCargo, $idUsuario) {    
        $query = " INSERT INTO cargos (
            descricaoCargo,
            statusCargo,
            idUsuario,
            dataCadastroCargo
        ) VALUES (
            '" . $descricaoCargo . "',
            'S',
            '" . $idUsuario . "',
            NOW()
        )";

        $result = mysqli_query($conexao, $query);

        if ($result) {
            $resultado = "Cargo inserido com sucesso!";
        } else {
            $resultado = "Erro ao inserir o cargo!";
        }
        return $resultado;
    }

    public function alterar_status($conexao, $statusCargo, $idCargo) {
        $sql = "UPDATE cargos SET statusCargo = '$statusCargo' WHERE idCargo = $idCargo";
        $result = mysqli_query($conexao, $sql);

        if ($result) {
            $resultado = "Status alterado com sucesso!";
        } else {
            $resultado = "Erro ao alterar status!";
        }
        return $resultado;
    }

    public function get_info($conexao, $idCargo) {
        $sql = "
            SELECT 
                idCargo,
                descricaoCargo,
                statusCargo,
                idUsuario,
                dataCadastroCargo
            FROM
                cargos
            WHERE
                idCargo = $idCargo
        ";

        $result = mysqli_query($conexao, $sql);
        $cargo = $result->fetch_all(MYSQLI_ASSOC);

        $resultado = json_encode($cargo);
        return $resultado;
    }

    public function update($conexao, $idCargo, $descricaoCargo, $idUsuario) {
        $sql = "
            UPDATE 
                cargos 
            SET 
                descricaoCargo = '$descricaoCargo', 
                idUsuario = '$idUsuario'
            WHERE 
                idCargo = $idCargo
        ";

        $result = mysqli_query($conexao, $sql);

        if ($result) {
            echo 'Informações alteradas com sucesso!';
        } else {
            echo 'Erro ao alterar informações!';
        }
    }
    
    public function deletar_cargo($conexao, $idCargo) {
        $sql = "DELETE FROM cargos WHERE idCargo = $idCargo";
        
        $resultRemov = mysqli_query($conexao, $sql);
        
        if ($resultRemov) {
            $resultado = 'Cargo removido com sucesso!';
        } else {
            $resultado = 'Erro ao remover cargo!';
        }
        return $resultado;
    }
}
?>

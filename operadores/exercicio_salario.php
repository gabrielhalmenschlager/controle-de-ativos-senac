<?php

    // Define o salário inicial
    $salario = 3500.00;
    // Inicializa a alíquota e desconto do INSS
    $aliquota_inss = 0;
    $desconto_inss = 0;

    // Verifica a faixa salarial para aplicar a alíquota do INSS
    if ($salario <= 1412.00) {
        $aliquota_inss = 7.5; // Alíquota de 7.5%
        $desconto_inss = ($salario * $aliquota_inss) / 100; // Cálculo do desconto

    } else if ($salario <= 2666.68) {
        $aliquota_inss = 9.0; // Alíquota de 9%
        $desconto_inss = ($salario * $aliquota_inss) / 100; // Cálculo do desconto
    
    } else if ($salario <= 4000.03) {
        $aliquota_inss = 12.0; // Alíquota de 12%
        $desconto_inss = ($salario * $aliquota_inss) / 100; // Cálculo do desconto
    
    } else if ($salario <= 7786.02) {
        $aliquota_inss = 14.0; // Alíquota de 14%
        // Não calcula desconto aqui, pois não foi implementado

    }

    // Calcula o salário após o desconto do INSS
    $salarioResultadoInss = $salario - $desconto_inss;

    // Exibe os resultados do INSS
    echo "O salário é: " . $salario . "R$";
    echo "<br>A aliquota com o INSS é: " . $aliquota_inss . "%";
    echo "<br>O desconto com INSS é: " . $desconto_inss . "R$";
    echo "<br>O resultado do salário com o INSS é: ". $salarioResultadoInss . "R$";

    // Reutiliza a variável salário
    $salario = 3500;
    // Inicializa a alíquota e desconto do imposto de renda
    $aliquota_imposto = 0;
    $desconto_imposto = 0;

    // Verifica a faixa salarial para aplicar a alíquota do Imposto de Renda
    if ($salario <= 2259.20) {
        $aliquota_imposto = 0; // Sem desconto
        $desconto_imposto = ($salario * $aliquota_imposto) / 100; // Cálculo do desconto
    
    } else if ($salario <= 2826.65) {
        $aliquota_imposto = 7.5; // Alíquota de 7.5%
        $desconto_imposto = ($salario * $aliquota_imposto) / 100; // Cálculo do desconto
    
    } else if ($salario <= 3751.05) {
        $aliquota_imposto = 15; // Alíquota de 15%
        $desconto_imposto = ($salario * $aliquota_imposto) / 100; // Cálculo do desconto
    
    } else if ($salario <= 4664.68) {
        $aliquota_imposto = 22.5; // Alíquota de 22.5%
        $desconto_imposto = ($salario * $aliquota_imposto) / 100; // Cálculo do desconto

    } else if ($salario >= 4664.68) {
        $aliquota_imposto = 27.5; // Alíquota de 27.5%
        $desconto_imposto = ($salario * $aliquota_imposto) / 100; // Cálculo do desconto
    }

    // Calcula o salário após o desconto do Imposto de Renda
    $salarioResultadoImposto = $salario - $desconto_imposto;

    // Exibe os resultados do Imposto de Renda
    echo "<p>O salário é: " . $salario . "R$";
    echo "<br>A aliquota com o IR é: " . $aliquota_imposto . "%";
    echo "<br>O desconto com IR é: " . $desconto_imposto . "R$";
    echo "<br>O resultado do salário com o IR é: ". $salarioResultadoImposto . "R$";

?>

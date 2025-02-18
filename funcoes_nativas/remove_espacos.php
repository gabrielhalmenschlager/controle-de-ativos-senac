<?php

$texto = "-     Hoje o dia é quarta-feira     -";
$tira_espaco_esquerda = ltrim($texto); // Retira espaços a esquerda
$tira_espaco_direita = rtrim($texto); // Retira espaços a direita
$tira_espaco_inicio_fim = trim($texto); // Retira espaços no inicio e no fim

echo $tira_espaco_inicio_fim;
echo "<br>";
echo $tira_espaco_esquerda;
echo "<br>";
echo $tira_espaco_direita;
echo "<br>";
echo $texto;

?>

<?php

$frase = "O dia está ensolarado";

$fraseSemEspacos = str_replace(' ', '', $frase);

$tamanho = strlen($fraseSemEspacos);

echo "A frase é: " . $frase . "<br>";
echo "A frase sem espaços é: " . $fraseSemEspacos . "<br>";
echo "O tamanho da frase é: " . $tamanho . "<br>";

if ($tamanho > 10) {
    $resultado = substr($fraseSemEspacos, 0, 10);
    echo "As 10 primeiras letras: " . $resultado;

} else if ($tamanho < 10) {
    $resultado = substr($fraseSemEspacos, -5);
    echo "As 5 últimas letras: " . $resultado;

} else {
    echo "O comprimento da string é exatamente 10 caracteres.";
}   

?>
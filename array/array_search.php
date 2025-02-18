<?php 

$array = array("verde", "azul", "roxo", "preto");
$procura = array_search("preto", $array);

if ($procura !== false) {
    echo "Encontrou";
} else {
    echo "Nao encontrou";
}

echo "<pre>";
print_r($procura);
echo "</pre>";

?>

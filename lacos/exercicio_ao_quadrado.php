<?php

$i = 1;

echo "Usando WHILE<br>";
while ($i <= 30) {
    echo "O quadrado de " . $i . " é " . ($i * $i) . "<br>";
    $i++;
}

echo "<p>Usando FOR<br>";
for ($i = 1; $i <= 30; $i++) {
    echo "O quadrado de " . $i . " é " . ($i * $i) . "<br>";
}

?>
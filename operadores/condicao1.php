<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condição</title>

<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    h1 {
        color: #2c3e50;
        margin-bottom: 20px;
    }

</style>

</head>
<body>

    <h1>Condição</h1>   

    <?php

    $a = 3;
    $b = 4;

    if ($a > $b) {
        echo "A maior que B";
    } else if ($a == $b) {
        echo "A igual a B";
    } else {
        echo "B maior que A";
    }

?>
    
</body>
</html>


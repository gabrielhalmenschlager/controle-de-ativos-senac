<?php
$pesquisa = "Iphone";
$url = "https://api.mercadolibre.com/sites/MLB/search?q=" . urlencode($pesquisa);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$data = json_decode($output, true);
?>
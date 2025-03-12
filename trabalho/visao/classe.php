<?php

class Caneta
{
    public $cor;
    public $tem_tinta;
    public $ponta;
    public $tampada;

    public function escrever()
    {
        if ($this->tampada == "S") {
            echo "Caneta não pode escrever por estar tampada" . "<br>";
        } else if ($this->tem_tinta == "N") {
            echo "Caneta não pode escrever por estar sem tinta" . "<br>";
        } else {
            echo "Escrever" . "<br>";
        }
    }
    public function tampar()
    {
        $this->tampada = "S";
        echo "Caneta Tampada" . "<br>";
    }

    public function destampar()
    {
        $this->tampada = "N";
        echo "Caneta Destampada" . "<br>";
    }
}

$caneta1 = new Caneta();
$caneta1->cor = 'Verde';
$caneta1->tem_tinta = "S";
$caneta1->ponta = 0.9;
$caneta1->escrever();
$caneta1->tampar();
$caneta1->escrever();
$caneta1->destampar();
$caneta1->tem_tinta = "N";
$caneta1->escrever();

echo '<pre>';
var_dump($caneta1);
echo '</pre>';

$caneta2 = new Caneta();
$caneta2->cor = 'Vermelha';
$caneta2->tem_tinta = "S";
$caneta2->ponta = 0.5;
$caneta1->escrever();
$caneta1->destampar();

echo '<pre>';
var_dump( $caneta2);
echo '</pre>';
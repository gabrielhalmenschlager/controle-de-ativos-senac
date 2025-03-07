<?php

class Caneta
{
    public $cor;
    public $tem_tinta;
    public $ponta;

    public function escrever(){
        var_dump($this->tem_tinta);
        echo "Escrever" . "<br>";
    }
    public function tampar(){
        echo "Caneta Tampada" . "<br>";
    }

    public function destampar(){
        echo "Caneta Destampada" . "<br>";
    }
}

$caneta1 = new Caneta();
$caneta1->cor = 'Verde';
$caneta1->tem_tinta = true;
$caneta1->ponta = 0.9;
$caneta1->escrever();
$caneta1->tampar();

$caneta2 = new Caneta();
$caneta2->cor = 'Vermelha';
$caneta2->tem_tinta = false;
$caneta2->ponta = 0.5;
$caneta1->escrever();
$caneta1->destampar();

echo '<pre>';
var_dump($caneta1, $caneta2);

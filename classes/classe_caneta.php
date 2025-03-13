<?php

class Caneta
{
    private $cor;
    private $tem_tinta;
    private $ponta;
    private $tampada;

    public function __construct($cor, $tem_tinta, $ponta, $tampada) {
        $this->setCor($cor);
        $this->setTinta($tem_tinta);
        $this->setPonta($ponta);
        $this->setTampar($tampada);
    }

    public function getCor(){
        return $this->cor;
    }

    public function getTinta(){
        return $this->tem_tinta;
    }

    public function getPonta(){
        return $this->ponta;
    }

    public function getTampar(){
        return $this->tampada;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function setTinta($tem_tinta){
        $this->tem_tinta = $tem_tinta;
    }

    public function setPonta($ponta){
        $this->ponta = $ponta;
    }

    public function setTampar($tampada){
        $this->tampada = $tampada;
    }

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

$caneta1 = new Caneta('Verde','S',"0.9","N");
$caneta1->escrever();
$caneta1->tampar();
$caneta1->escrever();
$caneta1->destampar();
$caneta1->escrever();

echo '<pre>';
var_dump($caneta1);
echo '</pre>';
?>

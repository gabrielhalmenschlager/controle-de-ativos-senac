<?php

class Carro2
{
    private $cor;
    private $marca;
    private $modelo;
    private $porta;
    private $movimento;

    public function __construct($cor, $marca, $modelo, $porta) {
        $this->cor = $cor;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->porta =$porta;
    }

    public function getCor(){
        return $this->cor;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getPorta(){
        return $this->porta;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setPorta($porta) {
        $this->porta = $porta;
    }

    public function abrirPorta() {
        if ($this->movimento) {
            echo "Não é possível abrir a porta com o carro em movimento!<br>";
        } else {
            $this->porta = true;
            echo "Porta aberta.<br>";
        }
    }

    public function fecharPorta(){
        $this->porta = false;
        echo "Porta fechada.<br>";
    }

    public function andar() {
        if ($this->porta) {
            echo "Não é possível andar com a porta aberta!<br>";
        } else {
            $this->movimento = true;
            echo "O carro está em movimento.<br>";
        }
    }

    public function parar() {
        $this->movimento = false;
        echo "O carro parou.<br>";
    }
}

    $meuCarro2 = new Carro2("Preto", "Volks", "Nivus",true);
    $meuCarro2->abrirPorta();
    $meuCarro2->andar();      
    $meuCarro2->fecharPorta();
    $meuCarro2->andar();      
    $meuCarro2->abrirPorta();  
    $meuCarro2->parar();       
    $meuCarro2->abrirPorta();

?>

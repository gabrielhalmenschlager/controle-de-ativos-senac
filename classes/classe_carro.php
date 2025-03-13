<?php

class Carro
{
    private $cor;
    private $marca;
    private $modelo;
    private $porta;
    private $movimento;

    public function __construct($cor, $marca, $modelo, $porta) {
        $this->setCor($cor);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setPorta($porta);
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

    $meuCarro = new Carro("Branco", "Volks", "Jetta",true);
    $meuCarro->abrirPorta();
    $meuCarro->andar();      
    $meuCarro->fecharPorta();
    $meuCarro->andar();      
    $meuCarro->abrirPorta();  
    $meuCarro->parar();       
    $meuCarro->abrirPorta();

?>

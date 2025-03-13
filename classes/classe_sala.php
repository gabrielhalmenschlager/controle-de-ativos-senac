<?php

class SalaDeAula
{
    public $capacidade;
    public $totalOcupantes;
    public $reservada;
    public $aberta;

    public function entrarSala()
    {
        if ($this->totalOcupantes >= $this->capacidade) {
            echo "A sala está cheia." . "<br>";
        } else if (!$this->aberta) {
            echo "A sala não está aberta." . "<br>";
        } else if ($this->reservada) {
            echo "A sala não está disponível, está reservada." . "<br>";
        } else {
            $this->totalOcupantes++;
            echo "Uma pessoa entrou na sala. Total de ocupantes: $this->totalOcupantes." . "<br>";
        }
    }

    public function sairSala()
    {
        if ($this->totalOcupantes > 0) {
            $this->totalOcupantes--;
            echo "Uma pessoa saiu da sala. Total de ocupantes: $this->totalOcupantes." . "<br>";
        } else {
            echo "Não há ocupantes na sala." . "<br>";
        }
    }

    public function abrirSala()
    {
        $this->aberta = true;
        echo "A sala foi aberta." . "<br>";
    }

    public function fecharSala()
    {
        $this->aberta = false;
        echo "A sala foi fechada." . "<br>";
    }

    public function reservarSala()
    {
        if ($this->reservada) {
            echo "A sala já está reservada." . "<br>";
        } else {
            $this->reservada = true;
            echo "A sala foi reservada." . "<br>";
        }
    }

    public function cancelarReserva()
    {
        if (!$this->reservada) {
            echo "A sala não está reservada." . "<br>";
        } else {
            $this->reservada = false;
            echo "A reserva da sala foi cancelada." . "<br>";
        }
    }
}

$sala1 = new SalaDeAula();
$sala1->capacidade = 10;
$sala1->reservada = false; 
$sala1->totalOcupantes = 0;
$sala1->aberta = false;    
$sala1->abrirSala();
$sala1->entrarSala();
$sala1->sairSala();
$sala1->fecharSala();
$sala1->entrarSala();
$sala1->reservarSala();
$sala1->cancelarReserva();

echo '<pre>';
var_dump($sala1);
echo '</pre>';

?>

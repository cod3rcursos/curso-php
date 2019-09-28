<div class="titulo">Polimorfismo</div>

<?php

abstract class Comida {
    public $peso;
}

class Arroz extends Comida {
    
}

class ArrozAGrega extends Arroz {
    
}

class Feijao extends Comida {

}

class Sorvete extends Comida {

}

class Pessoa {
    public $peso;

    function __construct($peso) {
        $this->peso = $peso;
    }

    public function comer(Comida $comida) {
        $this->peso += $comida->peso;
    }
}

$c1 = new Arroz();
$c1->peso = 0.65;

$c2 = new ArrozAGrega();
$c2->peso = 0.25;

$c3 = new Sorvete();
$c3->peso = 1.5;

$p = new Pessoa(83.45);
$p->comer($c1);
$p->comer($c2);
$p->comer($c3);

echo $p->peso;
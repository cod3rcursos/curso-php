<div class="titulo">Classe Data</div>

<?php
class Data {
    public $dia = 1;
    public $mes = 1;
    public $ano = 1970;

    public function apresentar() {
        return "{$this->dia}/{$this->mes}/{$this->ano}";
    }
}

$aniversario = new Data;
$aniversario->dia = 15;
$aniversario->mes = 8;
$aniversario->ano = 2014;

$casamento = new Data();
$casamento->dia = 1;
$casamento->mes = 8;
$casamento->ano = 2009;

echo $aniversario->apresentar(), '<br>';
echo $casamento->apresentar();
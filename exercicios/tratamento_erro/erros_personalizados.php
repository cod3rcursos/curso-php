<div class="titulo">Erros Personalizados</div>

<?php
class FaixaEtariaException extends Exception {
    public function __construct($message, $code = 0,
        $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

function calcularTempoAposentadoria($idade) {
    if($idade < 18) {
        throw new FaixaEtariaException(
            'Ainda está muito longe');
    }

    if($idade > 70) {
        throw new FaixaEtariaException(
            'Já deveria estar aposentado');
    }
    
    return 70 - $idade;
}

$idadesAvaliadas = [15, 30, 60, 80];

foreach($idadesAvaliadas as $idade) {
    try {
        $tempoRestante = calcularTempoAposentadoria($idade);
        echo "Idade: $idade, $tempoRestante anos restantes<br>";
    } catch(FaixaEtariaException $e) {
        echo "Não foi possível calcular para $idade anos.<br>";
        echo "Motivo: {$e->getMessage()}<br>";
    }
}

echo "Fim!";
<div class="titulo">Map & Filter</div>

<?php
$notas = [5.8, 7.3, 9.8, 6.7];
$notasFinais1 = [];

foreach($notas as $nota) {
    $notasFinais1[] = round($nota);
}

print_r($notasFinais1);

echo '<br>';
$notasFinais2 = array_map(round, $notas);
print_r($notasFinais2);

$apenasOsAprovados1 = [];
foreach($notas as $nota) {
    if($nota >= 7) {
        $apenasOsAprovados1[] = $nota;
    }
}

echo '<br>';
print_r($apenasOsAprovados1);

function aprovados($nota) {
    return $nota >= 7;
}

echo '<br>';
$apenasOsAprovados2 = array_filter($notas, aprovados);
print_r($apenasOsAprovados2);

function calculoLegal($nota) {
    $notaFinal = round($nota) + 1;
    return $notaFinal > 10 ? 10 : $notaFinal;
}

echo '<br>';
$notasFinais3 = array_map(calculoLegal, $notas);
print_r($notasFinais3);
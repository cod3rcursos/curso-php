<div class="titulo">While/Do While</div>

<?php
const VALOR_LIMITE = 5;
$contador = 0;

while($contador < VALOR_LIMITE) {
    echo "while $contador <br>";
    $contador++;
}

$contador = 100;
do {
    echo "do-while $contador <br>";
    $contador++;
} while($contador < VALOR_LIMITE);

$contador = 0;
while(true) {
    echo "while(true) $contador <br>";
    $contador++;
    if($contador >= VALOR_LIMITE) break;
}
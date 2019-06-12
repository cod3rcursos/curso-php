<div class="titulo">Retornando Função</div>

<?php
function soma($a) {
    // algoritmo (30s)
    return function($b) use ($a) {
        return $a + $b; // 3s
    };
}

echo soma(13)(3);

$doisMais = soma(2);
echo '<br>', $doisMais(10);
echo '<br>', $doisMais(18);
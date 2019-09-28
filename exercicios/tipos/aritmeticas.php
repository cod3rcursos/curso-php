<div class="titulo">Operações Aritméticas</div>

<?php
echo 1 + 1, '<br>';
var_dump(1 + 1);
echo '<br>';
echo 1 + 2.5, '<br>';
echo 10 - 2, '<br>';
echo 2 * 5, '<br>';
echo 7 / 4, '<br>';
echo intdiv(7, 4), '<br>';
echo round(7 / 4), '<br>';
echo 7 % 4, '<br>';
echo 7 % 2, '<br>';
echo 8 % 2, '<br>';
echo 7 / 0, '<br>';
// echo intdiv(7, 0); # erro!
echo 4 ** 2, '<br>';

// Precedência de operadores:
// () => ** => / * % => + -
echo '<p>Precedência</p>';
echo 2 + 3 * 4, '<br>';
echo (2 + 3) * 4, '<br>';
echo 2 + 3 * 4 ** 2, '<br>';
echo ((2 + 3) * 4) ** 2;
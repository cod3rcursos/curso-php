<div class="titulo">Desafio Equação</div>

<?php

$numA = (6 * (3 + 2)) ** 2;
$denA = 3 * 2;

$numB = (1 - 5) * (2 - 7);
$denB = 2;

$superiorA = $numA / $denA;
$superiorB = ($numB / $denB) ** 2;

$superior = ($superiorA - $superiorB) ** 3;
$inferior = 10 ** 3;

$final = $superior / $inferior;
echo "O resultado final é " . $final . ".";

<div class="titulo">If Else</div>

<?php
if(true) {
    echo "Serei impresso?<br>";
}

if(false) {
    echo "Verdadeiro - Parte A<br>";
    echo "Verdadeiro - Parte B<br>";
} else {
    echo "Falso - Parte A<br>";
    echo "Falso - Parte B<br>";
}

if(false) {
    echo "Passo A<br>";
} else if(false) {
    echo "Passo B<br>";
} elseif(false) {
    echo "Passo C<br>";
} elseif(false) {
    echo "Passo D<br>";
} elseif(false) {
    echo "Passo E<br>";
} else {
    echo "Úlitmo Passo<br>";
}

echo "Fim<br>";
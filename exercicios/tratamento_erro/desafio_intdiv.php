<?php
namespace Aritmetica;

class NaoInteiroException extends \Exception {

}

function intdiv($a, $b) {
    if($b == 0) {
        throw new \DivisionByZeroError();
    }

    if($a % $b > 0) {
        throw new NaoInteiroException();
    }
    
    return $a / $b;
}
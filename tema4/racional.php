<?php

class Racional
{
    private $numerador;
    private $denominador;

    public function __construct($numerador, $denominador)
    {
        $this->numerador = $numerador;
        if ($denominador == 0) $this->denominador = 1;
        else $this->denominador = $denominador;
    }

    
    public static function crearRacional($numerador, $denominador)
    {
        return new Racional($numerador, $denominador);
    }

    
    public function getNumerador()
    {
        return $this->numerador;
    }

    public function setNumerador($numerador)
    {
        $this->numerador = $numerador;
    }

    
    public function getDenominador()
    {
        return $this->denominador;
    }

    public function setDenominador($denominador)
    {
        if ($denominador != 0) {
            $this->denominador = $denominador;
        }
    }

    
    public function __add(Racional $otro)
    {
        $numerador = $this->numerador * $otro->getDenominador() + $otro->getNumerador() * $this->denominador;
        $denominador = $this->denominador * $otro->getDenominador();
        return new Racional($numerador, $denominador);
    }

    public function __sub(Racional $otro)
    {
        $numerador = $this->numerador * $otro->getDenominador() - $otro->getNumerador() * $this->denominador;
        $denominador = $this->denominador * $otro->getDenominador();
        return new Racional($numerador, $denominador);
    }

    public function __mul(Racional $otro)
    {
        $numerador = $this->numerador * $otro->getNumerador();
        $denominador = $this->denominador * $otro->getDenominador();
        return new Racional($numerador, $denominador);
    }

    public function __div(Racional $otro)
    {
        $numerador = $this->numerador * $otro->getDenominador();
        $denominador = $this->denominador * $otro->getNumerador();
        return new Racional($numerador, $denominador);
    }

    
    public function esIgual(Racional $otro)
    {
        return ($this->numerador * $otro->getDenominador() == $otro->getNumerador() * $this->denominador);
    }

    
    public function copia()
    {
        return clone $this;
    }

    
    public function setRacional($numerador, $denominador)
    {
        $this->numerador = $numerador;
        if ($denominador == 0) $this->denominador = 1;
        else $this->denominador = $denominador;
    }

    
    public function calculaReal()
    {
        return $this->numerador / $this->denominador;
    }

    
    public function __toString()
    {
        echo "{$this->numerador}\n";
        echo "----------\n";
        echo "{$this->denominador}\n";
    }
}


$r1 = new Racional(6,9);
$r2 = new Racional(1,7);

$suma = $r1 + $r2;
$resta = $r1- $r2;
$multiplicacion = $r1 *($r2);
$division = $r1/($r2);

echo $suma;
echo "\n";

echo $resta;
echo "\n";

echo $multiplicacion;
echo "\n";

echo $division;
echo "\n";

echo $r1->esIgual($r2);
echo $r1->calculaReal();    

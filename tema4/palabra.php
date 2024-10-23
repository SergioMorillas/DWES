<?php

class Palabra
{
    private $texto;

    public function __construct($texto)
    {
        $this->texto = $texto;
    }

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**Verifica si la palabra es un palíndromo (es igual al revés). No se deben tener en cuenta los espacios.*/
    public function esPalindromo(){
        $aux = str_replace(" ", "", $this->texto);
        $aux = str_replace(",", "", $this->texto);
        return (strrev($aux) == $aux);
    }
    /**Devuelve la palabra invertida.*/
    public function invertir(){
        return strrev($this->texto);
    }
    /**Retorna el número de vocales en la palabra.*/
    public function contarVocales(){
        return strlen($this->texto)-strlen(preg_replace("/[aeiou]/i", "", $this->texto));
    }
    /**Retorna el número de consonantes en la palabra.*/
    public function contarConsonantes(){
        return strlen(preg_replace("/[^b-df-hj-np-tv-z]/i", "", $this->texto));
    }
    /**Convierte la palabra a mayúsculas.*/
    public function mayusculas(){
        return strtoupper($this->texto);
    }
    /**Convierte la palabra a minúsculas.*/
    public function minusculas(){
        return strtolower($this->texto);
    }
    /**Reemplaza todas las vocales de la palabra con el carácter que se le pase como argumento.*/
    public function reemplazarVocales($caracter){
        return preg_replace("([aeiou])", $caracter, $this->texto);
    }
    /**Retorna la longitud de la palabra.*/
    public function longitud(){
        return strlen($this->texto);
    }
    /**Verifica si la palabra contiene un carácter específico.*/
    public function contieneCaracter($caracter){
        return str_contains($this->texto, $caracter);
    }
    /**Reemplaza todas las apariciones de un carácter por otro en la palabra.*/
    public function reemplazarCaracter($buscar, $reemplazar){
        return preg_replace($buscar, $caracter, $this->texto);
    }

}
// echo strlen(preg_replace("([aeiou])", "", "patatas"))-strlen("patatas");
$palabra = new Palabra("me gustan las patatas");
$palindromo = new Palabra("aassdada!???!");

var_dump($palindromo->contarConsonantes());


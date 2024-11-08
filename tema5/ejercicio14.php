<!-- EJERCICIO 14: Nuestra propia ordenación del array
Realizar un ejercicio en php que permita la ordenación de un array de palabras.
La ordenación debe hacerse por tamaño de las palabras. Para ello deberás usar la
función usort().
Ejemplo:
Si: $v = ["hola", "adios", "aaaaa", "ab", "z"];
Salida: ["z", "ab", "hola", "aaaaa", "adios"] -->
<?php

$v = ["hola", "adios", "aaaaa", "ab", "z","zulo","pata","cata"];

usort($v, function($a,$b){
    $alen= strlen($a);
    $blen = strlen($b);
    
    // Si tienen la misma cantidad de caracteres hacemos el if
    if($alen==$blen) return $a<=>$b; // Y devolvemos la ordenación natural
    // Si tienen distinta cantidad de caracteres hacemos el else
    else return $alen-$blen; // Y devolvemos el que menos tenga como primero 
});
print_r($v);
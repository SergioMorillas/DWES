<!-- EJERCICIO 14: Nuestra propia ordenación del array
Realizar un ejercicio en php que permita la ordenación de un array de palabras.
La ordenación debe hacerse por tamaño de las palabras. Para ello deberás usar la
función usort().
Ejemplo:
Si: $v = ["hola", "adios", "aaaaa", "ab", "z"];
Salida: ["z", "ab", "hola", "aaaaa", "adios"] -->
<?php

$v = ["hola", "adios", "aaaaa", "ab", "z"];

usort($v, function($a,$b){
    $alen= strlen($a);
    $blen = strlen($b);
    if(($alen<=>$blen) == 0){ // Si tienen la misma cantidad de caracteres hacemos el if
        return $a<=>$b; // Y devolvemos la ordenación natural
    } else { // Si tienen distinta cantidad de caracteres hacemos el else
        return $alen<=>$blen; // Y devolvemos el que menos tenga como primero 
    }
});
print_r($v);
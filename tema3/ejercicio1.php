<!-- EJERCICIO 1: Comparación de tres números
Escribe un programa en PHP que solicite al usuario tres números y determine cuál de ellos es el mayor. Si los tres números son iguales, debe indicarlo también. El programa debe imprimir cuál es el mayor de los tres números o si son iguales. -->

<?php

$primero = readline("Introduce el primer numero");
$segundo = readline("Introduce el segundo numero");
$tercero = readline("Introduce el tercero numero");
$numeros = array($primero, $segundo, $tercero);
sort($numeros);
echo implode("", $numeros);

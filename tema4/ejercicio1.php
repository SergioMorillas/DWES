<!-- EJERCICIO 1: Inclusión de funciones
Realiza las siguientes actividades:
Escribe varios ficheros php que sirvan en lo sucesivo de librerías de funciones. Por ejemplo, puedes crear un fichero llamado lib_mates.php: para funciones que trabajen con números; lib_strings.php: para las funciones que trabajen con cadenas, lib_htmlbody.php para incorporar la parte inicial del código de la página HTML …
Crear ahora una página php llamada ejer1.php que incluya alguna de estas librerías para la inclusión de su código o la llamada a una función que desea reutilizar.
Comprueba en ejer1.php si una función existe en las librerías o no (usando function_exits). Si no recuerdas cómo funciona puedes ir a la documentación php.net. -->
<?php
include("lib_math.php");
include("lib_vector.php");


//print_r(sumaIndefinida(1,2,3,4,5,6,7,8,9,10)); // 11*5 segun la suma de Gauss
//print_r(mediaIndefinida(1,2,3,4,5,6,7,8,9,10));
// print_r(elevadoRecursivo(5, 10));
// print_r(sumaMediaIndefinida(1,2,3,4,5,6,7,8,9,10));
// print_r(dameDivisores(126));
// var_dump(esDivisor(2,162));
// print_r(damePrimos(11, 20));
// print_r(sumaPrimos(11, 20));
// for ($i = 0; $i < 100; $i++) {
//     if (esPrimo($i)) {
//         echo "El numero $i es primo\n";
//     } else {
//         echo "El numero $i no es primo\n";
//     }
// }
// if (function_exists("damePrimos")) {
//     echo "La funcion existe";
// } else {
//     echo "La funcion no existe";
// }

// if (function_exists("salchichon")) {
//     echo "La funcion existe";
// } else {
//     echo "La funcion no existe";
// }

divisoresPrimos(100);
// echo elevadoRecursivo(2,2);
// echo binarioRecursivo(1) . "\n";
// echo binarioRecursivo(2) . "\n";
// echo binarioRecursivo(4) . "\n";
// echo binarioRecursivo(7) . "\n";
// echo binarioRecursivo(12);

// echo generaGrafico();

?>
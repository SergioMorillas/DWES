<!-- EJERCICIO 6. El operador ==
Comprueba los resultados del uso de los operadores ‘==’ y corrige los errores que aparecen en el siguiente código: -->


<?php

var_dump(1 == "1asdasd");   // ==> false
var_dump(0 == "a");   // ==> false
var_dump('a' == 0);    // ==> false
var_dump("1" == "01");   // ==> true
var_dump("1" == "1hfsadfa");   // ==> false
var_dump(null == "1dfasdf");   // ==> false
var_dump(true == "1asdfasdf");   // ==> true
var_dump(false == "0");   // ==> false

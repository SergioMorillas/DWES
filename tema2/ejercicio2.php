<!-- EJERCICIO 2. Arrays
Siga las siguientes instrucciones:
Crea un archivo PHP llamado ejercicio2.php.
Crea una matriz llamada $fruits que contenga cinco tipos de frutas.
Imprime el tercer elemento de la matriz.
Modifica el segundo elemento de la matriz.
Muestra dicho elemento modificado.
Intenta mostrar un elemento del array, indicando un índice que no exista. ¿Qué mensaje te muestra de error? ¿Es comprensible?  

Warning: Undefined array key 30 in ejercicio2.php on line 15 
Si, es un mensaje comprensible ya que dice claramente que la clave 30 no esta definida en el array, en la clase ejercicio2.php en la linea 15, datos que pueden ser muy utiles para programas complejos.

-->

<?php
$fruits = array("pera","manzana","albaricoque","sandia","melon");

echo $fruits[4]."\n";

echo $fruits[3]."\n";

$fruits[3] = "tomate";

echo $fruits[3]."\n";

echo $fruits[30]."\n";

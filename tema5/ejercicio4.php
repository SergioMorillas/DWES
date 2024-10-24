<!-- EJERCICIO 4: Recorrido de arrays asociativos I
Rellena un array de 100 elementos de manera aleatoria con valores M o F (por
ejemplo ["M", "M", "F", "M", ...]). Una vez completado, vuelve a recorrerlo y
calcula cuántos elementos hay de cada uno de los valores almacenando el
resultado en un array asociativo ['M' => 44, 'F' => 66] (no utilices variables
para contar las M o las F, es decir la cuenta guardarla directamente en el array
asociativo). Finalmente, muestra el resultado por pantalla
F = 70
M = 77
-->
<?php
function letraFoM(){
    return rand(0, 1) ? 'F' : 'M';
}
    $arrayAsociativo = ["F" => 0, "M" => 0];
for ($i = 0; $i < 100; $i++) {//Creamos el array de 100 letras y añadimos las F y las M al array asociativo
    $array[$i] = letraFoM();
    ($array[$i] === "F") ?$arrayAsociativo["F"]++ :$arrayAsociativo["M"]++;
}
var_dump($arrayAsociativo);
?>
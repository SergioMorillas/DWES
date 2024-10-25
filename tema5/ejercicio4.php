<?php 
function letraFoM(){
    return rand(0, 1) ? 'F' : 'M'; //Segun si es 0 o 1 creamos F o M
}
$arrayAsociativo = ["F" => 0, "M" => 0];
for ($i = 0; $i < 100; $i++) { //Creamos el array de 100 letras y añadimos las F y las M al array asociativo
    $array[$i] = letraFoM();
    ($array[$i] === "F") ? $arrayAsociativo["F"]++ : $arrayAsociativo["M"]++; // Si la letra que generamos es "F" añadimos 1 al array asociativo en su posicion y viceversa
}
var_dump($arrayAsociativo);
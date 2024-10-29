<!-- EJERCICIO 9: Arrays con funciones

Define un array asociativo de funciones con clave (doble, triple, cuadrado y cubo) donde en cuyo cuerpo de la función calcule la operación indicada en su clave con un número $n. Posteriormente aplica cada función a un array de 10 números elegidos al azar. Finalmente muestra por pantalla el número de array, el doble del número, triple, cuadrado y su cubo. -->
<?php
$array = ["doble" => 'doble',
    "triple" => 'triple',
    "cuadrado" => 'cuadrado',
    "cubo" => 'cubo'];

function doble($num)
{return $num * 2;}
function triple($num)
{return $num * 3;}
function cuadrado($num)
{return $num ** 2;}
function cubo($num)
{return $num ** 3;}

$numeros = [];
for ($ç = 0; $ç < 100; $ç++) {
    $numeros[$ç] = rand(1, 1000);
}

foreach ($numeros as $value) {
    echo ($value) . "\t";
    echo $array["doble"]($value) . "\t";
    echo $array["triple"]($value) . "\t";
    echo $array["cuadrado"]($value) . "\t";
    echo $array["cubo"]($value) . "\t";
    echo "\n";
}
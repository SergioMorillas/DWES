<!-- EJERCICIO 7: Eliminar repetidos
Implementar la función sinRepetidos() que recibirá una array de cualquier tipo y
devolverá un array después de haber eliminado los repetidos del recibido. Este
ejercicio lo debemos hacer por código, sin hacer uso de funciones de PHP. -->

<?php
function sinRepetidos($numeros)
{
    $sinRepetidos = [];
    $devolver = [];
    //Creamos un array k-v con los numeros y sus ocurrencias
    foreach ($numeros as $valor) {
        if (!isset($sinRepetidos[$valor])) {
            $sinRepetidos[$valor] = 1;
            array_push($devolver, $valor);

        }
    }
    return ($devolver);
}
for ($i = 0; $i < 100; $i++) {
    $numeros[] = rand(0, 50);
}
print_r($numeros);
echo "------------------------";
print_r(sinRepetidos($numeros));

?>
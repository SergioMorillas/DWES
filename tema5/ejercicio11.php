<!-- EJERCICIO 10: Uso de funciones de arrays
Crea una función llamada procesarListas que reciba dos strings, cada uno
representando una lista de números enteros separados por comas. La función debe
realizar las siguientes operaciones:
1. Utilizar explode para convertir cada string en un array de números
enteros.
2. Utilizar array_merge para combinar ambos arrays en uno solo.
3. Utilizar array_unique para eliminar los duplicados del array combinado.
4. Ordenar el array resultante en orden ascendente utilizando sort.
5. Calcular la suma de los elementos únicos usando array_sum.
6. Utilizar implode para convertir el array de números únicos y ordenados de
nuevo a un string, donde los números estén separados por comas.
7. Retornar un array asociativo que contenga dos entradas:
· clave “números”: con el string de números únicos y ordenados.
· clave “suma”: la suma de los números únicos. -->

<?php

function procesarLista($str1, $str2)
{
    $arr1 = explode(",", $str1);
    $arr2 = explode(",", $str2);
    $merge = array_merge($arr1, $arr2);
    $merge = array_unique($merge);
    sort($merge);
    return ["numeros" => implode(" , ", $merge),
        "suma" => suma($merge)];
}
function suma($arr)
{
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
    }
    return $sum;
}

print_r(procesarLista("1,2,3,4", "3,4,5,6,7"));
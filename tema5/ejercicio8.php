<!--
EJERCICIO 8: Recorrido de matrices
Escribir un programa que solicite al usuario elementos de una matriz de tamaño
3x3 con números aleatorios entre 0 y 9. La aplicación debe decidir si la matriz
introducida corresponde a una matriz mágica, que es aquella donde la suma de los
elementos de cualquier fila o de cualquier columna valen lo mismo.
Ejemplo de matriz mágica..
2 7 6
9 5 1
4 3 8 -->
<?php
$i = 0;
$array = [];
while ($i < 9) {
    $line = readline("Introduce un numero: ");
    if (is_numeric($line)) {
        $array[$i] = intval($line);
        $i++;
    } else {
        echo "Debes introducir un numero\n";
    }
}
if (esMagica($array)) {
    echo "Era una matriz magica";
} else {
    echo "No era una matriz magica";
}

function esMagica(array $matriz)
{
    if (count(array_unique($matriz)) === 1) { //Si todos los elementos son el mismo es magica
        return true;
    }
    $sumaMagica = array_sum(array_slice($matriz, 0, 3));
    // Comprobamos si la suma de las 3 filas es igual a la suma magica
    for ($i = 1; $i < 3; $i++) { //Empezamos desde 1, porque la suma magica la he hecho con 0
        if (array_sum(array_slice($matriz, $i * 3, 3)) !== $sumaMagica) {
            return false;
        }
    }
    // Comprobamos si la suma de las 3 columnas es igual a la suma magica
    for ($i = 0; $i < 3; $i++) {
        $suma = $matriz[$i] + $matriz[$i + 3] + $matriz[$i + 6];
        if ($suma !== $sumaMagica) {
            return false;
        }
    }

    // Comprobamos las dos diagonales
    $diagonalID = $matriz[0] + $matriz[4] + $matriz[8];
    $diagonalDI = $matriz[2] + $matriz[4] + $matriz[6];
    if ($diagonalID !== $diagonalDI || $diagonalDI !== $sumaMagica) {
        return false;
    }
    return true;
}

// 0 1 2
// 3 4 5
// 6 7 8
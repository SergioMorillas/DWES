<?php

/*
EJERCICIO 6: Recorrido de arrays numéricos II
Añade al ejercicio 2 1a posibilidad de obtener también la moda (valor que
aparece más veces - en azul) y la mediana (valor que aparece en la mitad del
array, una vez ordenado - naranja).
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>numeros</title>
</head>
<body>
    <table>
        <tbody>
        <?php
function moda($numeros): int
{
    $cantidades = [];
    //Creamos un array k-v con los numeros y sus ocurrencias
    foreach ($numeros as $valor) {
        if (isset($cantidades[$valor])) {
            $cantidades[$valor]++;
        } else {
            $cantidades[$valor] = 1;
        }
    }
    $moda;
    $maxOcur = 0;
    //Iteramos las cantidades para ver el mayor numero de ocurrencias
    foreach ($cantidades as $key => $value) {
        if ($value > $maxOcur) {
            $moda = $key;
            $maxOcur = $value;
        }
    }
    return $moda;
}

$numeros = array();
// Itera 100 veces y guarda 100 numeros en un array
for ($i = 0; $i < 100; $i++) {
    $numeros[] = rand(0, 50);
}
// Creamos 100 celdas de una tabla
for ($i = 0; $i < 100; $i++) {
    if ($i == 0) {
        echo "\t\t\t<tr>\n";
        echo "\t\t\t<td class=class$numeros[$i]>$numeros[$i]</td>\n";
    } else if ($i % 10 == 0) {
        echo "\t\t\t</tr><tr>\n";
        echo "\t\t\t<td class=class$numeros[$i]>$numeros[$i]</td>\n";
    } else {
        echo "\t\t\t<td class=class$numeros[$i]>$numeros[$i]</td>\n";
    }
}

echo "</tbody>
</table>\n";
asort($numeros);

$pequenio = array_shift($numeros);
$grande = array_pop($numeros);
$media = round(array_sum($numeros) / count($numeros));
// Para la mediana:
// Si la cantidad de elementos es par cogemos la mitad mas 1 y la mitad menos 1 y hacemos la media
// Si es impar devolvemos el medio
$elementos = count($numeros);
$mediana = ($elementos % 2 == 0) ? (intval($numeros[$elementos / 2] - 1) + intval($numeros[$elementos / 2] + 1)) / 2 : $numeros[$elementos / 2];
$moda = moda($numeros);

if ($moda==$mediana) {
    echo "<h1>La moda es igual a la mediana</h1>";
}
$estilo = <<<CADENA
        <style>
        td{
            border: 1px solid black;
            text-align:center;
            padding:5px;
            font-size:larger
        }
        table{
            border-collapse: collapse;
        }


        .class$pequenio{
            background-color: green;

        }
        .class$grande{
            background-color: red;

        }
        .class$media{
            background-color: yellow;
        }
        .class$moda{
            background-color: blue;
        }
        .class$mediana{
            background-color: orange;
        }
        div{
            width:20px;height:20px; display:inline-block
        }
        </style>
        CADENA;

echo $estilo;

?>

        <p style="display:inline-block">El valor mas alto se pintara de rojo</p>
        <div style="background-color:  red"></div>  <br>
        <p style="display:inline-block">El valor medio se pintara de amarillo</p>
        <div style="background-color:  yellow"></div><br>
        <p style="display:inline-block">El valor mas bajo se pintara de verde</p>
        <div style="background-color:  green"></div> <br>
        <p style="display:inline-block">La moda se pintara de azul</p>
        <div style="background-color:  blue"></div> <br>
        <p style="display:inline-block">La mediana se pintará de naranja</p>
        <div style="background-color:  orange"></div> <br>

    </body>
</html>

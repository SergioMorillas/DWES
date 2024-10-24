<?php

/*EJERCICIO 2: Recorrido de arrays numéricos
Genera un array aleatorio de 100 elementos con números comprendidos entre el 0 y
50 y los muestra en una tabla de 10x10, posteriormente debe colorear la celda
que corresponda:
- El mayor (en rojo)
- El menor (en verde)
- La media (en amarillo)

Muestra una pequeña leyenda en la parte inferior de la tabla indicando qué color
corresponde a cada cálculo.*/

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

            echo "    </tbody>
                    </table>\n";
            asort($numeros);
            
            $pequenio = array_shift($numeros);
            $grande = array_pop($numeros);
            $media = round(array_sum($numeros) / count($numeros));
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
        </style>
        CADENA;

echo $estilo;
?>

        <p style="display:inline-block">El valor mas alto se pintara de rojo</p>
        <div style="background-color:  red; width:20px;height:20px; display:inline-block"></div>  <br>
        <p style="display:inline-block">El valor medio se pintara de amarillo</p>
        <div style="background-color:  yellow; width:20px;height:20px; display:inline-block"></div><br>
        <p style="display:inline-block">El valor mas bajo se pintara de verde</p>
        <div style="background-color:  green; width:20px;height:20px; display:inline-block"></div> <br>

    </body>
</html>

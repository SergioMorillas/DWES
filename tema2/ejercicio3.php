<!-- EJERCICIO 3. Tablas
Dada la siguiente matriz de 3x3 que representa un juego de tres en raya:
$game = array(
    array('x', 'o', 'x'),
    array('o', 'x', 'o'),
    array('x', ' ', 'o')
);
Cambia el espacio vacío por una 'x'.
Muestra el tablero sin hacer uso de bucles. -->
<?php

$game = array(
    array('x', 'o', 'x'),
    array('o', 'x', 'o'),
    array('x', ' ', 'o')
);
$game[2][1] = 'x';

// print_r($game);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table style="border: solid; width:50%;height:100%;">
        <tbody>
            <?php
            echo " <tr >";
            echo "<td style = \"border:solid;\">" . $game[0][0] . "</td>\n";
            echo "<td style = \"border:solid;\">" . $game[0][1] . "</td>\n";
            echo "<td style = \"border:solid;\">" . $game[0][2] . "</td>\n";
            echo "</tr>";
            echo " <tr >";
            echo "<td style = \"border:solid;\">" . $game[1][0] . "</td>\n";
            echo "<td style = \"border:solid;\">" . $game[1][1] . "</td>\n";
            echo "<td style = \"border:solid;\">" . $game[1][2] . "</td>\n";
            echo "</tr>";
            echo " <tr >";
            echo "<td style = \"border:solid;\">" . $game[2][0] . "</td>\n";
            echo "<td style = \"border:solid;\">" . $game[2][1] . "</td>\n";
            echo "<td style = \"border:solid;\">" . $game[2][2] . "</td>\n";
            echo "</tr>";
            ?>
        </tbody>
    </table>
</body>

</html>
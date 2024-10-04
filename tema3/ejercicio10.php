<!-- EJERCICIO 10. El juego de los dados.
Realiza un programa en php que simule un juego de dados entre dos usuarios automáticos, para ello realiza lo siguiente:
Genera dos números aleatorios para el jugador 1 y guardalos en sendas variables.
Muestra las figuras de los dados según lo obtenido. Puedes usar las imágenes que tienes subidas en el site.
Repite el primer y segundo punto pero ahora para el jugador 2.
Gana el jugador cuya suma de sus dos dados tenga el valor más alto.
Muestra el mensaje “HA GANADO EL JUGADOR 1 o 2 CON UN TOTAL DE XX PUNTOS”
Deben utilizarse bucles
NOTA: Para resolver este ejercicio deberá hacer uso de la etiqueta <img src…> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $dados = array();
    for ($i = 0; $i < 4; $i++) {
        $dados[$i] = rand(1, 6);
    }
    $jugador1 = $dados[0] + $dados[1];
    $jugador2 = $dados[2] + $dados[3];
    if ($jugador1 > $jugador2)
        echo "<h1>Ha ganado el jugador número 1 con $jugador1 puntos</h1>\n\t";
    else if ($jugador1 > $jugador2)
        echo "<h1>Ha ganado el jugador número 2 con $jugador2 puntos</h1>\n\t";
    else
        echo "<h1>Han quedado empate los usuarios</h1>\n\t";

    echo "<h2>Dados del jugador 1:</h2>\n\t";
    echo "<img src='images/dados/dado$dados[0].svg' alt=''>\n\t";
    echo "<img src='images/dados/dado$dados[1].svg' alt=''>\n\t";
    echo "<br>\n\t";
    echo "<h2>Dados del jugador 2:</h2>\n\t";
    echo "<img src='images/dados/dado$dados[2].svg' alt=''>\n\t";
    echo "<img src='images/dados/dado$dados[3].svg' alt=''>\n\t";

    ?>
</body>

</html>
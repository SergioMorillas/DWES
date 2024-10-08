<!-- EJERCICIO 13. La máquina tragaperras.
Realiza un programa en php que simule el juego de una máquina tragaperras, para ello realiza lo siguiente:
Se deben de visualizar tres frutas por cada tirada aleatoria.
Además debe incluir un enlace “Moneda”, de forma que al pulsarlo actualice la página y muestre otras 3 nuevas frutas.
Debemos mostrar un mensaje en caso de que obtengamos premio, el premio obtenido es: 
Si sale una cereza, se gana una moneda.
Si salen dos cerezas, se ganan cuatro monedas.
Si salen tres cerezas, se ganan diez monedas. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $monedas = 2;
    $cont = 0;
    for ($i = 0; $i < 3; $i++) {
        $fruta = rand(1, 8);
        echo "<img src=\"./images/frutas/$fruta.svg\" width=\"10%\">";
        if ($fruta == 1)
            $cont += 1;

    }

    switch ($cont) {
        case 1:
            echo "<h1>Has ganado 1 moneda</h1>";
            $monedas += 1;
            break;
        case 2:
            echo "<h1>Has ganado 4 monedas</h1>";
            $monedas += 4;
            break;
        case 3:
            echo "<h1>Has ganado 10 monedas</h1>";
            $monedas += 10;
            break;
        default:
            echo "<h1>No has ganado nada</h1>";

    }
    echo "<a href=\"ejercicio13.php\">Te quedan $monedas monedas, ¿Quieres tirar otra vez?</a>";
    ?>

</body>

</html>
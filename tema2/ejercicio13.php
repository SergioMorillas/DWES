<!-- EJERCICIO 13. Números aleatorios y gráficos vectoriales
Realiza un programa en php que muestre un 5 círculos de distintos colores, con distintas dimensiones:
Los círculos deberán tener un posicionamiento y tamaño aleatorio y deben aparecer dentro del lienzo donde se dibujan.
Cada círculo debe aparecer de un color diferente. Para mostrar los círculos usaremos gráficos vectoriales usando la etiqueta <SVG> -> Pulsa aquí
NOTA: Como no se ha explicado todavía los bucles en este ejercicio no deben utilizarse aun. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    $valor1 = rand(10, 50);
    $valor2 = rand(10, 50);
    $valor3 = rand(10, 50);
    $valor4 = rand(10, 50);
    $valor5 = rand(10, 50);

    $x1 = rand(50, 500);
    $x2 = rand(50, 500);
    $x3 = rand(50, 500);
    $x4 = rand(50, 500);
    $x5 = rand(50, 500);

    $y1 = rand(50, 500);
    $y2 = rand(50, 500);
    $y3 = rand(50, 500);
    $y4 = rand(50, 500);
    $y5 = rand(50, 500);

    $svg = $data = <<<_END
<svg height="800" width="800" xmlns="http://www.w3.org/2000/svg">
    <circle r=$valor1 cx=$x1 cy=$y1 fill="blue" />
    <circle r=$valor2 cx=$x2 cy=$y2 fill="green" />
    <circle r=$valor3 cx=$x3 cy=$y3 fill="red" />
    <circle r=$valor4 cx=$x4 cy=$y4 fill="yellow" />
    <circle r=$valor5 cx=$x5 cy=$y5 fill="brown" />
</svg> 
_END;

    echo $svg;
?>

</body>

</html>
<!-- EJERCICIO 7. Bucle While
Escriba un programa que dibuje entre 1 y 10 círculos en una fila de una tabla. El número de círculos será aleatorio entre 1 y 10. El tamaño de los círculos también será aleatorio entre 40-80 pixeles. El ejercicio debe hacerse obligatoriamente con un bucle while. 
NOTA: Para resolver este ejercicio deberás hacer uso de las etiquetas <circle> de SVG. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $numCirculos = rand(1, 10);

    $anchoSVG = 100;
    $altoSVG = 100;

    function generarCirculo($radio)
    {
        $cx = 80;
        $cy = 80;
        return "<svg width='160' height='160' xmlns='http://www.w3.org/2000/svg'>
                            <circle cx='$cx' cy='$cy' r='$radio' fill='blue' stroke-width='2' />
                        </svg>";
    }
    $contador = 0;
    echo "<table border='1' cellpadding='10'><tr>";

    while ($contador < $numCirculos) {
        $radio = rand(40, 80);
        echo "<td>" . generarCirculo($radio) . "</td>";
        $contador++;
    }

    echo "</tr></table>";
    ?>

</body>

</html>
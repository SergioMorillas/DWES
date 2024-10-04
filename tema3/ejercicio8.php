<!-- EJERCICIO 8. Bucle do-while
Escriba un programa que dibuje entre 1 y 10 círculos en una columna de una tabla. El número de círculos será aleatorio entre 1 y 10. El radio de los círculos será para todos el mismo y el color de cada uno de ellos debe ser aleatorio. El ejercicio debe hacerse obligatoriamente con un bucle do-while.
NOTA: Para resolver este ejercicio deberás hacer uso de las etiquetas <circle> de SVG y usar la propiedad “fill” para rellenar el círculo de un color determinado. -->

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
    function colorAleatorioRGB()
    {
        $r = (rand(0,255));
        $g = (rand(0,255));
        $b = (rand(0,255));
        // Lo hago que cada letra tenga 2 digitos, si solo hay 1 lo relleno con 0 a la izquierd
        // $r = str_pad($r, 2, "0", STR_PAD_LEFT); 
        // $g = str_pad($g, 2, "0", STR_PAD_LEFT);
        // $b = str_pad($b, 2, "0", STR_PAD_LEFT);
        
        return "rgb($r,$g,$b)";
    }
    function colorAleatorio()
    {
        $r = dechex(rand(0,255));
        $g = dechex(rand(0,255));
        $b = dechex(rand(0,255));
        // Lo hago que cada letra tenga 2 digitos, si solo hay 1 lo relleno con 0 a la izquierd
        $r = str_pad($r, 2, "0", STR_PAD_LEFT); 
        $g = str_pad($g, 2, "0", STR_PAD_LEFT);
        $b = str_pad($b, 2, "0", STR_PAD_LEFT);
        
        return "#$r$g$b";
    }
    function generarCirculo($radio)
    {
        $cx = 40;
        $cy = 40;
        return "<svg width='80' height='80' xmlns='http://www.w3.org/2000/svg'>
                            <circle cx='$cx' cy='$cy' r='$radio' fill='". colorAleatorio() . "' stroke-width='2' />
                        </svg>";
    }
    $contador = 0;
    echo "<table border='1' cellpadding='10'><tr>";

    while ($contador < $numCirculos) {
        $radio = 40;
        echo "<tr><td>" . generarCirculo($radio) . "</td></tr>";
        $contador++;
    }

    echo "</tr></table>";
    ?>

</body>

</html>
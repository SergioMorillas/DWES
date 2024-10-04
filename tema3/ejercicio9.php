<!-- 
EJERCICIO 9. Bucle for
Escriba un programa que dibuje entre 1 y 10 círculos de colores (al azar), numerados (al azar, del 1 al 9) y girados (al azar, hasta 80 grados en cada dirección [-80, 80]) en una fila de tabla. El ejercicio debe hacerse obligatoriamente haciendo uso de un bucle for.
NOTA: Para resolver este ejercicio deberás hacer uso de las etiquetas <circle>  y la etiqueta <text> de SVG y usar la propiedad “fill” para rellenar el círculo de un color determinado y “transform” para rotar el texto dentro del círculo. Las coordenadas x e y del círculo y el texto deben coincidir para que aparezca el texto dentro del círculo. -->

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
        $random = rand(1, 9);
        $rotacion = rand(-80, 80);
        $cx = 40;
        $cy = 40;
        return "<svg width='80' height='80' xmlns='http://www.w3.org/2000/svg'>\n\t\t\t\t<circle cx='$cx' cy='$cy' r='$radio' fill='black' stroke-width='2' />\n\t\t\t\t<text x='$cx' y='$cy'  fill='white' transform='rotate($rotacion, $cx, $cy)' >$random</text>\n\t\t\t</svg>\n\t";
    }
    $contador = 0;
    echo "<table border='1' cellpadding='10'>\n\t<tr>\n\t\t";

    while ($contador < $numCirculos) {
        $radio = 40;
        echo "<td>\n\t\t\t" . generarCirculo($radio) . "\t</td>\n\t\t";
        $contador++;
    }

    echo "\n\t\t</tr>\n</table>";
    ?>

</body>

</html>
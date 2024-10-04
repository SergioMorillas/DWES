<!-- EJERCICIO 14. Variable superglobal SERVER e imágenes 
Realiza un programa en php que indique cual el navegador usado por el usuario, teniendo en cuenta los siguientes requisitos:
Para saber el navegador usaremos la variable superglobal $_SERVER['HTTP_USER_AGENT']
Del resultado escogeremos sólo el nombre del navegador.
Mostraremos una imagen con el logo del navegador y un mensaje con el nombre del navegador.
Además la imagen tendrá un enlace para poder descargarse dicho navegador si el usuario lo desea.
NOTA: Para resolver este ejercicio será necesario adelantarnos en la materia y averiguar cómo se realiza una bifurcación o condicional (if). -->

<?php 

function getBrowser()
{
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    if (str_contains($navegador, "Chrome") && str_contains($navegador, "Edg"))
        return array("Edge", "https://www.microsoft.com/es-es/edge/download?form=MA13FJ");
    else if (str_contains($navegador, "Firefox"))
        return array("Firefox", "https://www.mozilla.org/es-ES/firefox/new/");
    else if (str_contains($navegador, "Chrome") && str_contains($navegador, "Safari"))
        return array("Chrome", "https://www.google.com/intl/en_au/chrome/dr/download/");
}

$navegador = getBrowser();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
</head>

<body>
    <?php
    echo "<a href=\"$navegador[1]\"><img src=\"images/$navegador[0].png\" alt=\"Logo de $navegador[0]\"></a>";
    ?>
</body>

</html>
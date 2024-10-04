<!-- EJERCICIO 12. Números aleatorios y gráficos vectoriales
Realiza un programa en php que muestre un diagrama de barras dados 5 números enteros aleatorios, para ello:
Genera cinco números aleatorios entre 10 y 500, para ello usa la función rand(), cuya explicación la tienes en php.net. Dichos números serán guardados en variables diferentes-
Para cada número: mostraremos dicho valor por pantalla, junto a su barra. Para mostrar la barra usaremos gráficos vectoriales usando la etiqueta <SVG> -> Pulsa aquí
Cada barra la mostraremos de un color diferente.
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
    $valor1 = rand(500, 1000);
    $valor2 = rand(500, 1000);
    $valor3 = rand(500, 1000);
    $valor4 = rand(500, 1000);
    $valor5 = rand(500, 1000);
    $svg = $data = <<<_END
<svg height="400" width="1000" xmlns="http://www.w3.org/2000/svg">
    <text x="5" y="50"  fill="red" style="font: size 50px;">$valor1</text>
    <text x="5" y="100" fill="red" style="font: size 50px;">$valor2</text>
    <text x="5" y="150" fill="red" style="font: size 50px;">$valor3</text>
    <text x="5" y="200" fill="red" style="font: size 50px;">$valor4</text>
    <text x="5" y="250" fill="red" style="font: size 50px;">$valor5</text>

    <line x1="35" y1="25"  x2=35 y2="275"  style="stroke:black;stroke-width:5" />

    <line x1="40" y1="50"  x2=$valor1 y2="50"  style="stroke:blue;stroke-width:50" />
    <line x1="40" y1="100" x2=$valor2 y2="100" style="stroke:green;stroke-width:50" />
    <line x1="40" y1="150" x2=$valor3 y2="150" style="stroke:red;stroke-width:50" />
    <line x1="40" y1="200" x2=$valor4 y2="200" style="stroke:yellow;stroke-width:50" />
    <line x1="40" y1="250" x2=$valor5 y2="250" style="stroke:brown;stroke-width:50" />
</svg> 
_END;

    echo $svg;
    ?>
</body>

</html>
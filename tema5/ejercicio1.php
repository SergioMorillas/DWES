<?php
// EJERCICIO 1: Recorrido de arrays numéricos
// Escriba un programa que muestre una tirada de dado al azar y escriba en letras
// el valor obtenido. Para ello debes guardar inicializado un array con los números
// posibles del dado.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dado = rand(1, 6);
        $numeros = array(
            1 => "uno",
            2 => "dos",
            3 => "tres",
            4 => "cuatro",
            5 => "cinco",
            6 => "seis",
        );
        echo "<img src='../tema3/images/dados/dado$dado.svg' alt=''>\n";
        echo "<br>\n";
        echo "Has sacado el dado $numeros[$dado]"
    ?>
</body>
</html>
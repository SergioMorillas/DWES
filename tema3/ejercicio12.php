<!-- EJERCICIO 12. Dado mayor y el número de veces.
Escriba un programa de forma que, cada vez que se ejecute muestre la tirada de entre 1 y 10 dados al azar y diga el valor máximo obtenido y el número de veces que se ha obtenido.
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
    $num_dados = rand(1, 10);
    for ($i = 0; $i < $num_dados; $i++) $dados[$i] = rand(1, 6);


    $mayor=0;
    $veces=1;
    foreach ($dados as &$var) {
        if ($var>$mayor) {
            $mayor=$var;
            $veces=1;
        } else if ($var==$mayor) {
            $veces++;
        }
        echo "<img src='images/dados/dado$var.svg' alt=''>\n\t";
    }
    unset($var);

    echo "<h3>El valor mas alto es $mayor y se repite $veces veces</h3>"

    
    ?>
</body>
</html>
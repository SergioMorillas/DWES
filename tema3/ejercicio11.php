<!-- EJERCICIO 11. Pares e impares.
Escriba un programa de forma que, cada vez que se ejecute muestre la tirada de entre 1 y 10 dados al azar y diga el número de valores pares e impares obtenidos.
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


    $par=0;
    $impar=0;
    foreach ($dados as &$var) {
        if ($var%2== 0) $par+=1;
        else $impar+= 1;
        echo "<img src='images/dados/dado$var.svg' alt=''>\n\t";
    }
    unset($var);

    echo "<h3>Hay $par valores pares y $impar valores impares</h3>"
    ?>
</body>

</html>
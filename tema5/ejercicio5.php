<!-- EJERCICIO 5: Tirada de dados
Siguiendo el ejemplo anterior, escribe un programa que muestre una tirada de un
número de dados al azar entre 2 y 7 e indique los valores. Al final, además
muestra cual es el valor mayor y menor obtenido.

NOTA: Se requiere guardar los números aleatorios obtenidos en un array
previamente a generar las imágenes. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$vueltas = rand(2, 7);
$dados = [];
$numeros = array(
    1 => "uno",
    2 => "dos",
    3 => "tres",
    4 => "cuatro",
    5 => "cinco",
    6 => "seis",
);
//Creamos los dados
for ($i = 0; $i < $vueltas; $i++) {
    $dados[$i] = rand(1, 6);
}
echo "<h1>Tirada de ".count($dados)." dados</h1>\n<br>";
$cadena ="";
//Creamos el codigo html
foreach ($dados as $dado) {
    echo "<img src='../tema3/images/dados/dado$dado.svg' alt=''>";
    $cadena .=$numeros[$dado] . " ";
}
echo "<br>\n";
echo "Has sacado los dados $cadena";
?>
<style>
img{
    width: 50px;
    display: inline;
}
</style>
</body>
</html>
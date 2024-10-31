<!-- EJERCICIO 12: Juego de dados
Escriba un programa que enfrente a dos jugadores tirando una serie de dados al
azar entre 2 y 7 e indique el resultado. Los dados se comparan en orden (el
primero con el primero, el segundo con el segundo, etc.) y gana el jugador que
obtenga el número más alto. -->

<?php
$vueltas = rand(2, 7);
$dados = [];

//Creamos los dados
for ($i = 0; $i < $vueltas; $i++) {
    array_push($dados, rand(1, 6));
}
echo "<h1>Tirada de ".count($dados)." dados</h1>\n<br>";
$cadena ="";
$j1 = $vueltas*2;
echo "Jugador 1<br>";
for ($i=0; $i < $j1; $i++) { 
    if ($i<$vueltas) {
        echo "<img src='../tema3/images/dados/dado$dados[$i].svg' alt=''>";
    } else {
        if ($i == ($vueltas-1)) echo "Jugador 2";
        echo "<img src='../tema3/images/dados/dado$dados[$i].svg' alt=''>";
    }
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
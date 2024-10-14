<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Damas</title>
</head>

<body>
    <!-- 
    queen-bw -- reina
    king-bw -- rey
    archbis-bw -- caballo
    bishop-bw -- alfil
    bpawn-bw -- peon
    rook-bw -- torre
    Orden:
    8 peones
    Torre Alfil Caballo Rey Reina Caballo Alfil Torre
    Torre Alfil Caballo Reina Rey Caballo Alfil Torre
    -->
    <?php
    include_once("./libreria_examen.php");
    $lado = 80;
    $centroCirculo = $lado/2;
    $diametroCirculo = $lado/3;
    echo "<svg width='800' height='800' xmlns='http://www.w3.org/2000/svg'>";
    $anterior = 0;
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
            if ($anterior == 0) { 
                echo rectangulo($lado * $i, $lado * $j, $lado, $lado, "blue");
                $anterior = 1;
            } else {
                echo rectangulo($lado * $i, $lado * $j, $lado, $lado, "yellow");
                $anterior = 0;
            }
            if ($j <2) echo circulo($lado * $i + $centroCirculo, $lado * $j + $centroCirculo, $diametroCirculo, "white", "black");
            elseif ($j >6) echo circulo($lado * $i + $centroCirculo, $lado * $j + $centroCirculo, $diametroCirculo, "black", "white");
        }
    }
    echo "</svg>";


    ?>
</body>

</html>
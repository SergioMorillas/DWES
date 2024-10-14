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
    Torre Caballo Alfil Rey Reina Alfil Caballo Torre
    Torre Caballo Alfil Reina Rey Alfil Caballo Torre
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
            //Así me aseguro de que se cumpla el patron del tablero de 101010101010
            if ($anterior == 0) { 
                echo rectangulo($lado * $i, $lado * $j, $lado, $lado, "blue");
                $anterior = 1;
            } else {
                echo rectangulo($lado * $i, $lado * $j, $lado, $lado, "yellow");
                $anterior = 0;
            }
             if ($j == 1){ //Peones blancos
                 echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/bpawn-w.svg");
            } 
             elseif ($j == 7) { //Peones negros
                 echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/bpawn-b.svg");
             } elseif ($j == 0){ // Caballeria blanca
                 if ($i == 0 || $i == 8) echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/rook-b.svg");
                 elseif ($i == 1 || $i == 7)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/archbis-b.svg");
                 elseif ($i == 2 || $i == 6)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/bishop-b.svg");
                 elseif ($i == 3)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/queen-b.svg");
                 elseif ($i == 5)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/king-b.svg");
             } elseif ($j == 8){ // Caballeria negra
                 if ($i == 0 || $i == 8) echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/rook-w.svg");
                 elseif ($i == 1 || $i == 7)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/archbis-w.svg");
                 elseif ($i == 2 || $i == 6)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/bishop-w.svg");
                 elseif ($i == 5)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/queen-w.svg");
                 elseif ($i == 3)echo imagen($lado * $i, $lado * $j, $lado, $lado, "./ajedrez/gfx/king-w.svg");
            }
        }
    }
    echo "</svg>";


    ?>
</body>

</html>
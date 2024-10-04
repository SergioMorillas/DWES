
<?php
$ingreso = rand(0, 100000);
$ingreso = 51000;
$impuesto = 0;
if ($ingreso < 10000) {
} else if ($ingreso < 30000) {
    $impuesto = 10 * $ingreso / 100;
} else if ($ingreso < 50000) {
    $impuesto = 20 * $ingreso / 100;
} else {
    $impuesto = 30 * $ingreso / 100;
}
echo "El impuesto a pagar es $impuesto sobre la cantidad de $ingreso";

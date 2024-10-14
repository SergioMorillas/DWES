<?php

function rectangulo($rx, $ry, $rWidth, $rHeight, $color)
{
    return "<rect width='$rWidth' height='$rHeight' x='$rx' y='$ry' fill='$color' />\n";
}

function colorAleratorio()
{
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);

    $color = "rgb($red, $green, $blue)";
    return $color;
}
function circulo($cx, $cy, $radio, $color = "blue", $stroke = "white")
{
    return "<circle cx='$cx' cy='$cy' r='$radio' fill='$color' stroke-width='2' stroke='$stroke' />";
}
function imagen($ix, $iy, $iHeight, $iWidth, $href)
{
    return "<image x=$ix y=$iy height='$iHeight' width='$iWidth' href='$href' />\n";
}
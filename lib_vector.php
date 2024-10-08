<?php

function generarCirculoCanva($cx, $cy, $radio, $color = "blue", $svgSize = "200")
{
    return "<svg width='$svgSize' height='$svgSize' xmlns='http://www.w3.org/2000/svg'>
                        <circle cx='$cx' cy='$cy' r='$radio' fill='$color' stroke-width='2' />
                    </svg>";
}
function generarCirculo($cx, $cy, $radio, $color = blue, )
{
    return "<circle cx='$cx' cy='$cy' r='$radio' fill='$color' stroke-width='2' />";
}

function creaDiana($circulos, $tamanoMaximo)
{
    $canvaSize = $tamanoMaximo * 2;
    $coords = $tamanoMaximo;
    $tamano = $tamanoMaximo / $circulos;
    $diana = "<svg width='$canvaSize' height='$canvaSize' xmlns='http://www.w3.org/2000/svg'>";
    for ($i = $circulos; $i > 0; $i--) {
        if ($i % 2 == 0)
            $diana .= generarCirculo($coords, $coords, $tamanoMaximo -= $tamano, "red");
        else
            $diana .= generarCirculo($coords, $coords, $tamanoMaximo -= $tamano, "white");

    }
    $diana .= "</svg>";
    return $diana;
}
function generaRectangulo()
{

}
function generaRectanguloCanva()
{

}


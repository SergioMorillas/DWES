<?php

function generarCirculoCanva($cx, $cy, $radio, $color = "blue", $svgSize = "200")
{
    return "<svg width='$svgSize' height='$svgSize' xmlns='http://www.w3.org/2000/svg'>
                        <circle cx='$cx' cy='$cy' r='$radio' fill='$color' stroke-width='2' />
                    </svg>";
}
function generarCirculo1($cx, $cy, $radio, $color = blue, )
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
function generaGrafico()
{   
    $tam = $size = 45;
    $svg = "<svg height=\"400\" width=\"1000\" xmlns=\"http://www.w3.org/2000/svg\">";
    for ($i = 0; $i < 5; $i++) {
        $valor = rand(500, 1000);
        $svg .= '<text x="5" y="'.$tam.'"  fill="red" style="font: size '.$size.'px;">'.$valor.'</text>';
        $svg .= '<line x1="40" y1="'.$tam.'"  x2='.$valor.' y2="'.$tam.'"  style="stroke:blue;stroke-width:'.$size.'"/>';
        $tam +=50;
    }
    $svg .= '</svg>'; 
    return $svg;    

}

#SVG

function generarSVG($svgWitdth, $svgHeight, $contenido)
{
    return "<svg width='$svgWitdth' height='$svgHeight' xmlns='http://www.w3.org/2000/svg'>\n$contenido</svg>\n\n";
}

#Color

function generarColorAleratorio()
{
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);

    $color = "rgb($red, $green, $blue)";
    return $color;
}

#Rectangle

function generarRectangulo($rx, $ry, $rWidth, $rHeight, $color)
{
    return "<rect width='$rWidth' height='$rHeight' x='$rx' y='$ry' fill='$color' />\n";
}

function generarRectanguloConRadius($rx, $ry, $radius, $rWidth, $rHeight, $color)
{
    return "<rect width='$rWidth' height='$rHeight' x='$rx' y='$ry' rx='$radius' ry='$radius' fill='$color' />\n";
}

function generarRectanguloConBorde($rx, $ry, $rWidth, $rHeight, $color, $bcolor, $bstrokeWidth)
{
    return "<rect width='$rWidth' height='$rHeight' x='$rx' y='$ry' style='fill:$color;stroke-width:$bstrokeWidth;stroke:$bcolor' />\n";
}

function generarRectanguloEnCanva($rx, $ry, $rWidth, $rHeight, $color)
{
    $svgWitdth = $rWidth + 50;
    $svgHeight = $rHeight + 50;
    $rectangulo = generarRectangulo($rx, $ry, $rWidth, $rHeight, $color);
    return generarSVG($svgWitdth, $svgHeight, $rectangulo);
}

function generarRectanguloConRadiusEnCanva($rx, $ry, $radius, $rWidth, $rHeight, $color)
{
    $svgWitdth = $rWidth + 50;
    $svgHeight = $rHeight + 50;
    $rectangulo = generarRectanguloConRadius($rx, $ry, $radius, $rWidth, $rHeight, $color);
    return generarSVG($svgWitdth, $svgHeight, $rectangulo);
}

function generarRectanguloConBordeEnCanva($rx, $ry, $rWidth, $rHeight, $color, $bcolor, $bstrokeWidth)
{
    $svgWitdth = $rWidth + 50;
    $svgHeight = $rHeight + 50;
    $rectangulo = generarRectanguloConBorde($rx, $ry, $rWidth, $rHeight, $color, $bcolor, $bstrokeWidth);
    return generarSVG($svgWitdth, $svgHeight, $rectangulo);
}
function generarRectangleHorizontalConRadiusCanva($x, $radius, $minWidthRect, $maxWidthRect, $heightRect, $numRectangulos)
{
    $svgHeight = ($numRectangulos * $heightRect) + 50;
    $svgWitdth =  $maxWidthRect + 50;
    $svgRH = "<svg width='$svgWitdth' height='$svgHeight' xmlns='http://www.w3.org/2000/svg'>\n";
    for ($i = 1; $i <= $numRectangulos; $i++) {
        $color = generarColorAleratorio();
        $rWidth = rand($minWidthRect, $maxWidthRect);
        $y = (($i - 1) * $heightRect) + $x;
        $svgRH .= "<rect width='$rWidth' height='$heightRect' x='$x' y='$y' rx='$radius' ry='$radius' fill='$color' />\n";
    }
    $svgRH .= "</svg>\n\n";
    return $svgRH;
}

function generarRectanglehorizontalConRadiusEnCanva($x, $radius, $minWidthRect, $maxWidthRect, $heightRect, $numRectangulos)
{
    $svgHeight = ($numRectangulos * $heightRect) + 50;
    $svgWitdth =  $maxWidthRect + 50;
    $rectH = "";
    for ($i = 1; $i <= $numRectangulos; $i++) {
        $color = generarColorAleratorio();
        $rWidth = rand($minWidthRect, $maxWidthRect);
        $y = (($i - 1) * $heightRect) + $x;
        $rectH .= generarRectanguloConRadius($x, $y, $radius, $rWidth, $heightRect, $color);
    }
    return generarSVG($svgWitdth, $svgHeight, $rectH);
}

function generarRectanglehorizontalConBordeCanva($x, $minWidthRect, $maxWidthRect, $heightRect, $bstrokeWidth, $bcolor, $numRectangulos)
{
    $svgHeight = ($numRectangulos * $heightRect) + 50;
    $svgWitdth =  $maxWidthRect + 50;
    $svgRH = "<svg width='$svgWitdth' height='$svgHeight' xmlns='http://www.w3.org/2000/svg'>\n";
    for ($i = 1; $i <= $numRectangulos; $i++) {
        $color = generarColorAleratorio();
        $rWidth = rand($minWidthRect, $maxWidthRect);
        $y = (($i - 1) * $heightRect) + $x;
        $svgRH .= "<rect width='$rWidth' height='$heightRect' x='$x' y='$y' style='fill:$color;stroke-width:$bstrokeWidth;stroke:$bcolor' />\n";
    }
    $svgRH .= "</svg>\n\n";
    return $svgRH;
}

function generarRectanglehorizontalConBordeEnCanva($x, $minWidthRect, $maxWidthRect, $heightRect, $bstrokeWidth, $bcolor, $numRectangulos)
{
    $svgHeight = ($numRectangulos * $heightRect) + 50;
    $svgWitdth =  $maxWidthRect + 50;
    $rectH = "";
    for ($i = 1; $i <= $numRectangulos; $i++) {
        $color = generarColorAleratorio();
        $rWidth = rand($minWidthRect, $maxWidthRect);
        $y = (($i - 1) * $heightRect) + $x;
        $rectH .= generarRectanguloConBorde($x, $y, $rWidth, $heightRect, $color, $bcolor, $bstrokeWidth);
    }
    return generarSVG($svgWitdth, $svgHeight, $rectH);
}

#Circle

function generarCirculo($cx, $cy, $radio, $color)
{
    return "<circle cx='$cx' cy='$cy' r='$radio' fill='$color' stroke-width='2' />\n";
}

function generarCirculoEnCanva($cx, $cy, $radio, $color,)
{
    $svgSize = $radio * 2;
    $circulo = generarCirculo($cx, $cy, $radio, $color);
    return generarSVG($svgSize, $svgSize, $circulo);
}

function creaDianaCanva($circulos, $tamanoMaximo)
{
    $canvaSize = $tamanoMaximo * 2;
    $coords = $tamanoMaximo;
    $tamano = $tamanoMaximo / $circulos;
    $diana = "<svg width='$canvaSize' height='$canvaSize' xmlns='http://www.w3.org/2000/svg'>\n";
    for ($i = $circulos; $i > 0; $i--) {
        if ($i == $circulos) {
            $diana .= generarCirculo($coords, $coords, $tamanoMaximo, "red");
        } elseif ($i % 2 == 0) {
            $diana .= generarCirculo($coords, $coords, $tamanoMaximo -= $tamano, "red");
        } else $diana .= generarCirculo($coords, $coords, $tamanoMaximo -= $tamano, "white");
    }
    $diana .= "</svg>\n\n";
    return $diana;
}

function creaDianaEnCanva($circulos, $tamanoMaximo)
{
    $canvaSize = $tamanoMaximo * 2;
    $coords = $tamanoMaximo;
    $tamano = $tamanoMaximo / $circulos;
    $diana = "";
    for ($i = $circulos; $i > 0; $i--) {
        if ($i == $circulos) {
            $diana .= generarCirculo($coords, $coords, $tamanoMaximo, "red");
        } elseif ($i % 2 == 0) {
            $diana .= generarCirculo($coords, $coords, $tamanoMaximo -= $tamano, "red");
        } else $diana .= generarCirculo($coords, $coords, $tamanoMaximo -= $tamano, "white");
    }
    return generarSVG($canvaSize, $canvaSize, $diana);
}

#Elipse
// The rx Mitad del tamaño horizontal
// The ry mitad del tamaño vertical
// The cx posición horizontal respecto al canvas
// The cy posición vertical respecto al canvas

function generarElipse($erx, $ery, $ecx, $ecy, $color)
{
    return "<ellipse rx='$erx' ry='$ery' cx='$ecx' cy='$ecy' fill='$color' />\n";
}

function generarElipseConBorde($erx, $ery, $ecx, $ecy, $fcolor, $scolor, $swidth)
{
    return "<ellipse rx='$erx' ry='$ery' cx='$ecx' cy='$ecy' style='fill:$fcolor;stroke:$scolor;stroke-width:$swidth' />\n";
}

function generarElipseEnCanva($erx, $ery, $color)
{
    $svgWitdth = ($erx * 2) + 50;
    $ecx = $svgWitdth / 2;
    $svgHeight = $erx + 50;
    $ecy = $svgHeight / 2;
    $elipse = generarElipse($erx, $ery, $ecx, $ecy, $color);
    return generarSVG($svgWitdth, $svgHeight, $elipse);
}

function generarElipseConBordeEnCanva($erx, $ery, $fcolor, $scolor, $swidth)
{
    $svgWitdth = ($erx * 2) + 50;
    $ecx = $svgWitdth / 2;
    $svgHeight = $erx + 50;
    $ecy = $svgHeight / 2;
    $elipse = generarElipseConBorde($erx, $ery, $ecx, $ecy, $fcolor, $scolor, $swidth);
    return generarSVG($svgWitdth, $svgHeight, $elipse);
}

function creaDianaElipticaEnCanva($elipses, $tamanoMaximo)
{
    $svgWitdth = $tamanoMaximo + 50;
    $erx = $tamanoMaximo / 2;
    $ecx = $svgWitdth / 2;
    $ery = $erx / 2;
    $svgHeight = $erx + 50;
    $ecy = $svgHeight / 2;
    $tamanox = $erx / $elipses;
    $tamanoy = $tamanox / 2;
    $diana = "";
    for ($i = $elipses; $i > 0; $i--) {
        if ($i == $elipses) {
            $diana .= generarElipse($erx, $ery, $ecx, $ecy, "red");
        } elseif ($i % 2 == 0) {
            $diana .= generarElipse($erx -= $tamanox, $ery -= $tamanoy, $ecx, $ecy, "red");
        } else $diana .= generarElipse($erx -= $tamanox, $ery -= $tamanoy, $ecx, $ecy, "white");
    }
    return generarSVG($svgWitdth, $svgHeight, $diana);
}

#Line

function generarLinea($lx1, $ly1, $lx2, $ly2, $lColor, $lStrokeWidth)
{
    return "<line x1='$lx1' y1='$ly1' x2='$lx2' y2='$ly2' style='stroke:$lColor;stroke-width:$lStrokeWidth' />\n";
}

function generarLineaEnCanva($lx1, $ly1, $lx2, $ly2, $lColor, $lStrokeWidth)
{
    $svgWitdth = $lx2 + 50;
    $svgHeight = $lStrokeWidth + 50;
    $linea = generarLinea($lx1, $ly1, $lx2, $ly2, $lColor, $lStrokeWidth);
    return generarSVG($svgWitdth, $svgHeight, $linea);
}

function generarLineasHorizontalesCanva($lx1, $minWidthLine, $maxWidthLine, $lStrokeWidth, $numLineas)
{

    $svgHeight = ($numLineas * $lStrokeWidth) + $lx1 + 50;
    $svgWitdth = $lx1 + $maxWidthLine + 50;
    $svgLH = "<svg width='$svgWitdth' height='$svgHeight' xmlns='http://www.w3.org/2000/svg'>\n";
    for ($i = 1; $i <= $numLineas; $i++) {
        $lColor = generarColorAleratorio();
        $lx2 = rand($minWidthLine, $maxWidthLine);
        $yFinal = $lStrokeWidth * $i;
        $svgLH .= generarLinea($lx1, $yFinal, $lx2, $yFinal, $lColor, $lStrokeWidth);
    }
    $svgLH .= "</svg>\n\n";
    return $svgLH;
}

function generarLineasHorizontalesEnCanva($lx1, $minWidthLine, $maxWidthLine, $lStrokeWidth, $numLineas)
{
    $svgHeight = ($numLineas * $lStrokeWidth) + $lx1 + 50;
    $svgWitdth = $lx1 + $maxWidthLine + 50;
    $line = "";
    for ($i = 1; $i <= $numLineas; $i++) {
        $lColor = generarColorAleratorio();
        $lx2 = rand($minWidthLine, $maxWidthLine);
        $yFinal = $lStrokeWidth * $i;
        $line .= generarLinea($lx1, $yFinal, $lx2, $yFinal, $lColor, $lStrokeWidth);
    }

    return generarSVG($svgWitdth, $svgHeight, $line);
}

#Polygon
function generarPoligono($pcolor, $scolor, $swidth, ...$puntos)
{
    $vertices = "";
    foreach ($puntos as $key => $value) {

        $value = implode(',', $value);

        if ($key == 0 || $key % 2 != 0) {
            $vertices .= "$value,";
        } else {
            $vertices .= "$value ";
        }
    }
    return "<polygon points='$vertices' style='fill:$pcolor;stroke:$scolor;stroke-width:$swidth' />\n";
}

function generarPoligonoEnCanva($pcolor, $scolor, $swidth, ...$puntos)
{
    $svgWitdth = max($puntos) + 50;
    $svgHeight = max($puntos) + 50;
    $pol = generarPoligono($pcolor, $scolor, $swidth, $puntos);
    return generarSVG($svgWitdth, $svgHeight, $pol);
}

#Text

function generarTexto($tx, $ty, $tcolor, $text)
{
    return "<text x='$tx' y='$ty' fill='$tcolor' >$text</text>\n";
}

function generarTextoEnCanva($xt, $yt, $tcolor, $text)
{
    $svgWitdth = strlen($text) * 15;
    $svgHeight = 20;
    $textFin = generarTexto($xt, $yt, $tcolor, $text);
    return generarSVG($svgWitdth, $svgHeight, $textFin);
}

function textRect(...$numeros)
{
    $svgWitdth = max($numeros) + 50;
    $svgHeight = (count($numeros) * 30) + 50;
    $textRectangulo = "";
    foreach ($numeros as $key => $value) {
        $rWidth = $value;
        $yt = (($key) * 30) + 20;
        $yr = ($key) * 30;
        $text = generarTexto(0, $yt, "black", $value);
        $textRectangulo .= $text;
        $rect = generarRectangulo(30, $yr, $rWidth, 30, generarColorAleratorio());
        $textRectangulo .= $rect;
    }
    return generarSVG($svgWitdth, $svgHeight, $textRectangulo);
}

#Image

function generarImagen($ix, $iy, $iHeight, $iWidth, $href)
{
    return "<image x=$ix y=$iy height='$iHeight' width='$iWidth' href='$href' />\n";
}

function generarImagenEnCanva($ix, $iy, $iHeight, $iWidth, $href)
{
    $svgWitdth = $iWidth + 50;
    $svgHeight = $iHeight + 50;
    $imagen = generarImagen($ix, $iy, $iHeight, $iWidth, $href);
    return generarSVG($svgWitdth, $svgHeight, $imagen);
}

#Conjunto de svgs

function generarCirImgTextEnCanva($cx, $cy, $cradio, $ccolor, $ix, $iy, $iHeight, $iWidth, $href, $tx, $ty, $tcolor, $text)
{
    $conjunto = "";
    $svgWitdth = $cradio * 2;
    $svgHeight = $cradio * 2;
    $conjunto .= generarCirculo($cx, $cy, $cradio, $ccolor);
    $conjunto .= generarImagen($ix, $iy, $iHeight, $iWidth, $href);
    $conjunto .= generarTexto($tx, $ty, $tcolor, $text);
    return generarSVG($svgWitdth, $svgHeight, $conjunto);
}
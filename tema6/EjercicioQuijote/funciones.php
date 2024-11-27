<?php
function leerArchivo($filePath)
{
    $palabras = [];
    $fp = fopen($filePath, "r");
    while (!feof($fp)) {
        $line = fgets($fp);
        $linee = explode(" ", $line);
        foreach ($linee as $palabra) {
            $palabra = strtolower($palabra);
            $palabra = quitarTildes($palabra);
            $palabra = preg_replace("/[\r\n|\n|\r|\n\r|\.|,|:|\-|\"|;|»|«|!|¿|?|¡|']+/", "", $palabra);
            if (array_key_exists($palabra, $palabras)) {
                $palabras[$palabra] = $palabras[$palabra] + 1;

            } else {
                $palabras[$palabra] = 1;
            }
        }

    }
    unset($palabras[""]);
    arsort($palabras);
    return $palabras;
}

function dameLosQueMasAparecen($num, $array)
{
    $cont = 0;
    $apariciones = [];
    foreach ($array as $key => $value) {
        if ($cont == $num) {
            return $apariciones;
        } else {
            $apariciones[$key] = $value;
            $cont++;
        }
    }
    return $apariciones;
}

function eliminarPalabras($array)
{
    $fp = fopen("stop_words.txt", "r");
    while (!feof($fp)) {
        $line = fgets($fp);
        $line = preg_replace("/[\r\n|\n|\r|\n\r]+/", "", $line);

        if (array_key_exists($line, $array)) {
            unset($array[$line]);
        }
    }
    return $array;
}

function quitarTildes($texto) {
    $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
    $reemplazar = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'n', 'N');
    
    $textoSinTildes = str_replace($buscar, $reemplazar, $texto);
    return $textoSinTildes;
}

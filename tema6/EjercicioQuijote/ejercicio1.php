        <!-- Ejercicio 6: Ficheros de texto y arrays
Desarrollar un programa en PHP que lea un archivo de texto con el contenido de
Don Quijote de la Mancha, lo procese para contar las palabras más frecuentes y
muestre estadísticas sobre la aparición de las mismas. La estadísticas que debe
mostrar serán:
1. Función dameLosQueMasAparecen: método que recibe un entero n y muestra
las n primeras palabras más usadas en el Quijote.
2. Función eliminaStopWords(): función que recibe el nombre de un fichero y
que elimina del array de apariciones aquellas palabras poco relevantes o
stopwords y guarda el resultado del array tras limpieza en el fichero
recibido.
NOTA: Lista de stopwords están dentro de el fichero stop_words.txt -->

<?php
function leerQuijote()
{
    $palabras = [];
    $fp = fopen("J.K. Rowling - Harry Potter 1 - La Piedra Filosofal.txt", "r");
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
    guardarFichero("resultado.csv", $palabras);
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

function guardarFichero($path, $array) {
    $fp = fopen($path, "w");

    foreach ($array as $key => $value) {
        
        fputcsv($fp, [$key, $value], ",");
    }

    fclose($fp);
}

function quitarTildes($texto) {
    $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
    $reemplazar = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'n', 'N');
    
    $textoSinTildes = str_replace($buscar, $reemplazar, $texto);
    return $textoSinTildes;
}

$array = leerQuijote();

echo "\n==============================================\n";
print_r(dameLosQueMasAparecen(5, $array));
echo "\n==============================================\n";
$arrayMod = eliminarPalabras($array);
echo "\n==============================================\n";
print_r(dameLosQueMasAparecen(5, $arrayMod));
echo "\n==============================================\n";
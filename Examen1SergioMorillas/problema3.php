<?php

$piezas;
$fileCSV = fopen("piezas.csv", "r");
for ($i = 0;!feof($fileCSV); $i++) {
    $line = fgets($fileCSV);
    $linee = explode("$", $line);
    $piezas[$i]["nombre"] = $linee[0];
    $piezas[$i]["cantidad"] = $linee[1];
    $piezas[$i]["precio"] = $linee[2];
    $piezas[$i]["reposicion"] = $linee[3];

}
fclose($fileCSV);

function getPiezasParaPedir($array)
{
    $arrayAux = [];
    foreach ($array as $key => $value) {
        if ($value["cantidad"] < $value["reposicion"]) {
            $arrayAux[] = $value;
        }
    }
    return $arrayAux;
}

$arrayPedir = (getPiezasParaPedir($piezas));

$fileJSON = fopen("piezas.json", "w");
// print_r($piezas);
$json = json_encode($arrayPedir, JSON_PRETTY_PRINT, 512);
fputs($fileJSON, $json);
fclose($fileJSON);


añadePedido();

function añadePedido()
{
    $pedidos = fopen("pedido.txt", "r+");
    while (1 != 2) {
        $json_str = file_get_contents("piezas.json");
        if ($json_str === false) {
            die("No se pudo leer el archivo.");
        }
        $piezas = json_decode($json_str, true);
        $myDate =  date_format(new DateTime("now"), "d/m/Y");
        fseek($pedidos, 58);

        fputs($pedidos, $myDate);
        // Iteramos por todas las piezas para ver las que 
        foreach ($piezas as $key => $value) {
            $cantidadPedir = 100 + $value["cantidad"];
            $nombrePedir = $value["nombre"];
            $cantidadPedir = $value["cantidad"];

            fseek($pedidos, 257); // Cada linea son 30 mas, tengo que buscar en que linea tengo los productos 
            $anadir = sprintf("\n%'#10s,%'#10s,%'#10s\n", $cantidadPedir, $nombrePedir, $cantidadPedir);
            fputs($pedidos, $anadir);

        }
        sleep(30);
    }
}

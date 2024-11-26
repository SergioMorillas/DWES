<!-- EJERCICIO 4: Llamadas al sistema y ficheros
En este ejercicio se pretende hacer un programa en PHP que monitorice y gestione
los programas que se están ejecutando en el sistema, haciendo uso de ficheros y
llamadas al sistema, contenidos ya explicados en clase, para ello debes
implementar los siguientes puntos:
1. Almacena en un fichero cada 10 segundos el contenido de la ejecución del
comando de terminal “tasklist”. Investiga primero cómo utilizar el
comando “sleep” y “tasklist”. El fichero se llamará “tasklist.txt”.
2. Abre el fichero y localiza en él, los PID del proceso “chrome.exe”
(proceso asociado al navegador chrome), almacena dichos PID en un array.
3. Recorre dicho array matando dichos procesos, haciendo uso del comando de
terminal “taskkill”.
4. Añadimos una nueva línea en un fichero llamado “ejecuciones.log” con el
formato siguiente:
FECHA_Y_HORA#USUARIO#NÚMERO DE PROCESOS ELIMINADOS#LISTA PIDS
NOTA: Deberás averiguar cómo obtener el usuario del sistema en windows
(USERNAME)
5. Realizar ahora otro pequeño script en php que solicite por terminal un
usuario y una fecha. El programa debe contabilizar cuántos procesos se
han eliminado de este usuario y en ese día introducido por el usuario.
Para ello deberás localizar las líneas en el fichero con esa fecha +
usuario y sumar todos los procesos eliminados.
6. Averigua cómo mostrar una alerta en Windows desde php con el resultado de
esta cuenta.
7. Prueba a introducir estos scripts en el Monitor de tareas de Windows,
para que se ejecuten como un servicio. -->

<?php
include_once "buscarProcesos.php";

$cmd = "tasklist";
$cont = 0; //Variable para saltarme la cabecera
while (1 != 2) {
    $output = "";
    exec(escapeshellarg($cmd), $output, $status);
    $fp = fopen("tasklist.txt", "w");
    foreach ($output as $proceso) {
        if ($cont > 2) {
            fputcsv($fp, preg_split('(\s+)', $proceso), "#");
            echo $proceso . "\n";
        } else {
            echo $cont;
            $cont += 1;
        }
    }
    $cont = 0;
    matarProceso("chrome");
    sleep(10);
}

function matarProceso(String $proceso)
{
    $cont = 0;
    $pid = [];
    $output = "";
    $fp = fopen("tasklist.txt", "r");
    $flog = fopen("ejecuciones.log", "a");

    while (($line = fgetcsv($fp, 1000, "#")) !== false) {
        if (str_contains($line[0], $proceso)) {
            $pid[] = $line[1];
            $cont++;
        }
    }
    $valores = "";
    $fechaHora = date("d/m/Y");
    exec(escapeshellarg("echo %username%"), $usuario, $respuesta);
    if ($cont > 0) {
        foreach ($pid as $value) {
            $valores .= $value . ",";
            exec(escapeshellarg("taskkill /PID $value /F"));
        }
        $valores = rtrim($valores,",");
        fputcsv($flog, [$fechaHora, $usuario[0], $cont, $valores], "#");
    }

}

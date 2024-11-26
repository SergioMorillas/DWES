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
$usuario = readline("Introduce el nombre del usuario que te interesa buscar: ");
$fechaFormateada = readline("Introduce la fecha que te interesa buscar (Formato dd/mm/yyyy): ");
$fp = fopen("ejecuciones.log", "r");
$cantidadProcesos = 0;
while (($line = fgetcsv($fp, 1000, "#")) !== false) {
    if ($line[1] == $usuario) {
        if ($line[0] == $fechaFormateada) {
            $cantidadProcesos += ($line[2]);
        }
    }
}
exec(escapeshellarg("msg %username% \"Se han encontrado $cantidadProcesos procesos para el usuario $usuario\""));

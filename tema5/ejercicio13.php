<!-- EJERCICIO 13: Más funciones de arrays
Crea un script en PHP que realice las siguientes tareas:
1. Utiliza la función file_get_contents() para descargar el HTML de la página web
de pronóstico del tiempo en Logroño: https://www.eltiempo.es/logrono.html.
2. Limpia el contenido HTML descargado para eliminar todas las etiquetas
HTML, dejando solo el texto (estudia la función strip_tags).
3. Genera un número aleatorio del 0 al 6 para seleccionar un día de la
semana (donde 0 es lunes y 6 es domingo).
4. Extrae de la información limpia la temperatura, la velocidad del viento y
la humedad correspondientes al día de la semana seleccionado.
5. Muestra en pantalla el día de la semana, la temperatura, la velocidad del
viento y la humedad. -->

<?php
$tiempo = file_get_contents("https://www.eltiempo.es/logrono.html");

array_filter($tiempo, function($a){
    if ($a) {
        # code...
    }
});
// $tiempo = strip_tags($tiempo);

echo $tiempo;
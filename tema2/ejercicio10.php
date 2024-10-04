<!-- EJERCICIO 10. La función htmlentities
Crea un script en PHP que permita al usuario ingresar comentarios desde la consola. El script debe convertir caracteres especiales en entidades HTML usando htmlentities() y luego mostrar el comentario procesado.
Pasos del Ejercicio:
Leer un texto desde consola, introducido por el usuario: Usa readline() para recibir un comentario del usuario. Más información de uso de la función aquí.
Convertir Caracteres Especiales: aplica htmlentities() para convertir los caracteres especiales del comentario a entidades HTML.
Mostrar el Comentario Procesado y sin procesar por pantalla
Para probar el código puedes acceder a la pestaña “Terminal” desde Visual Studio Code y ejecutar vuestro script con el comando “php nom_fichero.php”. -->

<?php
$linea = readline("Comando: ");
readline_add_history($linea);

$linea_procesada = htmlentities($linea);

echo "Linea sin procesar: $linea\nLinea procesada: $linea_procesada";
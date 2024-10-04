<!-- EJERCICIO 1. Variables básico 
Siga las siguientes instrucciones:
Crea un archivo PHP llamado ejercicio1.php.
Escribe un script PHP que defina tres variables: $mensaje, $numero y $resultado.
Usa comentarios de una línea y de varias líneas para describir el propósito de cada variable.
Realiza una operación matemática simple (suma) usando $numero y almacena el resultado en $resultado.
Imprime por pantalla el mensaje el número y la operación con una única instrucción. -->

<?php
/* Creación de variables*/
$mensaje = "Este es un mensaje"; // Variable que guarda un mensaje
$numero = 10; // Variable que guarda un numero
$resultado; // Variable que guarda un resultado

$resultado = $numero + 90; 

echo "Resultado: ".$resultado . "\nNumero: ". $numero ."\nMensaje: ". $mensaje;
?>
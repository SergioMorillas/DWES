<?php
// Crear un socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Conectar al servidor
$result = socket_connect($socket, '127.0.0.1', 8080);
if ($result === false) {
    echo "Error al conectar al servidor: " . socket_strerror(socket_last_error($socket)) . "\n";
    exit;
}

// Enviar datos al servidor
$message = "Hola desde el cliente PHP";
socket_write($socket, $message, strlen($message));

// Leer respuesta del servidor
$response = socket_read($socket, 1024);
echo "Respuesta del servidor: $response\n";

// Cerrar el socket
socket_close($socket);
?>

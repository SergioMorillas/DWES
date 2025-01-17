<?php
// Crear un socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Verificar si el socket fue creado correctamente
if ($socket === false) {
    echo "Error al crear el socket: " . socket_strerror(socket_last_error()) . "\n";
    exit;
}

// Bindear el socket a una dirección y puerto
$result = socket_bind($socket, '127.0.0.1', 8080);
if ($result === false) {
    echo "Error al bindear el socket: " . socket_strerror(socket_last_error($socket)) . "\n";
    exit;
}

// Escuchar conexiones entrantes
$result = socket_listen($socket, 5);
if ($result === false) {
    echo "Error al escuchar en el socket: " . socket_strerror(socket_last_error($socket)) . "\n";
    exit;
}

echo "Servidor socket esperando conexiones en 127.0.0.1:8080...\n";

// Aceptar una conexión entrante
$client_socket = socket_accept($socket);
if ($client_socket === false) {
    echo "Error al aceptar la conexión: " . socket_strerror(socket_last_error($socket)) . "\n";
    exit;
}

echo "Cliente conectado.\n";

// Leer datos del cliente
$input = socket_read($client_socket, 1024);
echo "Datos recibidos: $input\n";

// Enviar datos al cliente
$output = "Hola desde el servidor PHP";
socket_write($client_socket, $output, strlen($output));

// Cerrar los sockets
socket_close($client_socket);
socket_close($socket);
?>

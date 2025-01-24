<?php
session_start();
require_once 'ManejoUsuarios.php';

if (!isset($_SESSION['usuario'])) {
    //$contexto = urlencode("prueba de contexto por get salchichon");
    $ch = curl_init();
    // $array = ["hola"=>"salchichon"];
    // header("Location: login.php?hola={$array['hola']}"); 
    curl_setopt($ch, CURLOPT_URL, "http://localhost/DWES/tema8/practicaCompleta/login.php");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Contenido-123: Salchichon'
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);    
    exit;
}

$usuario = $_SESSION['usuario'];
$rango = $_SESSION['rango'];

$registro = new ManejoUsuarios('usuarios.txt');
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['nuevoNombre'])) {
            $nuevoNombre = $_POST['nuevoNombre'];
            $registro->cambiarNombre($usuario, $nuevoNombre);
            $_SESSION['usuario'] = $nuevoNombre;
            $usuario = $nuevoNombre;
            $mensaje = "Nombre cambiado exitosamente.";
        }

        if (isset($_POST['nuevaContraseña'])) {
            $nuevaContraseña = $_POST['nuevaContraseña'];
            $registro->cambiarContraseña($usuario, $nuevaContraseña);
            $mensaje = "Contraseña cambiada exitosamente.";
        }

    } catch (Exception $e) {
        $mensaje = 'Error: ' . $e->getMessage();
    }
}
?>

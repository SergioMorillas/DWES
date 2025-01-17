<?php
session_start();

// Simulación de base de datos de usuarios
$usuarios = [
    "usuario1" => "contraseña123",
    "usuario2" => "contraseña456"
];

// Ruta para el login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el usuario existe y la contraseña es correcta
    if (array_key_exists($username, $usuarios) && $usuarios[$username] === $password) {
        $_SESSION['usuario'] = $username;  // Guardar el usuario en la sesión
        header('Location: cpanel.php');  // Redirigir al dashboard
        exit;
    } else {
        $_SESSION['error'] = "Credenciales incorrectas. Intenta de nuevo.";  // Almacenar el mensaje de error
        header('Location: login.php');  // Redirigir al login
        exit;
    }
}

// Ruta para cerrar sesión
if (isset($_GET['logout'])) {
    session_unset();  // Eliminar todas las variables de sesión
    session_destroy();  // Destruir la sesión
    header('Location: login.php');  // Redirigir al login
    exit;
}
?>

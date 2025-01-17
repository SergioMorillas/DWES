<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: cpanel.php');  // Si el usuario ya está autenticado, redirigir al dashboard
    exit;
}

// Mostrar el mensaje de error si está presente
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
if ($error) {
    // Borrar el mensaje después de mostrarlo
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if ($error) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="POST" action="app.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="login">Iniciar sesión</button>
    </form>
</body>
</html>

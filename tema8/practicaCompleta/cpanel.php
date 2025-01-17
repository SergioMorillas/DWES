<?php
session_start();
require_once 'ManejoUsuarios.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');  // Si el usuario no está autenticado, redirigir al login
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión de Alquiler de Coches</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #003366 0%, #00ccff 100%);
            font-family: 'Arial', sans-serif;
        }

        .dashboard-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .dashboard-container h1 {
            margin-bottom: 1.5rem;
            color: #003366;
        }

        .dashboard-container p {
            margin-bottom: 1.5rem;
            color: #666;
        }

        .dashboard-container form {
            margin-bottom: 1.5rem;
        }

        .dashboard-container input {
            width: 100%;
            padding: .75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin-bottom: 1rem;
        }

        .dashboard-container button {
            background: #003366;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .dashboard-container button:hover {
            background: #005580;
        }

        .mensaje {
            color: green;
            margin-bottom: 1.5rem;
        }

        .error {
            color: red;
            margin-bottom: 1.5rem;
        }

        .dashboard-container a {
            color: #003366;
            text-decoration: none;
            display: inline-block;
            margin-top: 1.5rem;
        }

        .dashboard-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h1>
        <p>Rango: <?php echo htmlspecialchars($rango); ?></p>
        <p>Este es tu PANEL DE CONTROL privado.</p>
        <?php if ($mensaje) { echo "<p class='mensaje'>$mensaje</p>"; } ?>
        <form method="POST" action="">
            <h3>Cambiar nombre de usuario</h3>
            <input type="text" name="nuevoNombre" placeholder="Nuevo nombre de usuario" required>
            <button type="submit">Cambiar nombre</button>
        </form>
        <form method="POST" action="">
            <h3>Cambiar contraseña</h3>
            <input type="password" name="nuevaContraseña" placeholder="Nueva contraseña" required>
            <button type="submit">Cambiar contraseña</button>
        </form>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
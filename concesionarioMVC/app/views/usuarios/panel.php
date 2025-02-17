<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal - Gestión de Alquiler de Coches</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #003366 0%, #00ccff 100%);
            font-family: 'Arial', sans-serif;
        }

        .panel-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .panel-container h1 {
            margin-bottom: 1.5rem;
            color: #00abc7;
        }

        .panel-container .button {
            display: block;
            background: #ccc;
            color: #fff;
            border: none;
            padding: 0.75rem;
            border-radius: 20px;
            transition: background 0.3s;
            margin-bottom: 1rem;
            text-decoration: none;
        }

        .panel-container .button:hover {
            background: #00abc7;
            cursor: pointer;
        }

        .logout-button {
            background: #ff4d4d;
        }

        .logout-button:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
    <div class="panel-container">
        <h1>Panel Principal</h1>
        <?php
        if (isset($_SESSION['usuario'])) {
            echo "<p>Bienvenido, " . $_SESSION['usuario'] . "</p>";
        ?>
            <a href="<?php echo RUTA_URL . "vehiculos/inicio"?>" class="button">Gestionar Vehículos</a>
            <a href="<?php echo RUTA_URL . "clientes/inicio"?>" class="button">Gestionar Clientes</a>
            <a href="<?php echo RUTA_URL . "usuarios/logout"?>" class="button logout-button">Cerrar Sesión</a>
        <?php
        } else {
            header("Location: /login");
            exit();
        }
        ?>
    </div>
</body>
</html>

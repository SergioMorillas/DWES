<?php
session_start();
require_once 'ManejoUsuarios.php';

if (isset($_SESSION['usuario'])) {
    header('Location: cpanel.php');  // Si el usuario ya está autenticado, redirigir al dashboard
    exit;
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['username'];
    $contraseña = $_POST['password'];
    $error = '';

    try {
        $registro = new ManejoUsuarios('usuarios.txt');

        if ($registro->usuarioExiste($nombre)) {
            if ($registro->verificarContraseña($nombre, $contraseña)) {
                // Autenticación exitosa
                $_SESSION['usuario'] = $nombre;
                $_SESSION['rango'] = $registro->obtenerRango($nombre);
                header('Location: cpanel.php');
                exit;
            } else {
                $error = 'Contraseña incorrecta.';
            }
        } else {
            $error = 'El usuario no existe.';
        }

    } catch (Exception $e) {
        $error = 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión de Alquiler de Coches</title>
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

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 1.5rem;
            color: #003366;
        }

        .login-container .input-container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .login-container input {
            width: 100%;
            padding: .75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .login-container label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            background: #fff;
            padding: 0 0.5rem;
            color: #666;
            pointer-events: none;
            transition: all 0.3s;
        }

        .login-container input:focus + label,
        .login-container input:not(:placeholder-shown) + label {
            top: 0;
            left: 0.75rem;
            transform: translateY(-50%) scale(0.75);
            color: #003366;
        }

        .login-container button {
            background: #ccc;
            color: #fff;
            border: none;
            padding: 0.75rem;
            border-radius: 20px;
            cursor: not-allowed;
            transition: background 0.3s;
        }

        .login-container button.active {
            background: #003366;
            cursor: pointer;
        }

        .login-container .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
    <script>
        function validateForm() {
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            let error = document.getElementById("error");

            if (username === "" || password === "") {
                error.textContent = "Por favor, rellena todos los campos.";
                return false;
            } else {
                error.textContent = "";
                return true;
            }
        }

        function updateButtonState() {
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            let button = document.querySelector("button");

            if (username !== "" && password !== "") {
                button.classList.add("active");
            } else {
                button.classList.remove("active");
            }
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar sesión - Alquiler de Coches</h1>
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div id="error" class="error"></div>
            <div class="input-container">
                <input type="text" id="username" name="username" placeholder=" " oninput="updateButtonState()">
                <label for="username">Nombre de usuario</label>
            </div>
            <div class="input-container">
                <input type="password" id="password" name="password" placeholder=" " oninput="updateButtonState()">
                <label for="password">Contraseña</label>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
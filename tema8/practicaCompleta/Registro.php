<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
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

        .registro-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .registro-container h1 {
            margin-bottom: 1.5rem;
            color: #003366;
        }

        .registro-container .input-container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .registro-container input,
        .registro-container select {
            width: 100%;
            padding: .75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .registro-container label {
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

        .registro-container input:focus + label,
        .registro-container input:not(:placeholder-shown) + label,
        .registro-container select:focus + label {
            top: 0;
            left: 0.75rem;
            transform: translateY(-50%) scale(0.75);
            color: #003366;
        }

        .registro-container button {
            background: #ccc;
            color: #fff;
            border: none;
            padding: 0.75rem;
            border-radius: 20px;
            cursor: not-allowed;
            transition: background 0.3s;
        }

        .registro-container button.active {
            background: #003366;
            cursor: pointer;
        }

        .registro-container .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
    <script>
        function validateForm() {
            let nombre = document.getElementById("nombre").value;
            let contraseña = document.getElementById("contraseña").value;
            let rango = document.getElementById("rango").value;
            let error = document.getElementById("error");

            if (nombre === "" || contraseña === "" || rango === "") {
                error.textContent = "Por favor, rellena todos los campos.";
                return false;
            } else {
                error.textContent = "";
                return true;
            }
        }

        function updateButtonState() {
            let nombre = document.getElementById("nombre").value;
            let contraseña = document.getElementById("contraseña").value;
            let rango = document.getElementById("rango").value;
            let button = document.querySelector("button");

            if (nombre !== "" && contraseña !== "" && rango !== "") {
                button.classList.add("active");
            } else {
                button.classList.remove("active");
            }
        }
    </script>
</head>
<body>
    <div class="registro-container">
        <h1>Registro de Usuarios</h1>
        <?

        require_once 'ManejoUsuarios.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];
            $rango = $_POST['rango'];

            try {
                $registro = new ManejoUsuarios('usuarios.txt');

                if (!$registro->usuarioExiste($nombre)) {
                    $registro->registrarUsuario($nombre, $contraseña, $rango);
                    echo "<p style='color: green;'>Usuario registrado exitosamente.</p>";
                } else {
                    echo "<p style='color: red;'>El usuario ya existe.</p>";
                }

            } catch (Exception $e) {
                echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
            }
        }
        ?>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div id="error" class="error"></div>
            <div class="input-container">
                <input type="text" id="nombre" name="nombre" placeholder=" " oninput="updateButtonState()">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-container">
                <input type="password" id="contraseña" name="contraseña" placeholder=" " oninput="updateButtonState()">
                <label for="contraseña">Contraseña</label>
            </div>
            <div class="input-container">
                <select id="rango" name="rango" oninput="updateButtonState()">
                    <option value="" disabled selected>Selecciona un rango</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Cliente">Cliente</option>
                </select>
            </div>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas del Quijote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .container {
            margin-top:20px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label, input, button {
            margin: 10px 0;
        }
        input[type="text"], button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .result {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Estadísticas del Quijote</h1>
        <form method="post" action="quijote.php">
            <label for="palabra">Ingresa una palabra o varias palabras separadas por comas:</label>
            <input type="text" id="palabra" name="palabra">
            <button type="submit">Buscar</button>
        </form>
        <h2>Palabras más frecuentes</h2>
        <table>
            <tr><th>Palabra</th><th>Frecuencia</th></tr>
            <?php
            include 'funciones.php';
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $palabras = strtolower($_POST['palabra']);
                $palabras = quitarTildes($palabras);
                $palabraList = array_map('trim', explode(',', $palabras)); // Dividir en palabras y quitar espacios

                $array = leerArchivo("QuijoteDeLaMancha.txt");
                $arrayMod = eliminarPalabras($array);

                if (empty($palabras[0])) {
                    $data = $arrayMod; // Mostrar todas las palabras
                } else {
                    $data = [];
                    foreach ($palabraList as $palabra) {
                        if (isset($arrayMod[$palabra])) {
                            $data[$palabra] = $arrayMod[$palabra];
                        } else {
                            $data[$palabra] = 0;
                        }
                    }
                }
            } else {
                // Mostrar todas las palabras al cargar la página por primera vez
                $array = leerArchivo("QuijoteDeLaMancha.txt");
                $arrayMod = eliminarPalabras($array);
                $data = $arrayMod;
            }

            foreach ($data as $palabra => $frecuencia) {
                echo "<tr><td>{$palabra}</td><td>{$frecuencia}</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

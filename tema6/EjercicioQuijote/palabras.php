<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir fichero y analizar palabras</title>
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
        input[type="file"], button {
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
        <h1>Subir fichero y analizar palabras</h1>
        <form method="post" action="procesar_palabras.php" enctype="multipart/form-data">
            <label for="file">Sube un archivo de texto:</label>
            <input type="file" id="file" name="file" required>
            <button type="submit">Analizar</button>
        </form>

        <?php
        if (isset($_POST['filename'])) {
            echo "<h2>Resultados del archivo: {$_POST['filename']}</h2>";
            echo "<table>";
            echo "<tr><th>Palabra</th><th>Frecuencia</th></tr>";

            if (isset($_POST['data'])) {
                $data = json_decode(base64_decode($_POST['data']), true);
                foreach ($data as $palabra => $frecuencia) {
                    echo "<tr><td>{$palabra}</td><td>{$frecuencia}</td></tr>";
                }
            }

            echo "</table>";
        }
        ?>
    </div>
</body>
</html>

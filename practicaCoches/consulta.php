<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Vehículo</title>
    <link rel="stylesheet" href="formularios.css">
</head>
<body>

<div class="container">
    <h1>Consultar Vehículo</h1>

    <form action="procesar_consulta.php" method="GET">
        <div class="form-group">
            <label for="matricula">Consulta por Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required pattern="[0-9]{4}[A-Z]{3}">
        </div>

        <button type="submit">Consultar Vehículo</button>
    </form>
</div>

</body>
</html>

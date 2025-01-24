<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Vehículo</title>
    <link rel="stylesheet" href="formularios.css">

</head>

<body>
    <div class="container">
        <h1>Modificar Vehículo</h1>
        <form action="procesar_modificacion.php" method="POST"> <label for="matricula">Matrícula del vehículo:</label>
            <input type="text" id="matricula" name="matricula" required placeholder="Matrícula actual"> <label
                for="modelo">Nuevo Modelo:</label> <input type="text" id="modelo" name="modelo"
                placeholder="Nuevo modelo"> <button type="submit">Modificar Vehículo</button> </form>
    </div>
</body>

</html>

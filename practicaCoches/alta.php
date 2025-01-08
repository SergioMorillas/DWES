<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Vehículo</title>
    <link rel="stylesheet" href="formularios.css">
</head>
<body>

<div class="container">
    <h1>Formulario de Vehículo</h1>

    <form action="procesar_alta.php" method="POST" enctype="multipart/form-data">
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required pattern="[0-9]{4}[A-Z]{3}" placeholder="Ejemplo: 1234ABC">

        <label for="marca">Marca:</label>
        <select name="marca" id="marca" required>
            <option value="">Seleccione una marca</option>
            <option value="Toyota">Toyota</option>
            <option value="Honda">Honda</option>
            <option value="Ford">Ford</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
        </select>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required placeholder="Modelo del vehículo">

        <label for="potencia">Potencia (CV):</label>
        <input type="number" id="potencia" name="potencia" required placeholder="Ejemplo: 120">

        <label for="velocidad">Velocidad máxima (km/h):</label>
        <input type="number" id="velocidad" name="velocidad" required placeholder="Ejemplo: 180">

        <label for="path_imagen">Imagen del vehículo:</label>
        <input type="file" name="path_imagen" required>

        <button type="submit">Registrar Vehículo</button>
    </form>

    <div class="form-footer">
        <p>© 2025 Todos los derechos reservados.</p>
    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de Baja Vehículo</title>
    <link rel="stylesheet" href="formularios.css">

</head>
<body>

<div class="container">
    <h1>Dar de Baja Vehículo</h1>

    <form action="procesar_baja.php" method="POST">
        <label for="vehiculos">Selecciona los vehículos a eliminar:</label>
        <select name="vehiculos[]" id="vehiculos" multiple required>
            <!-- Cargar los vehículos desde el JSON -->
            <option value="1234ABC">Toyota Corolla</option>
            <option value="5678XYZ">Honda Civic</option>
            <option value="7890LMN">Ford Focus</option>
        </select>

        <button type="submit">Eliminar Vehículos</button>
    </form>
</div>

</body>
</html>
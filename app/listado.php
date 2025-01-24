<?php
// Asegúrate de tener un archivo 'vehiculos.json' que contenga los datos de los vehículos en formato JSON.
// Este código asume que los vehículos están guardados en 'vehiculos.json'.

// Función para cargar los vehículos desde el archivo JSON
function cargarVehiculos() {
    // Verificamos si el archivo existe y se puede leer
    if (file_exists('vehiculos.json')) {
        $jsonData = file_get_contents('vehiculos.json');
        return json_decode($jsonData, true); // Convertimos el JSON a un array asociativo
    }
    return []; // Si el archivo no existe, devolvemos un array vacío
}

$vehiculos = cargarVehiculos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>
    <link rel="stylesheet" href="formularios.css">
</head>
<body>

<div class="container">
    <h1>Listado de Vehículos</h1>

    <?php if (count($vehiculos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Potencia (CV)</th>
                    <th>Velocidad Máxima (km/h)</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $vehiculo): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($vehiculo['matricula']); ?></td>
                        <td><?php echo htmlspecialchars($vehiculo['marca']); ?></td>
                        <td><?php echo htmlspecialchars($vehiculo['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($vehiculo['potencia']); ?> CV</td>
                        <td><?php echo htmlspecialchars($vehiculo['velocidad']); ?> km/h</td>
                        <td>
                            <?php if (!empty($vehiculo['path_imagen'])): ?>
                                <img src="<?php echo htmlspecialchars($vehiculo['path_imagen']); ?>" alt="Imagen del Vehículo">
                            <?php else: ?>
                                <p>No disponible</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay vehículos registrados en el sistema.</p>
    <?php endif; ?>

</div>

</body>
</html>

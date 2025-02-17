<?php
// Cargamos el header y la librería previamente
require RUTA_APP . '/views/inc/header.php';
require RUTA_APP . '/views/inc/libreria.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        #container {
            position: relative;
            width: 80%;
            height: auto;
            background-color: #fff;
            border: 2px solid #00ccff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            overflow-x: auto;
        }

        .btn-add {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2 class="mb-4">Listado de Vehículos</h2>
        <a href="<?php echo RUTA_URL; ?>vehiculos/agregar" class="btn btn-primary btn-add">Agregar Vehículo</a>
        <div class="table-container">
            <?php echo crearTablaBootstrap($datos["vehiculos"]); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cargamos el footer al final de la página
require RUTA_APP . '/views/inc/footer.php';
?>

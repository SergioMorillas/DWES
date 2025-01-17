<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Datos Cliente</title>
</head>
<body>
    <?php
    require 'FormularioDatosCliente.php';
    $formulario = new FormularioDatosCliente();
    $formulario->procesarFormulario();
    $formulario->mostrarFormulario();
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensaje Personalizado</title>
</head>
<body>
    <?php
    require 'FormularioDatosCliente.php';
    $formulario = new FormularioDatosCliente();
    $formulario->mostrarMensaje();
    ?>
</body>
</html>

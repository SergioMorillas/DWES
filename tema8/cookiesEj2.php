<?php
// Verificamos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardamos el nombre y el idioma en cookies por 30 días
    setcookie("nombre", $_POST["nombre"], time() + (30 * 24 * 60 * 60), "/"); // 30 días
    setcookie("idioma", $_POST["idioma"], time() + (30 * 24 * 60 * 60), "/"); // 30 días
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Preferencias</title>
</head>
<body>
    <h1>Introduce tu nombre y selecciona el idioma</h1>

    <!-- Formulario para ingresar nombre e idioma -->
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label for="idioma">Idioma:</label>
        <select name="idioma" id="idioma" required>
            <option value="es">Español</option>
            <option value="en">Inglés</option>
            <option value="fr">Francés</option>
        </select>
        <br><br>

        <button type="submit">Guardar preferencias</button>
    </form>

</body>
</html>
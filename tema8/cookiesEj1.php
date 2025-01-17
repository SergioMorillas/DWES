<?php
include "..\practicaCoches\utils\utils.php";
// Verificamos si las cookies están configuradas
if (isset($_COOKIE["nombre"]) && isset($_COOKIE["idioma"])) {
    $nombre = $_COOKIE["nombre"];
    $idioma = $_COOKIE["idioma"];
} else {
    $nombre = "Invitado";
    $idioma = "es"; // Español por defecto
}
?>

<!DOCTYPE html>
<html lang="<?php echo $idioma; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido, <?php pintarHTML(" ", $nombre); ?>!</h1>

    <?php
    // Mensaje según el idioma seleccionado
    if ($idioma == "es") {
        echo "<p>Hola, ¿cómo estás?</p>";
    } elseif ($idioma == "en") {
        echo "<p>Hello, how are you?</p>";
    } elseif ($idioma == "fr") {
        echo "<p>Bonjour, comment ça va ?</p>";
    }
    ?>
</body>
</html>
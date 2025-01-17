<?php
include 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['palabra'])) {
    $palabra = strtolower($_POST['palabra']);
    $palabra = quitarTildes($palabra);

    if (isset($_POST['useDefault']) && $_POST['useDefault'] == 1) {
        // Usa el archivo predeterminado del Quijote
        $filePath = "QuijoteDeLaMancha.txt";
        $fileName = "QuijoteDeLaMancha.txt";
    } elseif (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        // Usa el archivo subido
        $filePath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
    } else {
        // Si no hay archivo subido y no se ha solicitado el archivo predeterminado
        header("Location: index.php?error=No se ha subido ningún archivo.");
        exit;
    }

    $array = leerArchivo($filePath);
    $arrayMod = ($array);

    $resultado = isset($arrayMod[$palabra]) ? $arrayMod[$palabra] : 0;

    header("Location: quijote.php?palabra=$palabra&resultado=$resultado&filename=$fileName");
    exit;
}

<?php
include 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    if ($file['error'] == UPLOAD_ERR_OK) {
        $filePath = $file['tmp_name'];
        $fileName = $file['name'];

        $array = leerArchivo($filePath);

        $data = base64_encode(json_encode($array));
        
        echo "<form id='results' method='post' action='palabras.php'>";
        echo "<input type='hidden' name='filename' value='{$fileName}'>";
        echo "<input type='hidden' name='data' value='{$data}'>";
        echo "</form>";
        echo "<script>document.getElementById('results').submit();</script>";
    } else {
        echo "Error al subir el archivo.";
    }
}

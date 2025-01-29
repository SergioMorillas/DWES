<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú de Opciones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <div class="list-group">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a
          class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], '/paginas') !== false && strpos($_SERVER['REQUEST_URI'], 'agregar') === false ? 'active' : ''; ?>"
          id="home-tab"
          href="<?php echo RUTA_URL ?>/paginas"
          role="tab"
        >
          Indice
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'agregar') !== false ? 'active' : ''; ?>"
          id="profile-tab"
          href="<?php echo RUTA_URL ?>/paginas/agregar"
          role="tab"
        >
          Agregar
        </a>
      </li>
    </ul>
  </div>
</div>
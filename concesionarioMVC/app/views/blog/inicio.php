<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Concesionario Morillas</title>
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
  <link rel="stylesheet" href="css/blog.css">
  </head>
  <body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand">Morillas</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL . "blogs"?>"
              >Alquilar 
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL . "clientes/login"?>"
              >Administración 
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-person"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"
                />
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
          <h1>Bienvenidos al Concesionario Morillas</h1>
        </div>
        <div class="card-body">
          <h3 class="card-title">Nuestro Compromiso</h3>
          <p>
            En el Concesionario Morillas, nos dedicamos a ofrecerte la mejor
            experiencia de alquiler de vehículos. Con una flota de coches de
            alta calidad y un servicio excepcional, estamos aquí para ayudarte a
            encontrar el vehículo perfecto para tus necesidades. Ya seas un
            cliente habitual o un administrador a cargo de la flota, contamos
            con las herramientas y el equipo para asistirte en cada paso del
            camino.
          </p>
          <p>
            Descubre nuestra selección de vehículos y disfruta de un servicio
            personalizado que se adapta a ti. ¡Bienvenidos a la mejor
            experiencia de alquiler de coches!
          </p>
        </div>
      </div>
      
      <!-- Carrusel de fotos de coches -->
      <div id="carCarousel" class="carousel slide mt-5" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="img/car1.webp"
              class="d-block w-100"
              alt="Coche 1"
            />
          </div>
          <div class="carousel-item">
            <img
              src="img/car2.webp"
              class="d-block w-100"
              alt="Coche 2"
            />
          </div>
          <div class="carousel-item">
            <img
              src="img/car3.webp"
              class="d-block w-100"
              alt="Coche 3"
            />
          </div>
          <div class="carousel-item">
            <img
              src="img/car4.webp"
              class="d-block w-100"
              alt="Coche 4"
            />
          </div>
          <div class="carousel-item">
            <img
              src="img/car5.webp"
              class="d-block w-100"
              alt="Coche 5"
            />
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carCarousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carCarousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 Concesionario Morillas. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>

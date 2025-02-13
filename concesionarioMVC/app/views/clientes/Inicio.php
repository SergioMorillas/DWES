<?php
    // Cargamos el header previamente
    require RUTA_APP . '/views/inc/header.php';
    require RUTA_APP . '/views/inc/libreria.php';

?>
<div class="container mt-5">
    <h2 class="mb-4">Listado de usuarios</h2>
    <?php echo crearTablaBootstrap($datos["clientes"]); ?>
</div>

<?php
    // Cargamos el footer al final de la pagina
    require RUTA_APP . '/views/inc/footer.php';
?>
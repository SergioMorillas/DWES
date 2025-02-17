<?php
    // Cargamos el header previamente
    require RUTA_APP . '/views/inc/header.php';
?>
<div class="container mt-5">
    <h2 class="mb-4">Agregar/Editar cliente</h2>
    <form action="<?php echo RUTA_URL; ?>clientes/agregar" method="POST">
        <div class="form-group">
            <label for="documento">Documento de Identidad <sup>*</sup></label>
            <input type="text" name="documento" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre <sup>*</sup></label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="apell">Apellidos <sup>*</sup></label>
            <input type="text" name="apell" class="form-control">
        </div>
        <div class="form-group">
            <label for="fechaNac">Fecha de nacimiento <sup>*</sup></label>
            <input type="date" name="fechaNac" class="form-control" >
        </div>
        <div class="form-group">
            <label for="email">Email <sup>*</sup></label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono <sup>*</sup></label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección <sup>*</sup></label>
            <input type="text" name="direccion" class="form-control">
        </div>
        <div class="form-group">
            <label for="fotografia">Fotografía <sup>*</sup></label>
            <input type="text" name="fotografia" class="form-control">
        </div>
        <input type="submit" value="Agregar cliente" class="btn btn-primary mt-3">
    </form>
</div>
<?php
    // Cargamos el footer al final de la pagina
    require RUTA_APP . '/views/inc/footer.php';
?>

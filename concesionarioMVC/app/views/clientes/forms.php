<?php
    // Cargamos el header previamente
    require RUTA_APP . '/views/inc/header.php';
?>
<!-- <a href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-secondary mb-3">Volver</a> -->
<div class="container mt-5">
    <h2 class="mb-4">Agregar usuario</h2>
    <form action="<?php echo RUTA_URL; ?>/paginas/agregar" method="POST">
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
            <label for="rango">Rango <sup>*</sup></label>
            <input type="text" name="rango" class="form-control">
        </div>
        <div class="form-group">
            <label for="login">Login <sup>*</sup></label>
            <input type="text" name="login" class="form-control">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña <sup>*</sup></label>
            <input type="password" name="contrasena" class="form-control">
        </div>
        <input type="submit" value="Agregar usuario" class="btn btn-primary mt-3">
    </form>
</div>
<?php
    // Cargamos el footer al final de la pagina
    require RUTA_APP . '/views/inc/footer.php';
?>
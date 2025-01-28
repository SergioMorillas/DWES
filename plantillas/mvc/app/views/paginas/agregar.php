<?php
    // Cargamos el header previamente
    require RUTA_APP . '/views/inc/header.php';
?>
<a href="<?php echo RUTA_URL; ?>/paginas">Volver</a>
<h2>Agregar usuario</h2>
<form action="<?php echo RUTA_URL; ?>/paginas/agregar" method="POST">
    <div clas="form-group">
        <label for="nombre"> Nombre <sup>*</sup></label>
        <input type="text" name="nombre">
    </div>
    <div clas="form-group">
        <label for="apell"> Apellidos <sup>*</sup></label>
        <input type="text" name="apell">
    </div>
    <div clas="form-group">
        <label for="fechaNac"> Fecha de nacimiento <sup>*</sup></label>
        <input type="text" name="fechaNac">
    </div>
    <div clas="form-group">
        <label for="rango"> Rango <sup>*</sup></label>
        <input type="text" name="rango">
    </div>
    <div clas="form-group">
        <label for="login"> Login <sup>*</sup></label>
        <input type="text" name="login">
    </div>
    <div clas="form-group">
        <label for="contrasena"> Contraseña <sup>*</sup></label>
        <input type="password" name="contrasena">
    </div>
    <input type="submit" value="Agregar usuario">
</form>
 <?php
     // Cargamos el footer al final de la pagina
 require RUTA_APP . '/views/inc/footer.php';
 ?>
<?php
/*
Pagina que muestre el numero de veces que se actualiza la página por parte de un  usuario, utilizar sesiones para mantener el contador
*/


session_start();
if (isset($_POST["guardaSesion"])) {
    setcookie("guardaSesion", $_SESSION["contador"], time()+86400);
}
if (isset($_GET["guardaSesion"])) {
    setcookie("guardaSesion", $_GET["guardaSesion"], time()+86400);
    $_SESSION["contador"]--;
    header("Location: " .strtok($_SERVER["REQUEST_URI"], "?"));

}
if(!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = (isset($_COOKIE["guardaSesion"]))?$_COOKIE["guardaSesion"]:0;
    // if (isset($_COOKIE["guardaSesion"])) {
    //     $_SESSION["contador"] = $_COOKIE["guardaSesion"];
    // } else {
    //     $_SESSION["contador"] = 0;
    // }
    
}  
$_SESSION["contador"]++;
$sesion = $_SESSION["contador"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Has recargado esta web <?php echo $sesion ?> veces</h1>
    <form method="post">
        <button name="guardaSesion" type="submit">Guardar en cookie</button>
    </form>
    <a href="?guardaSesion=<?php echo $sesion ?>">Guardar en cookie</a>
</body>
</html>
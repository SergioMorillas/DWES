<!-- EJERCICIO 3: Menú de navegación con switch y validaciones
Escribe un programa en PHP que simule un menú de navegación en el que el usuario puede seleccionar una de las siguientes páginas: Home, About, News, Login, Links. Si el usuario no selecciona ninguna de estas opciones, el programa debe mostrar un mensaje de "Selección no válida". Si el usuario selecciona Login, el programa debe validar si el usuario ha proporcionado el nombre de usuario y la contraseña correctos. Si la validación falla, se debe mostrar un mensaje de "Credenciales incorrectas". Esta última parte debe hacerse con funciones. Usa la declaración switch.
Restricciones:
La selección del menú debe ser ingresada por el usuario.
La validación de las credenciales es sencilla: usuario "admin" y contraseña "1234". -->
<?php
echo "Bienvenido al menú, tienes las siguientes opciones disponibles: \nHome\nAbout\nNews\nLogin\nLinks\n\n";
$entrada = readline("Por favor introduzca la opción que prefiere:\t");

switch ($entrada) {
    case "Home":
        break;
    case "About":
        break;
    case "News":
        break;
    case "Login":
        comprobar_login();
        break;
    case "Links":
        break;
    default:
        echo "Selección no válida";

}

function comprobar_usuario($usuario)
{
    return ($usuario == "admin");
}
function comprobar_contrasena($contrasena)
{
    return ($contrasena == "1234");

}
function comprobar_login()
{
    $user = readline("Introduzca el usuario:\t");
    $pass = readline("Introduzca la contraseña:\t");
    if (comprobar_usuario($user) && comprobar_contrasena($pass))
        echo "Credenciales correctas";
    else
        echo "Credenciales incorrectas";
}
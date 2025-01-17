<?php
// Ejemplo 1: Validar un correo electrónico
$email = "ejemplo@dominio.com";
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
if (preg_match($pattern, $email)) {
    echo "El correo es válido.";
} else {
    echo "El correo no es válido.";
}

// Ejemplo 2: Validar un número de teléfono (formato 123-456-7890)
$telefono = "123-456-7890";
$pattern = "/^\d{3}-\d{3}-\d{4}$/";
if (preg_match($pattern, $telefono)) {
    echo "El teléfono es válido.";
} else {
    echo "El teléfono no es válido.";
}

// Ejemplo 3: Comprobar si una cadena contiene solo letras y espacios
$cadena = "Hola Mundo";
$pattern = "/^[a-zA-Z\s]+$/";
if (preg_match($pattern, $cadena)) {
    echo "La cadena es válida.";
} else {
    echo "La cadena no es válida.";
}

// Ejemplo 4: Reemplazar todas las vocales por un asterisco
$texto = "Hola Mundo";
$pattern = "/[aeiouAEIOU]/";
$reemplazo = "*";
$texto_modificado = preg_replace($pattern, $reemplazo, $texto);
echo $texto_modificado; // H*l* M*nd*

// Ejemplo 5: Extraer las palabras de una cadena
$texto = "Este es un ejemplo de expresión regular";
$pattern = "/\b\w+\b/";
preg_match_all($pattern, $texto, $coincidencias);
print_r($coincidencias); // Array con las palabras encontradas


<!-- EJERCICIO 4: El operador ternario
Modifica el ejercicio 1 haciendo uso del operador ternario exclusivamente. Para ello ten en cuenta que puedes hacer anidamiento de operadores ternarios. -->
<?php
// Definir los tres números
echo "Numero 1:";
$numero1 = readLine();
echo "Numero 2:";
$numero2 = readLine();
echo "Numero 3:";
$numero3 = readLine();

// Usar el operador ternario para encontrar el mayor
echo "El mayor es " .
    ($numero1 == $numero2 && $numero2 == $numero3
        ? ", ninguno puesto que sonn iguales" :
        ($numero1 > $numero2
            ? ($numero1 > $numero3
                ? $numero1 : $numero3
            )
            : ($numero2 > $numero3
                ? $numero2 : $numero3
            )
        ));


?>
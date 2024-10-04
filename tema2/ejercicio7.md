# EJERCICIO 7. Expresiones lógicas
## Indica cuál será el resultado de las siguientes expresiones lógicas. Realiza en papel el cálculo, teniendo en cuenta el orden de prioridad de los operadores.

$esAdulto = true;
$tieneLicencia = false;
$esEmpleado = true;
$esEstudiante = false;
$tienePermiso = true;
$esMayoDeEdad = true;

$resultado1 = ($esAdulto && $tieneLicencia) || (!$esEstudiante && $tienePermiso); => true
$resultado2 = ($esEmpleado || $tieneLicencia) && ($esMayoDeEdad == $esAdulto); => true
$resultado3 = (!$tieneLicencia && $esAdulto) || ($esEmpleado xor $esEstudiante); => true
$resultado4 = ($esEstudiante != $esEmpleado) && ($tienePermiso || !$esMayoDeEdad); => true
$resultado5 = ($esAdulto === $esMayoDeEdad) && (!$esEmpleado || $tienePermiso && $tieneLicencia); => false

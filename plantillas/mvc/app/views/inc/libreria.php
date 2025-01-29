<? Php
function crearTablaBootstrap(array $datos) {
  // Verificamos si el array tiene datos
  if (empty($datos)) {
    return "No hay datos para mostrar.";
  }

  // Obtenemos los encabezados de la primera fila
  $encabezados = array_keys($datos[0]);

  // Iniciamos la tabla HTML con Bootstrap
  $tabla = "<table class='table'>";
  $tabla .= "<thead><tr>";
  foreach ($encabezados as $encabezado) {
    $tabla .= "<th>$encabezado</th>";
  }
  $tabla .= "</tr></thead>";
  $tabla .= "<tbody>";

  // Iteramos sobre los datos y creamos las filas
  foreach ($datos as $fila) {
    $tabla .= "<tr>";
    foreach ($fila as $valor) {
      $tabla .= "<td>$valor</td>";
    }
    $tabla .= "</tr>";
  }

  // Cerramos la tabla
  $tabla .= "</tbody></table>";

  return $tabla;
}

<?php
function crearTablaBootstrap($datos)
{
    if (empty($datos)) {
        return "No hay datos para mostrar.";
    }

    $encabezados = array_keys((array) $datos[0]);

    $tabla = "<div class='table-responsive'>";
    $tabla .= "<table class='table table-striped table-bordered table-hover'>";
    $tabla .= "<thead class='thead-dark'><tr>";
    foreach ($encabezados as $encabezado) {
        $encabezado = ucfirst($encabezado);
        $encabezado = preg_replace("/_/i", " ", $encabezado);

        $tabla .= "<th scope='col'>$encabezado</th>";
    }
    $tabla .= "</tr></thead>";
    $tabla .= "<tbody>";
    foreach ($datos as $fila) {
        $tabla .= "<tr>";
        foreach ($fila as $valor) {
            $tabla .= "<td>$valor</td>";
        }
        $tabla .= "</tr>";
    }

    $tabla .= "</tbody></table>";
    $tabla .= "</div>";

    return $tabla;
}
/**
 * Este metodo está en proceso, no utilizar
 */
function crearFormularioBootstrap($datos, $action, $method)
{
  die("Metodo en proceso, no utilizar, ruta='plantillas\mvc\app\views\inc\libreria.php'");
    if (empty($datos)) {
        return "No hay datos para mostrar.";
    }
    $ruta = RUTA_URL;
    $formulario = "<form action=$ruta$action method=$method>";
    
    foreach ($datos as $campo => $valor) {
        $campo = ucfirst($campo);
        $campo = preg_replace("/_/i", " ", $campo);

        $formulario .= "<div class='form-group'>";
        $formulario .= "<label for='$campo'>$valor</label>";
        $formulario .= "<input type='text' class='form-control' id='$campo' name='$campo' placeholder ='$valor'>";
        $formulario .= "</div>";
    }

    $formulario .= "<button type='submit' class='btn btn-primary'>Enviar</button>";
    $formulario .= "</form>";

    return $formulario;
}
?>

<!-- EJERCICIO 3: Patrón DAO con CRUD en fichero CSV
Las siglas CSV vienen del inglés "Comma Separated Values" y significan valores
separados por tokens (cualquier caracter). Dicho esto, un archivo CSV es un
archivo de texto en el cual los campos están separados por el token, haciendo
una especie de tabla en filas y columnas.
En este ejemplo podemos ver un fichero CSV, donde aparece en la primera fila el
nombre de los campos: Date, Country, Units y Revenue; cada fila corresponde a un
registro (o fila de una tabla en BD) y cada columna corresponde a los datos de
un determinado campo (USA, Panama, Panama, Brazil … son datos del campo
Country). En este ejemplo vemos que el token es el caracter ','.

Se pide una nueva implementación del patrón DAO (la interfaz ICocheDAO) haciendo
uso nuevamente de ficheros, pero esta vez con lectura línea a línea (muy útil
para ficheros de gran tamaño, ya que no colapsa la memoria). Además debes
cumplir los siguientes requisitos:
● Se deberán usar las funciones fgets,fputs,feof, fopen y fclose
exclusivamente para la resolución del ejercicio.
● El token separador será el caracter '#'.
● Te será muy útil la función de cadena explode para gestionar cada una de
las líneas.
● El resto del código realizado en el ejercicio anterior no debe
modificarse nada. De esta forma queda más evidenciado la utilidad del
patrón DAO para desacoplar la capa de datos. -->
<?php
include_once "Coche.php";
include_once "ICocheDAO.php";

class CocheDAOCSV implements ICocheDAO
{
    private const FICHERO = "./coches.csv";
    public function crear(Coche $coche)
    {
        if (!($this->obtenerCoche($coche->matricula))) {
            $file = fopen($this::FICHERO, "a");
            $linee = $this->crearCSV($coche);
            fputs($file, $linee);
        } else {
            return false;
        }
    }
    // Devuelve el coche buscado
    public function obtenerCoche($matricula)
    {
        if (file_exists($this::FICHERO)) {
            $file = fopen($this::FICHERO, "r");
            while (!feof($file)) {
                $line = fgets($file);
                $linee = explode("#", $line);
                if ($linee[0] == $matricula) {
                    return true;
                }
            }
            fclose($file);
        }
        return false;

    }
    // Borrado de coche
    public function eliminar($matricula)
    {

    }
    // Modificación de Coche
    public function actualizar($matricula, Coche $nuevoCoche)
    {

    }
    // Devuelve todos los coches almacenados en el fichero
    public function verTodos()
    {
        $devolucion = false;

        if (file_exists($this::FICHERO)) {
            $devolucion = sprintf("%20s\t\t%20s\t\t%20s\t\t%20s\t\t%20s\n", "Matricula", "Marca", "Modelo", "Potencia", "Velocidad maxima");
            $devolucion = sprintf("%'_20s\t\t%'_20s\t\t%'_20s\t\t%'_20s\t\t%'_20s\n", "", "", "", "", "");
            $file = fopen($this::FICHERO, "r");
            while (!feof($file)) {
                $line = fgets($file);
                $linee = explode("#", $line);
                $devolucion .= sprintf("%20s\t\t%20s\t\t%20s\t\t%20s\t\t%20s", $linee[0], $linee[1], $linee[2], $linee[3], $linee[4]);
            }
            fclose($file);
        }
        return $devolucion;
    }
    private function crearCSV($coche)
    {
        return $coche->matricula . "#" . $coche->marca . "#" . $coche->modelo . "#" . $coche->potencia . "#" . $coche->velocidadMaxima. "\n";
    }

}

$dao = new CocheDAOCSV();

echo ($dao->verTodos());
echo "\n";
echo ($dao->obtenerCoche("1234bbb"));
$coche1 = new Coche("1234NNN");
$coche1->marca = "prueba 123";
$coche1->modelo = "prueba 123";
$coche1->potencia = 123;
$coche1->velocidadMaxima = 123;
echo "\n";
var_dump($dao->crear($coche1));
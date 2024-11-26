<!-- EJERCICIO 2: Patrón DAO con CRUD en JSON
Crear una aplicación en PHP que utilice el patrón DAO para realizar las
operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre un objeto Coche. La
información del coche se guardará en un archivo de texto en formato JSON. Para
ello realiza uno a uno los siguientes apartados:
1. Creación de la clase Coche: primero debemos crear una clase PHP que
representará el Coche con las siguientes propiedades:
● Matricula (string)
● Marca (string)
● Modelo (string)
● Potencia (number)
● Velocidad máxima (number)

2. Crear la interfaz ICocheDAO: esta interfaz debe declarar los métodos CRUD
sin especificar detalles de implementación. Las clases que la implementen
serán responsables de proporcionar las implementaciones concretas.
interface ICocheDAO {
// Alta de coche
public function crear(Coche $coche);
// Devuelve el coche buscado
public function obtenerCoche($matricula);
// Borrado de coche
public function eliminar($matricula);
// Modificación de Coche
public function actualizar($matricula, Coche $nuevoCoche);
// devuelve todos los coches almacenados en el fichero
public function verTodos();
}
3. Crear la clase CocheDAO que implementa la interfaz ICocheDAO y que
realice las operaciones sobre el fichero JSON. -->
<?php
include_once "Coche.php";
include_once "ICocheDAO.php";

class CocheDAO implements ICocheDAO
{
    private const FICHERO = "coches.json";
    public function crear(Coche $coche)
    {
        if (obtenerCoche($coche->matricula) == null) {
            $aux = obtenerCoches();
            $aux[] = $coche;
            $jsonStr = json_encode($array_coches, JSON_PRETTY_PRINT, 512);
            
        } else {
            return false;
        }

    }
    private function obtenerCoches()
    {
        $aux;
        if (file_exists($this::FICHERO)) {
            $aux = arrayDeCoches(file_get_contents($this::FICHERO));
        } else {
            file_put_contents($this::FICHERO, '');
        }
        $coches = [];
        foreach ($aux as $coche) {
            $coches[] = (object) $coche;
        }
        return $coches;
    }
    public function obtenerCoche($matricula)
    {
        $aux = obtenerTodos();
        foreach ($aux as $coche) {
            if ($coche->matricula === $matricula) {
                return $coche;
            }
        }
        return null;
    }

    public function eliminar($matricula)
    {
        $aux = obtenerTodos();
        $devolver = [];
        foreach ($aux as $coche) {
            if ($coche->matricula === $matricula) {
                continue;
            } else {
                $devolver[] = $coche;
            }

        }
        return $devolver;
    }

    public function actualizar($matricula, Coche $nuevoCoche)
    {
        $aux = obtenerTodos();
        $nuevoCoche->matricula = $matricula;
        $devolver = [];
        foreach ($aux as $coche) {
            if ($coche->matricula === $matricula) {
                $coche = clone $nuevoCoche;
            }

            $devolver[] = $coche;
        }
        return $devolver;
    }

    public function verTodos()
    {
        $aux = obtenerTodos();
        foreach ($aux as $coche) {
            echo $coche;
        }
    }
    private function obtenerTodos()
    {
        if (file_exists($this::FICHERO)) {
            $aux = json_decode(file_get_contents($this::FICHERO), true, 512);
        } else {
            file_put_contents($this::FICHERO, '');
        }
        return $aux;
    }

    private function arrayDeCoches()
    {
        $coches = file_get_contents($this::FICHERO);
        return json_decode($coches, true, 512);
    }
}


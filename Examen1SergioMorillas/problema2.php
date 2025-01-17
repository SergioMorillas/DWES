<?php

require_once "Faker/src/autoload.php";

/**
 * undocumented class
 */
class Corredor
{
    private $id;
    private $nombre;
    private $edad;
    private $nacionalidad;
    private $carreras;

    public function __construct($nombre, $edad, $nacionalidad)
    {
        $this->id = hash("sha256", $nombre . " " . $edad . " " . $nacionalidad);
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->nacionalidad = $nacionalidad;
    }
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    public function aniadeCarrera($carrera, $tiempo, $precio)
    {
        $carrera->tiempoTotal = $tiempo;
        $carrera->precio = $precio;
        $this->carreras[] = $carrera;
    }
    public function __toString()
    {
        $carreras = count($this->carreras);
        $carrerasTexto = "";
        foreach ($this->carreras as $carrera) {
            $carrerasTexto .= "\t" . $carrera;
        }
        return "Nombre: {$this->nombre}\tEdad: {$this->edad}\tNacionalidad: {$this->nacionalidad}\tCarreras: Ha participado en {$carreras} carreras:\n{$carrerasTexto}";
    }

}
class Carrera
{
    private $id;
    private $nombre;
    private $fecha;
    private $ubicacion;
    private $precio;
    private $tiempoTotal;
    private $kms;

    public function __construct($nombre, $fecha, $ubicacion)
    {

        $this->id = hash("sha256", $nombre . " " . date_format($fecha, "d/m/Y") . " " . $ubicacion);
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->ubicacion = $ubicacion;
    }
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    /**
     * @return string
     */
    public function __toString()
    {
        $fecha = date_format($this->fecha, "d/m/Y");
        return "Nombre: {$this->nombre}\tFecha: {$fecha}\tUbicacion: {$this->ubicacion}\tTiempoTotal: {$this->tiempoTotal}\tKms: {$this->kms}\n";
    }
}

function mejoresCarreras($id, $corredores)
{
    // Bucle que itera por todos los corredores
    foreach ($corredores as $corredor) {
        // Triple igual para hacer clean code en PHP
        if ($corredor->id === $id) {
            $carrerasAux = $corredor->carreras;
            usort($carrerasAux, function ($a, $b) {
                return $a->tiempoTotal - $b->tiempoTotal;
            });
            return array_slice($carrerasAux, 0, 3);
        }
    }
}

$faker = Faker\Factory::create('es_ES'); // Crear objeto de tipo Faker es-ES
$corredores = [];
for ($j = 0; $j < 5; $j++) {
    $corredor = new Corredor($faker->name, 20, $faker->country);
    for ($i = 0; $i < 5; $i++) { //Creamos 5 carreras y las asociamos al corredor
        $carrera = new Carrera($faker->name, $faker->datetime, $faker->city);
        $carrera->kms = $faker->randomNumber(2);
        // No se cuanto se suele tardar en una carrera, pongo entre 0 y 999 minutos, y el precio pongo entre 0 y 99 euros
        $corredor->aniadeCarrera($carrera, $faker->randomNumber(3), $faker->randomNumber(2));
    }
    $corredores[] = $corredor;
}
echo "=====================Todas carreras=====================\n";

echo $corredores[1];

$mejores = (mejoresCarreras($corredores[1]->id, $corredores));
echo "=====================Mejores carreras ordenadas=====================\n";
foreach ($mejores as $carrera) {
    echo $carrera;

}

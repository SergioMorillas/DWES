<!-- Crea un array asociativo que contenga 10 objetos de tipo cliente. Cada cliente
debe tener los siguientes atributos: id, nombre, teléfono y edad.
Posteriormente, crea un menú al usuario con las siguientes opciones:

1. Mostrar el primer cliente.
2. Mostrar el último cliente.
3. Mostrar el siguiente cliente.
4. Mostrar el anterior cliente.
5. Mostrar listado completo.
6. Salir del programa.

Para desplazarte por el array utiliza las funciones reset, end, next, prev o
current explicadas en clase. El programa debe detectar lo límites indicando al
usuario el mensaje “NO HAY REGISTROS EN LA DIRECCIÓN INDICADA”.
NOTA: Puedes ver nuevamente la documentación del uso de dichas funciones en
php.net. -->
<?php
require_once("../Faker/src/autoload.php");
class Persona
{
    private $id;
    private $nombre;
    private $telefono;
    private $edad;
    public function __construct($nombre, $telefono, $edad)
    {
        $this->id = hash("sha256", $nombre . " " . $telefono . " " . $edad);
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->edad = $edad;
    }
    public function __get($name)
    {
        return isset($this->$name) ? $this->$name : null;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "============================\nId: {$this->id}, \n\tNombre: {$this->nombre}, \n\tTelefono: {$this->telefono}, \n\tEdad: {$this->edad}\n============================\n";
    }
}
$faker = Faker\Factory::create();
$personas = [];
for ($i=0; $i < 11; $i++) { 
    $aux = new Persona($faker->name, $faker->phoneNumber, $i**2);
    $personas[$aux->id] = $aux;
}
$menu = <<< 'fin'
1. Mostrar el primer cliente.
2. Mostrar el último cliente.
3. Mostrar el siguiente cliente.
4. Mostrar el anterior cliente.
5. Mostrar listado completo.
6. Salir del programa.

fin;

$input = -1;
while ($input!=6) {
    echo $menu;
    $input=readline("Introduce la opción que necesitas: ");
    switch ($input) {
        case 1:
            reset($personas);
            echo current($personas);
            break;
        case 2:
            end($personas);
            echo current($personas);
        case 3:
            $response = next($personas);
            if ($response) {
                echo current($personas);
            } else {
                echo "NO HAY REGISTROS EN LA DIRECCIÓN INDICADA\n";
            }

            break;
        case 4:
            $response=prev($personas);
            if ($response) {
                echo current($personas);
            } else {
                echo "NO HAY REGISTROS EN LA DIRECCIÓN INDICADA\n";
            }
            break;
        case 5:
            reset($personas);
            $response = next($personas);
            while ($response) {
                echo current($personas);
                $response = next($personas);
            }
            break;
        case 6:
            echo "Has decidido salir del programa, gracias y adios\n";
            break;
        default:
            echo "Has introducido el texto que no era, intentalo de nuevo\n";
            break;
    }
}
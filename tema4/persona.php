<?php
/*EJERCICIO 13: Creación y Uso de Objetos
Define una clase Persona con propiedades nombre y edad. Crea el método identificate que muestra un mensaje con el nombre y la edad de la persona. Crea una instancia de Persona, establece sus propiedades y llama al método.*/

class Persona {
    public $nombre;
    public $edad;
    public function __construct($nombre, $edad){

        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    public function identificate(){
        echo "Hola, soy $this->nombre y tengo $this->edad años.\n";
    }

}

/*EJERCICIO 14: Clonación de Objetos
Crea una clase llamada Libro con una propiedad: título y autor. Clona un objeto de esta clase y modifica la propiedad título en el objeto una vez clonado. Muestra las propiedades de ambos objetos.
*/ 
class Libro {
    public $titulo;
    public $autor;
    public function __construct($titulo, $autor){
        $this->titulo = $titulo;
        $this->autor = $autor;
    }
    public function identificacion(){
        echo "Libro $this->titulo del autor $this->autor.\n";
    }

}

// EJERCICIO 15: Constructor y Destructor
// Crea una clase DBConnection que utilice un constructor para establecer una conexión a una base de datos y un destructor para cerrar la conexión cuando el objeto ya no sea necesario. Simula la conexión y desconexión con mensajes.
class DBConnection {
    public function __construct(){
        echo "Te has conectado a la base de datos\n";
    }
    public function __destruct(){
        echo "Se ha cortado la conexion con la base de datos\n";
    }

}

/*EJERCICIO 16: Métodos y Propiedades Estáticas
Define una clase Contador que tenga una propiedad estática cuenta que lleve el conteo de cuántas veces se ha creado una instancia de la clase. Crea un método estático getCuenta que devuelva el valor de cuenta. Crea varias instancias de la clase Contador y muestra el conteo total usando el método estático.
*/
class Contador {
    private static $contador=0;

    public function __construct(){
        self::$contador++;
    }


    public static function getContador(){
        return self::$contador;
    }

}

$persona = new Persona("Sergio", 22);
$persona->identificate();


$libro1 = new Libro("El imperio final", "Brandon Sanderson");

$libro2 = clone $libro1;

$libro2->titulo = "El pozo de la ascension";

$libro1 -> identificacion();
$libro2 -> identificacion();


$connection = new DBConnection();
unset($connection);

$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();
$ultimo = new Contador();

$cont = $ultimo -> getContador();
echo $cont;
?>
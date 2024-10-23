<?php
/*EJERCICIO 13: Creación y Uso de Objetos
Define una clase Persona con propiedades nombre y edad. Crea el método identificate que muestra un mensaje con el nombre y la edad de la persona. Crea una instancia de Persona, establece sus propiedades y llama al método.*/
include_once "lib_vector.php";
class Persona
{
    public $nombre;
    public $edad;
    public function __construct($nombre, $edad)
    {

        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    public function identificate()
    {
        echo "Hola, soy $this->nombre y tengo $this->edad años.\n\n";
    }

}

/*EJERCICIO 14: Clonación de Objetos
Crea una clase llamada Libro con una propiedad: título y autor. Clona un objeto de esta clase y modifica la propiedad título en el objeto una vez clonado. Muestra las propiedades de ambos objetos.
 */
class Libro
{
    public $titulo;
    public $autor;
    public function __construct($titulo, $autor)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }
    public function identificacion()
    {
        echo "Libro $this->titulo del autor $this->autor.\n\n";
    }

}

// EJERCICIO 15: Constructor y Destructor
// Crea una clase DBConnection que utilice un constructor para establecer una conexión a una base de datos y un destructor para cerrar la conexión cuando el objeto ya no sea necesario. Simula la conexión y desconexión con mensajes.
class DBConnection
{
    public function __construct()
    {
        echo "Te has conectado a la base de datos\n\n";
    }
    public function __destruct()
    {
        echo "Se ha cortado la conexion con la base de datos\n\n";
    }

}

/*EJERCICIO 16: Métodos y Propiedades Estáticas
Define una clase Contador que tenga una propiedad estática cuenta que lleve el conteo de cuántas veces se ha creado una instancia de la clase. Crea un método estático getCuenta que devuelva el valor de cuenta. Crea varias instancias de la clase Contador y muestra el conteo total usando el método estático.
 */
class Contador
{
    private static $contador = 0;

    public function __construct()
    {
        self::$contador++;
    }

    public static function getContador()
    {
        return self::$contador;
    }
}

// EJERCICIO 17: Métodos y Propiedades Estáticas
// Crea una clase abstracta en PHP llamada Figura,  como propiedades tendrá un objeto de la clase Punto (x,y) y el color de la figura. Como métodos: area y un método dibujar.
// Luego, crea dos clases que implementen esta  clase: Circulo y Rectangulo. La clase Circulo debe calcular el área de un círculo dado su radio y permitir dibujar un círculo con <svg>, en la posición y el color heredado.
// Lo mismo para la clase Rectangulo que debe calcular el área de un rectángulo dado su ancho y altura y también dibujarlo.
// Posteriormente implementa un script que instancie 10 círculos y 10 rectángulos y los muestre en un canvas en el navegador.

class Punto
{
    public $x;
    public $y;
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
abstract class Figura
{
    public $punto;
    public $color;

    public function __construct($punto, $color)
    {
        $this->punto = $punto;
        $this->color = $color;

    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    abstract public function area();
    abstract public function dibujar();
}

class Circulo extends Figura
{
    private $radio;
    public function __construct($punto, $color, $radio)
    {
        parent::__construct($punto->x, $punto->y, $color);
        $this->radio = $radio;
    }
    public function area()
    {
        return M_PI * $this->radio ** 2;
    }
    public function dibujar()
    {
        return generarCirculoCanva($this->punto->x, $this->punto->y, $this->radio, $this->color, ($this->radio * 2));
    }

}
class Rectangulo extends Figura
{
    private $alto;
    private $ancho;
    public function __construct($punto, $alto, $ancho)
    {
        parent::__construct($punto->x, $punto->y, "blue");

        $this->alto = $alto;
        $this->ancho = $ancho;
    }
    public function setColor($color)
    {
        if ($color instanceof string) {
            $this->color = $color;
            return true;
        } else {
            return false;
        }

    }
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function area()
    {
        return $this->alto * $this->ancho;
    }
    public function dibujar()
    {
        return generarRectanguloEnCanva($this->punto->x, $this->punto->y, $this->ancho, $this->alto, $this->color);
    }
}

// EJERCICIO 18: Trabajando con interfaces
// Crea una interfaz en PHP llamada Vehículo que defina los siguientes tres métodos:
// arrancar(): Método para encender el vehículo.
// detenet(): Método para detener el vehículo.
// getNivelGasolina(): Método para obtener el nivel de combustible del vehículo.
// Luego, implementa esta interfaz en dos clases: Coche y Moto. Cada clase debe proporcionar su propia implementación de estos métodos. Por ejemplo, al encender el vehículo, debe mostrar un mensaje indicando que el automóvil o la motocicleta se ha encendido, y el método getNivelGasolina debe simular la obtención de un nivel de combustible. El nivel de gasolina se irá reduciendo en unidades de 10 en 10 si el Coche está arrancado y por cada invocación al método getNivelGasolina. Para la Moto descenderá en 5 unidades.
// Finalmente, escribe un script que cree instancias de ambas clases, las encienda, muestre el nivel de combustible y luego las apague.

interface Vehiculo
{
    public function arrancar();
    public function detener();
    public function getNivelGasolina();
}

class Coche implements Vehiculo
{
    public $gasolina;
    public $estaArrancado;

    public function __construct($gasolina)
    {
        $this->gasolina = $gasolina;
    }
    public function arrancar()
    {
        if (!$this->estaArrancado) {
            echo "El vehiculo estaba apagado y se ha arrancado, tiene ".$this->gasolina." unidades de gasolina\n";
            $this->estaArrancado = true;
            return true;
        } else {
            return false;
        }
    }
    public function detener()
    {
        if ($this->estaArrancado) {
            echo "El vehiculo estaba arrancado y se ha apagado, tiene ".$this->gasolina." unidades de gasolina\n";

            $this->estaArrancado = false;
            return true;
        } else {
            return false;
        }
    }
    public function getNivelGasolina()
    {
        if ($this->estaArrancado && $this->gasolina - 10> 0) {
            $this->gasolina -= 10;
            echo "El vehiculo esta encendido y tiene ".$this->gasolina." unidades de gasolina\n";
        } else {
            echo "El vehiculo esta apagado y tiene ".$this->gasolina." unidades de gasolina\n";
        }
    }
}
class Moto implements Vehiculo
{
    public $gasolina;
    public $estaArrancado;

    public function __construct($gasolina)
    {
        $this->gasolina = $gasolina;
    }
    public function arrancar()
    {
        if (!$this->estaArrancado) {
            echo "El vehiculo estaba apagado y se ha arrancado, tiene "+$this->gasolina+" unidades de gasolina\n";
            $this->estaArrancado = true;
            return true;
        } else {
            return false;
        }
    }
    public function detener()
    {
        if ($this->estaArrancado) {
            echo "El vehiculo estaba arrancado y se ha apagado, tiene ".$this->gasolina." unidades de gasolina\n";

            $this->estaArrancado = false;
            return true;
        } else {
            return false;
        }
    }
    public function getNivelGasolina()
    {
        if ($this->estaArrancado && $this->gasolina - 5 > 0) {
            $this->gasolina -= 5;
            echo "El vehiculo esta encendido y tiene ".$this->gasolina." unidades de gasolina\n";
        } else {
            echo "El vehiculo esta apagado y tiene ".$this->gasolina." unidades de gasolina\n";
        }
    }
}

// $persona = new Persona("Sergio", 22);
// $persona->identificate();

// $libro1 = new Libro("El imperio final", "Brandon Sanderson");

// $libro2 = clone $libro1;

// $libro2->titulo = "El pozo de la ascension";

// $libro1->identificacion();
// $libro2->identificacion();

// $connection = new DBConnection();
// unset($connection);
// $rectangulo = new Rectangulo(new Punto(1, 2), "blue", 100, 200);
// echo $rectangulo->dibujar(\n);
// $circulo = new Circulo(new Punto(100, 100), "blue", 100, 200);
// echo $circulo->dibujar(\n);

// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();
// $ultimo = new Contador();

// $cont = $ultimo->getContador();
// echo $con\nt;

$coche = new Coche(100);

$coche->arrancar();
$coche->getNivelGasolina();
$coche->getNivelGasolina();
$coche->getNivelGasolina();
$coche->detener();
$coche->getNivelGasolina();
$coche->getNivelGasolina();

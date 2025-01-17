<?php
namespace MiNamespace;
// Librería PHP con diversas funcionalidades explicadas

// 1. Funciones con argumentos por referencia y argumentos opcionales
function sumar(&$a, $b = 0) {
    $a += $b; // Modifica directamente la variable $a
}

$x = 5;
$y = 10;
sumar($x, $y);
echo "Resultado de la suma: $x\n";  // $x es modificado por referencia

// 2. Recursividad: función que calcula el factorial de un número
function factorial($n) {
    if ($n == 0) return 1;
    return $n * factorial($n - 1);
}

echo "Factorial de 5: " . factorial(5) . "\n";

// 3. Funciones de cadena
$cadena = "Hola, mundo!";
echo "Longitud de la cadena: " . strlen($cadena) . "\n"; // Tamaño de la cadena
echo "Cadena en mayúsculas: " . strtoupper($cadena) . "\n"; // Convertir a mayúsculas
echo "Buscar 'mundo' en la cadena: " . strpos($cadena, "mundo") . "\n"; // Buscar subcadena

// 4. Funciones de fecha
echo "Fecha actual: " . date("Y-m-d H:i:s") . "\n"; // Fecha y hora actual
echo "Fecha 10 días después: " . date("Y-m-d", strtotime("+10 days")) . "\n"; // Fecha dentro de 10 días
echo "Fecha 10 días antes: " . date("Y-m-d", strtotime("-10 days")) . "\n"; // Fecha hace 10 días

// 5. Programación Orientada a Objetos (POO)
// Definición de una clase
class Persona {
    // Propiedades
    private $nombre;
    private $edad;

    // Constructor
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Métodos
    public function saludar() {
        echo "Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años.\n";
    }

    // Métodos mágicos (getters y setters)
    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    // Destructor
    public function __destruct() {
        echo "Destruyendo el objeto Persona: " . $this->nombre . "\n";
    }
}

$persona = new Persona("Juan", 30);
$persona->saludar();
$persona->edad = 31; // Modificamos la propiedad usando el setter mágico
echo "Edad actualizada: " . $persona->edad . "\n";  // Usamos el getter mágico
// Destructor se llama automáticamente al final del script

// 6. Constantes
define("PI", 3.141592);
echo "El valor de PI es: " . PI . "\n"; // Constante global

// 7. Herencia
class Empleado extends Persona {
    private $puesto;

    public function __construct($nombre, $edad, $puesto) {
        parent::__construct($nombre, $edad); // Llamada al constructor de la clase base
        $this->puesto = $puesto;
    }

    public function mostrarPuesto() {
        echo "Soy " . $this->nombre . " y trabajo como " . $this->puesto . ".\n";
    }
}

$empleado = new Empleado("Carlos", 28, "Desarrollador");
$empleado->saludar();
$empleado->mostrarPuesto();

// 8. Interfaces
interface Calculable {
    public function calcular();
}

class Cuadrado implements Calculable {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcular() {
        return $this->lado * $this->lado;
    }
}

$cuadrado = new Cuadrado(5);
echo "Área del cuadrado: " . $cuadrado->calcular() . "\n";

// 9. Clases Abstractas
abstract class Animal {
    abstract public function hacerSonido();

    public function respirar() {
        echo "El animal está respirando.\n";
    }
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "Guau guau\n";
    }
}

$perro = new Perro();
$perro->hacerSonido();
$perro->respirar();

// 10. Namespaces

class MiClase {
    public function saludar() {
        echo "¡Hola desde MiNamespace!\n";
    }
}

$objeto = new MiClase();
$objeto->saludar();

// 11. Arrays Numéricos
$numeros = array(1, 2, 3, 4, 5);
echo "Elemento en el índice 2: " . $numeros[2] . "\n"; // Acceso a un elemento

// 12. Arrays Asociativos
$persona = array(
    "nombre" => "Juan",
    "edad" => 30,
    "ocupacion" => "Desarrollador"
);

echo "Nombre: " . $persona["nombre"] . "\n"; // Acceso por clave
echo "Edad: " . $persona["edad"] . "\n"; // Acceso por clave
echo "Ocupación: " . $persona["ocupacion"] . "\n"; // Acceso por clave

// 13. Ordenación de Arrays
// Ordenar un array numérico
$numeros = array(5, 3, 8, 1, 2);
sort($numeros);  // Ordena el array de menor a mayor
echo "Numeros ordenados: " . implode(", ", $numeros) . "\n";  // Muestra el array ordenado

// Ordenar un array asociativo por valores
$persona = array(
    "Juan" => 30,
    "Maria" => 25,
    "Carlos" => 35
);
asort($persona);  // Ordena el array por los valores
echo "Edades ordenadas: " . implode(", ", $persona) . "\n";

// 14. Funciones printf y sprintf
$nombre = "Juan";
$edad = 30;
printf("Mi nombre es %s y tengo %d años.\n", $nombre, $edad);  // printf imprime directamente
$mensaje = sprintf("Mi nombre es %s y tengo %d años.\n", $nombre, $edad);  // sprintf devuelve el mensaje
echo "Mensaje con sprintf: " . $mensaje;

// 15. Trabajar con Ficheros
// Abrir un archivo para escritura
$file = fopen("test.txt", "w");
if ($file) {
    fputs($file, "Este es un archivo de texto de ejemplo.\n");
    fclose($file);
    echo "Archivo escrito con éxito.\n";
} else {
    echo "No se pudo abrir el archivo.\n";
}

// Leer un archivo
$file = fopen("test.txt", "r");
if ($file) {
    while ($line = fgets($file)) {
        echo "Contenido del archivo: " . $line;
    }
    fclose($file);
} else {
    echo "No se pudo abrir el archivo para lectura.\n";
}

// Leer todo el contenido de un archivo
$content = file_get_contents("test.txt");
echo "Contenido completo del archivo: " . $content . "\n";

// Escribir contenido completo a un archivo
file_put_contents("test_output.txt", $content);
echo "Contenido copiado a test_output.txt.\n";

// 16. JSON
// Codificar un array a formato JSON
$array = array(
    "nombre" => "Juan",
    "edad" => 30,
    "ocupacion" => "Desarrollador"
);
$json = json_encode($array);
echo "JSON: " . $json . "\n";

// Decodificar JSON a un array asociativo
$array_decodificado = json_decode($json, true);
echo "Nombre del array decodificado: " . $array_decodificado["nombre"] . "\n";

// 17. CSV
// Escribir un archivo CSV
$data = array(
    array("Nombre", "Edad", "Ocupación"),
    array("Juan", 30, "Desarrollador"),
    array("Maria", 25, "Diseñadora")
);

$file = fopen("test.csv", "w");
foreach ($data as $row) {
    fputcsv($file, $row);
}
fclose($file);
echo "Archivo CSV escrito con éxito.\n";

// Leer un archivo CSV
$file = fopen("test.csv", "r");
if ($file) {
    while ($row = fgetcsv($file)) {
        echo "Fila del CSV: " . implode(", ", $row) . "\n";
    }
    fclose($file);
} else {
    echo "No se pudo abrir el archivo CSV.\n";
}

// 18. Funciones de fseek y feof
$file = fopen("test.txt", "r");
if ($file) {
    // Usar fseek para mover el puntero de archivo
    fseek($file, 10);
    echo "Contenido después de fseek: " . fgets($file) . "\n"; // Leer después de mover el puntero
    // Comprobar si hemos llegado al final del archivo
    if (feof($file)) {
        echo "Hemos llegado al final del archivo.\n";
    }
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 19. Función file_get_contents y file_put_contents
$contenido = file_get_contents("test.txt");
echo "Contenido leído con file_get_contents: " . $contenido . "\n";

// Escribir contenido con file_put_contents
file_put_contents("output.txt", "Nuevo contenido escrito en el archivo.");
echo "Contenido escrito con file_put_contents.\n";

// 20. Manejo de excepciones (Try-Catch)
try {
    // Intentamos abrir un archivo que no existe
    $file = fopen("nonexistent_file.txt", "r");
    if (!$file) {
        throw new Exception("No se pudo abrir el archivo.");
    }
} catch (Exception $e) {
    // Capturamos la excepción y mostramos el mensaje de error
    echo "Error: " . $e->getMessage() . "\n";
}

// 21. Clonación de objetos
class Libro {
    private $titulo;
    private $autor;

    public function __construct($titulo, $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function obtenerInformacion() {
        return "Título: " . $this->titulo . ", Autor: " . $this->autor;
    }
}

$libro1 = new Libro("1984", "George Orwell");
$libro2 = clone $libro1; // Clonamos el objeto

echo $libro1->obtenerInformacion() . "\n";
echo $libro2->obtenerInformacion() . "\n";

// 22. Manejo de sesiones
session_start();
$_SESSION["usuario"] = "Juan";  // Guardamos un dato en la sesión
echo "Usuario en sesión: " . $_SESSION["usuario"] . "\n";  // Accedemos al dato en la sesión

// 23. Cookies
setcookie("usuario", "Maria", time() + 3600);  // Creamos una cookie que dura 1 hora
if (isset($_COOKIE["usuario"])) {
    echo "Cookie de usuario: " . $_COOKIE["usuario"] . "\n";
} else {
    echo "La cookie no está establecida o ha expirado.\n";
}

// 24. Redirección
// Redirigir a una página diferente
header("Location: https://www.ejemplo.com");
exit();  // Detener la ejecución después de la redirección

// 25. Validación de formularios
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"] ?? '';  // Usamos null coalescing operator para evitar undefined index
    if (empty($nombre)) {
        echo "El nombre no puede estar vacío.\n";
    } else {
        echo "Hola, $nombre!\n";
    }
}
?>

<!-- Formulario HTML para probar la validación -->
<form method="post">
    Nombre: <input type="text" name="nombre">
    <input type="submit" value="Enviar">
</form>

<?php
// 26. Uso de PDO para trabajar con bases de datos (MySQL)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mi_base_de_datos", "usuario", "contraseña");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar y ejecutar una consulta
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE edad > ?");
    $stmt->execute([30]);

    // Obtener resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Usuario: " . $row["nombre"] . ", Edad: " . $row["edad"] . "\n";
    }

} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage() . "\n";
}

// 27. Generación de archivos PDF (usando una librería externa, como FPDF)
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, '¡Hola, Mundo!');
$pdf->Output();  // Esto genera y muestra el PDF

// 28. Subida de archivos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $nombreArchivo = $_FILES["archivo"]["name"];
    $tmpArchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "uploads/" . $nombreArchivo;

    if (move_uploaded_file($tmpArchivo, $destino)) {
        echo "Archivo subido con éxito a $destino\n";
    } else {
        echo "Error al subir el archivo.\n";
    }
}
?>

<!-- Formulario HTML para subir un archivo -->
<form method="post" enctype="multipart/form-data">
    Selecciona un archivo: <input type="file" name="archivo">
    <input type="submit" value="Subir archivo">
</form>

<?php
// 29. Trabajo con fechas y horas
// Convertir una cadena de fecha a timestamp
$fecha = "2024-12-05 14:30:00";
$timestamp = strtotime($fecha);
echo "Timestamp de la fecha: " . $timestamp . "\n";

// Convertir timestamp a fecha
$fecha_formateada = date("d-m-Y H:i:s", $timestamp);
echo "Fecha formateada: " . $fecha_formateada . "\n";

// 30. Funciones de configuración y entorno
echo "Dirección IP del servidor: " . $_SERVER["SERVER_ADDR"] . "\n";  // Dirección IP del servidor
echo "Directorio temporal: " . sys_get_temp_dir() . "\n";  // Directorio temporal del sistema

// 31. Arrays - Búsqueda en Arrays
// Función array_search() busca un valor en un array
$frutas = array("manzana", "banana", "cereza");
$clave = array_search("banana", $frutas);
echo "La fruta 'banana' se encuentra en la posición: " . $clave . "\n";  // Muestra la posición de "banana"

// 32. Arrays - Destrucción de Arrays
// Usamos unset() para destruir un elemento de un array
$colores = array("rojo", "verde", "azul");
unset($colores[1]);  // Elimina el elemento en el índice 1 (verde)
echo "Colores después de unset: " . implode(", ", $colores) . "\n";

// 33. Manipulación de Arrays - array_map
// La función array_map aplica una función a cada elemento de un array
$numeros = array(1, 2, 3, 4);
$dobles = array_map(function($num) { return $num * 2; }, $numeros);
echo "Numeros duplicados: " . implode(", ", $dobles) . "\n";

// 34. Arrays - Funciones array_filter y array_walk
// array_filter filtra los elementos de un array con una función de callback
$numeros = array(1, 2, 3, 4, 5, 6);
$pares = array_filter($numeros, function($num) { return $num % 2 == 0; });
echo "Números pares: " . implode(", ", $pares) . "\n";

// 35. Arrays - Funciones array_reduce
// array_reduce reduce un array a un solo valor
$numeros = array(1, 2, 3, 4);
$suma = array_reduce($numeros, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Suma de los números: $suma\n";

// 36. Arrays - array_keys y array_values
// array_keys obtiene las claves de un array
$persona = array("nombre" => "Juan", "edad" => 30, "ocupacion" => "Desarrollador");
$claves = array_keys($persona);
echo "Claves del array: " . implode(", ", $claves) . "\n";

// array_values obtiene los valores de un array
$valores = array_values($persona);
echo "Valores del array: " . implode(", ", $valores) . "\n";

// 37. Función implode y explode
// implode convierte un array a una cadena
$frutas = array("manzana", "banana", "cereza");
$cadena = implode(", ", $frutas);
echo "Frutas unidas: $cadena\n";

// explode convierte una cadena a un array
$cadena = "manzana, banana, cereza";
$array_frutas = explode(", ", $cadena);
echo "Frutas desde explode: " . implode(", ", $array_frutas) . "\n";

// 38. Función isset
// isset() verifica si una variable está definida y no es null
$variable = "Hola Mundo";
if (isset($variable)) {
    echo "La variable está definida.\n";
} else {
    echo "La variable no está definida.\n";
}

// 39. Función empty
// empty() verifica si una variable está vacía
$variable_vacia = "";
if (empty($variable_vacia)) {
    echo "La variable está vacía.\n";
} else {
    echo "La variable no está vacía.\n";
}

// 40. Función die
// La función die termina la ejecución del script
if ($numeros[0] < 0) {
    die("Error: El primer número es negativo. Terminando ejecución.\n");
}

echo "Este código nunca se ejecutará si el número es negativo.\n";

// 41. Función json_encode y json_decode
// Codificar un array en formato JSON
$array = array(
    "nombre" => "Juan",
    "edad" => 30,
    "ocupacion" => "Desarrollador"
);
$json = json_encode($array);
echo "JSON codificado: $json\n";

// Decodificar una cadena JSON a un array asociativo
$array_decodificado = json_decode($json, true);
echo "Nombre del array decodificado: " . $array_decodificado["nombre"] . "\n";

// 42. Funciones de manipulación de archivos - fopen, fclose, fwrite, fread
// Abrir un archivo para escritura
$file = fopen("example.txt", "w");
if ($file) {
    fwrite($file, "Contenido de ejemplo.\n");
    fclose($file);
    echo "Archivo creado y escrito con éxito.\n";
} else {
    echo "Error al abrir el archivo.\n";
}

// Leer desde un archivo
$file = fopen("example.txt", "r");
if ($file) {
    $contenido = fread($file, filesize("example.txt"));
    echo "Contenido del archivo: $contenido\n";
    fclose($file);
} else {
    echo "No se pudo abrir el archivo para lectura.\n";
}

// 43. Comprobación del final del archivo con feof
$file = fopen("example.txt", "r");
if ($file) {
    while (!feof($file)) {
        $linea = fgets($file);
        echo "Leyendo: $linea";
    }
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 44. Manipulación de punteros de archivo con fseek
$file = fopen("example.txt", "r");
if ($file) {
    fseek($file, 0);  // Mueve el puntero al inicio del archivo
    $linea = fgets($file);
    echo "Primera línea leída: $linea\n";
    fseek($file, 10); // Mueve el puntero al byte 10
    $linea = fgets($file);
    echo "Línea después de fseek: $linea\n";
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 45. Función file_exists
// Verificar si un archivo existe
if (file_exists("example.txt")) {
    echo "El archivo 'example.txt' existe.\n";
} else {
    echo "El archivo 'example.txt' no existe.\n";
}

// 46. Manejo de excepciones con Throw
function dividir($a, $b) {
    if ($b == 0) {
        throw new Exception("No se puede dividir por cero.");
    }
    return $a / $b;
}

try {
    echo dividir(10, 2) . "\n";  // Esto funcionará
    echo dividir(10, 0) . "\n";  // Esto lanzará una excepción
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// 47. Redirección con HTTP
// Redirigir a una URL externa
header("Location: https://www.ejemplo.com");
exit();  // Importante para evitar que el script siga ejecutándose

// 48. Manejo de fechas con DateTime
// Crear un objeto DateTime y formatearlo
$fecha = new DateTime("2024-12-05 14:30:00");
echo "Fecha y hora: " . $fecha->format("Y-m-d H:i:s") . "\n";

// Modificar la fecha con DateTime
$fecha->modify("+10 days");
echo "Fecha después de 10 días: " . $fecha->format("Y-m-d H:i:s") . "\n";

// Comparar fechas con DateTime
$fecha2 = new DateTime("2024-12-15");
if ($fecha < $fecha2) {
    echo "La primera fecha es anterior a la segunda.\n";
} else {
    echo "La primera fecha es posterior o igual a la segunda.\n";
}

// 49. Función strtotime para manipulación de fechas
$fecha = strtotime("next Friday");
echo "Fecha del próximo viernes: " . date("Y-m-d", $fecha) . "\n";

// 50. Expresiones regulares con preg_match
$texto = "Mi correo es juan@ejemplo.com";
if (preg_match("/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/", $texto)) {
    echo "El correo electrónico es válido.\n";
} else {
    echo "El correo electrónico no es válido.\n";
}

// 51. Funciones de fecha - date, time y mktime
// Obtener la fecha y hora actual con date()
$fecha_actual = date("Y-m-d H:i:s");
echo "Fecha y hora actual: $fecha_actual\n";

// Obtener el timestamp actual con time()
$timestamp = time();
echo "Timestamp actual: $timestamp\n";

// Crear una fecha usando mktime() a partir de los componentes de fecha
$timestamp_fecha = mktime(14, 30, 0, 12, 5, 2024);
echo "Timestamp de una fecha específica: " . date("Y-m-d H:i:s", $timestamp_fecha) . "\n";

// 52. Constantes en PHP
// Definir una constante con define()
define("PI", 3.14159);
echo "El valor de PI es: " . PI . "\n";

// 53. Constantes mágicas
// Utilizar una constante mágica para obtener el nombre del archivo
echo "Este código está en el archivo: " . __FILE__ . "\n";

// 54. Funciones de depuración
// Utilizar var_dump() para imprimir la estructura de una variable
$usuario = array("nombre" => "Juan", "edad" => 30);
var_dump($usuario);

// Utilizar print_r() para imprimir información legible
print_r($usuario);

// 55. Trabajo con clases y objetos (POO)
class Coche {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function obtenerInformacion() {
        return "Coche: " . $this->marca . " " . $this->modelo;
    }
}

$coche = new Coche("Toyota", "Corolla");
echo $coche->obtenerInformacion() . "\n";

// 56. Propiedades y métodos estáticos
class Math {
    public static $pi = 3.14159;

    public static function calcularAreaCirculo($radio) {
        return self::$pi * pow($radio, 2);
    }
}

echo "Área de un círculo con radio 5: " . Math::calcularAreaCirculo(5) . "\n";

// 57. Métodos mágicos - __construct, __destruct
// Método constructor
class Persona {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        echo "Persona creada: $nombre\n";
    }

    // Método destructor
    public function __destruct() {
        echo "Persona destruida: $this->nombre\n";
    }
}

$persona = new Persona("Juan");
// Al final del script, el objeto será destruido y se llamará al destructor

// 58. Herencia
class Animal {
    public function hacerSonido() {
        echo "El animal hace un sonido.\n";
    }
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "El perro ladra.\n";
    }
}

$animal = new Animal();
$perro = new Perro();

$animal->hacerSonido();  // El animal hace un sonido.
$perro->hacerSonido();   // El perro ladra.

// 59. Interfaces
interface Vehiculo {
    public function arrancar();
    public function detener();
}

class Coche implements Vehiculo {
    public function arrancar() {
        echo "El coche está arrancando.\n";
    }

    public function detener() {
        echo "El coche se ha detenido.\n";
    }
}

$coche = new Coche();
$coche->arrancar();
$coche->detener();

// 60. Clases Abstractas
abstract class Forma {
    abstract public function area();
}

class Circulo extends Forma {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function area() {
        return pi() * pow($this->radio, 2);
    }
}

$circulo = new Circulo(5);
echo "Área del círculo: " . $circulo->area() . "\n";

// 61. Namespaces en PHP
// Los namespaces ayudan a organizar el código y evitar conflictos de nombres

namespace Vehiculos;
class Coche {
    public function arrancar() {
        echo "El coche está arrancando.\n";
    }
}

namespace Animales;
class Perro {
    public function ladrar() {
        echo "El perro está ladrando.\n";
    }
}

// Usar clases dentro de un namespace específico
$miCoche = new \Vehiculos\Coche();
$miCoche->arrancar();

$miPerro = new \Animales\Perro();
$miPerro->ladrar();

// 62. Función header() para establecer cabeceras HTTP
// Establecer una cabecera para indicar que la respuesta es JSON
header('Content-Type: application/json');
echo json_encode(["mensaje" => "Este es un mensaje JSON."]);

// 63. Ficheros CSV
// Abrir un archivo CSV y leer sus líneas
$file = fopen("datos.csv", "r");
if ($file) {
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        echo "Nombre: " . $data[0] . ", Edad: " . $data[1] . "\n";
    }
    fclose($file);
} else {
    echo "No se pudo abrir el archivo CSV.\n";
}

// 64. Escritura en ficheros CSV
// Crear un archivo CSV y escribir datos
$file = fopen("nuevos_datos.csv", "w");
if ($file) {
    $datos = [
        ["Juan", 30],
        ["Maria", 25],
        ["Carlos", 40]
    ];
    
    foreach ($datos as $linea) {
        fputcsv($file, $linea);
    }
    fclose($file);
    echo "Datos escritos en el archivo CSV.\n";
} else {
    echo "No se pudo abrir el archivo CSV para escribir.\n";
}

// 65. Funciones de ficheros JSON
// Crear un archivo JSON con datos
$datos_json = [
    "usuario" => "Juan",
    "edad" => 30,
    "ocupacion" => "Desarrollador"
];
file_put_contents("usuario.json", json_encode($datos_json));
echo "Archivo JSON creado.\n";

// Leer un archivo JSON
$json_leido = file_get_contents("usuario.json");
$datos_decodificados = json_decode($json_leido, true);
echo "Nombre del usuario desde JSON: " . $datos_decodificados["usuario"] . "\n";

// 66. Comprobación de fin de archivo con feof()
$file = fopen("nuevos_datos.csv", "r");
if ($file) {
    while (!feof($file)) {
        $linea = fgets($file);
        echo $linea;
    }
    fclose($file);
} else {
    echo "Error al abrir el archivo.\n";
}

// 67. Configuración de valores predeterminados con ?? (Null Coalescing Operator)
$nombre = $_GET["nombre"] ?? "Invitado";  // Si no se pasa "nombre", usamos "Invitado"
echo "Bienvenido, $nombre!\n";

// 68. Función array_multisort() para ordenar arrays
// Ordenar un array multidimensional por varias columnas
$personas = [
    ["nombre" => "Juan", "edad" => 30],
    ["nombre" => "Maria", "edad" => 25],
    ["nombre" => "Carlos", "edad" => 40]
];

array_multisort(array_column($personas, "edad"), SORT_ASC, $personas);
echo "Personas ordenadas por edad:\n";
foreach ($personas as $persona) {
    echo $persona["nombre"] . " - Edad: " . $persona["edad"] . "\n";
}

// 69. Usar funciones para manipulación de cadenas: strlen(), substr(), str_replace()
$texto = "Hola Mundo";
echo "Longitud del texto: " . strlen($texto) . "\n";  // Longitud de la cadena

$subcadena = substr($texto, 0, 4);
echo "Subcadena (primeros 4 caracteres): $subcadena\n";  // "Hola"

$texto_reemplazado = str_replace("Mundo", "PHP", $texto);
echo "Texto con reemplazo: $texto_reemplazado\n";  // "Hola PHP"

// 70. Funciones de manipulaciones con fputs(), fgets(), fread()
$file = fopen("example.txt", "w");
if ($file) {
    fputs($file, "Hola, este es un ejemplo de fputs.\n");
    fclose($file);
}

$file = fopen("example.txt", "r");
if ($file) {
    $contenido = fgets($file);
    echo "Contenido leído con fgets: $contenido\n";
    fclose($file);
}

// 71. Funciones de manejo de excepciones - throw, try, catch
// Lanzar una excepción personalizada
class MiExcepcion extends Exception {
    public function errorMessage() {
        // mensaje de error
        return 'Error en la línea ' . $this->getLine() . ': ' . $this->getMessage();
    }
}

function testExcepcion() {
    throw new MiExcepcion("¡Algo salió mal!");
}

try {
    testExcepcion();
} catch (MiExcepcion $e) {
    echo $e->errorMessage() . "\n";
}

// 72. Recursividad
// Función factorial recursiva
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo "Factorial de 5: " . factorial(5) . "\n"; // 120

// 73. Función array_diff
// Compara dos arrays y devuelve los valores de un array que no están en el otro
$array1 = array(1, 2, 3, 4, 5);
$array2 = array(4, 5, 6, 7, 8);
$diff = array_diff($array1, $array2);
echo "Elementos en array1 pero no en array2: " . implode(", ", $diff) . "\n";

// 74. Función array_intersect
// Devuelve los valores comunes entre dos arrays
$interseccion = array_intersect($array1, $array2);
echo "Elementos comunes entre array1 y array2: " . implode(", ", $interseccion) . "\n";

// 75. Filtrado de arrays con array_filter
// Filtrar valores de un array
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$pares = array_filter($numeros, function($num) {
    return $num % 2 == 0;  // Retorna solo números pares
});
echo "Números pares: " . implode(", ", $pares) . "\n";

// 76. Función explode para separar cadenas
// Separar una cadena en un array usando un delimitador
$frutas = "manzana,banana,cereza";
$array_frutas = explode(",", $frutas);
echo "Frutas separadas: " . implode(", ", $array_frutas) . "\n";

// 77. Función implode para unir arrays
// Unir un array de elementos en una cadena, separada por comas
$colores = ["rojo", "verde", "azul"];
$cadena_colores = implode(", ", $colores);
echo "Colores unidos: $cadena_colores\n";

// 78. Función filter_var para sanitizar y validar datos
// Sanitizar y validar una dirección de correo electrónico
$email = "juan@ejemplo.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El correo electrónico '$email' es válido.\n";
} else {
    echo "El correo electrónico '$email' no es válido.\n";
}

// Sanitizar una URL
$url = "https://www.ejemplo.com";
$sanitized_url = filter_var($url, FILTER_SANITIZE_URL);
echo "URL sanitizada: $sanitized_url\n";

// 79. Función gettype y settype
// Obtener el tipo de una variable
$variable = 42;
echo "El tipo de variable es: " . gettype($variable) . "\n";

// Cambiar el tipo de una variable usando settype
settype($variable, "string");
echo "El nuevo tipo de la variable es: " . gettype($variable) . "\n";

// 80. Funciones de manipulación de cadenas: strtoupper(), strtolower(), ucfirst()
$texto = "hola mundo";
echo "Texto en mayúsculas: " . strtoupper($texto) . "\n";  // "HOLA MUNDO"
echo "Texto en minúsculas: " . strtolower($texto) . "\n";  // "hola mundo"
echo "Texto capitalizado: " . ucfirst($texto) . "\n";       // "Hola mundo"


// 81. Funciones para manipulación de fechas: date_create(), date_diff(), date_format()
// Crear un objeto DateTime desde una cadena
$fecha_inicio = date_create("2024-01-01");

// Crear un objeto DateTime para la fecha actual
$fecha_actual = date_create();

// Calcular la diferencia entre dos fechas
$diferencia = date_diff($fecha_inicio, $fecha_actual);
echo "Días de diferencia: " . $diferencia->days . "\n";

// Formatear una fecha con un formato específico
echo "Fecha formateada: " . date_format($fecha_inicio, "d/m/Y") . "\n";

// 82. Uso de is_array() y array_push()
$frutas = ["manzana", "banana"];
if (is_array($frutas)) {
    echo "Es un array.\n";
}

// Añadir elementos al final de un array
array_push($frutas, "cereza", "naranja");
echo "Frutas después de array_push: " . implode(", ", $frutas) . "\n";

// 83. Función array_merge()
$vegetales = ["tomate", "pepino"];
$productos = array_merge($frutas, $vegetales);
echo "Frutas y vegetales combinados: " . implode(", ", $productos) . "\n";

// 84. Operadores de comparación en arrays: in_array()
$colores = ["rojo", "verde", "azul"];
if (in_array("rojo", $colores)) {
    echo "El color rojo está en el array.\n";
}

// 85. Función array_map() para aplicar una función a cada elemento de un array
$numeros = [1, 2, 3, 4, 5];
$dobles = array_map(function($n) {
    return $n * 2;
}, $numeros);
echo "Números duplicados: " . implode(", ", $dobles) . "\n";

// 86. Función array_reduce() para reducir un array a un solo valor
$numeros = [1, 2, 3, 4, 5];
$suma = array_reduce($numeros, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Suma de los números: $suma\n";

// 87. Uso de strpos() y substr() para trabajar con cadenas
$texto = "El rápido zorro marrón salta sobre el perro perezoso";
$posicion = strpos($texto, "zorro");
if ($posicion !== false) {
    echo "La palabra 'zorro' se encuentra en la posición: $posicion\n";
}

// Extraer una subcadena con substr
$subcadena = substr($texto, 3, 5);  // Extrae 5 caracteres a partir de la posición 3
echo "Subcadena extraída: $subcadena\n";

// 88. Función array_slice() para cortar un array
$colores = ["rojo", "verde", "azul", "amarillo", "naranja"];
$colores_cortados = array_slice($colores, 1, 3);  // Extrae una porción del array
echo "Colores extraídos: " . implode(", ", $colores_cortados) . "\n";

// 89. Función unset() para eliminar un elemento de un array
$colores = ["rojo", "verde", "azul"];
unset($colores[1]);  // Eliminar el elemento en el índice 1
echo "Colores después de unset: " . implode(", ", $colores) . "\n";

// 90. Uso de array_keys() y array_values()
$personas = ["nombre" => "Juan", "edad" => 30, "ocupacion" => "Desarrollador"];
$keys = array_keys($personas);
$values = array_values($personas);
echo "Claves del array: " . implode(", ", $keys) . "\n";
echo "Valores del array: " . implode(", ", $values) . "\n";

// 91. Función file_get_contents() para leer el contenido de un archivo
$contenido_archivo = file_get_contents("archivo.txt");
echo "Contenido del archivo: $contenido_archivo\n";

// 92. Función file_put_contents() para escribir datos en un archivo
$contenido = "Este es un nuevo contenido para el archivo.";
file_put_contents("archivo_nuevo.txt", $contenido);
echo "Nuevo contenido escrito en archivo_nuevo.txt\n";

// 93. Función fopen(), fwrite(), fclose()
$file = fopen("archivo_fichero.txt", "w");
if ($file) {
    fwrite($file, "Escribiendo en el archivo usando fwrite.\n");
    fclose($file);
    echo "Contenido escrito con fwrite en archivo_fichero.txt\n";
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 94. Función fgets() para leer una línea de un archivo
$file = fopen("archivo.txt", "r");
if ($file) {
    $linea = fgets($file);
    echo "Primera línea del archivo: $linea\n";
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 95. Función fread() para leer un archivo completo
$file = fopen("archivo.txt", "r");
if ($file) {
    $contenido_completo = fread($file, filesize("archivo.txt"));
    echo "Contenido completo del archivo: $contenido_completo\n";
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 96. Función feof() para verificar el fin de archivo
$file = fopen("archivo.txt", "r");
if ($file) {
    while (!feof($file)) {
        $linea = fgets($file);
        echo "Leyendo línea: $linea";
    }
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 97. Función fseek() para mover el puntero del archivo
$file = fopen("archivo.txt", "r");
if ($file) {
    fseek($file, 5);  // Mover el puntero a la posición 5
    $linea = fgets($file);
    echo "Después de fseek, la línea es: $linea\n";
    fclose($file);
} else {
    echo "No se pudo abrir el archivo.\n";
}

// 98. Función file_exists() para verificar si un archivo existe
if (file_exists("archivo.txt")) {
    echo "El archivo existe.\n";
} else {
    echo "El archivo no existe.\n";
}

// 99. Función unlink() para eliminar un archivo
if (unlink("archivo_nuevo.txt")) {
    echo "Archivo eliminado exitosamente.\n";
} else {
    echo "No se pudo eliminar el archivo.\n";
}

// 100. Función chmod() para cambiar los permisos de un archivo
if (chmod("archivo.txt", 0644)) {
    echo "Permisos de archivo cambiados correctamente.\n";
} else {
    echo "No se pudieron cambiar los permisos del archivo.\n";
}

// 101. Función copy() para copiar un archivo
if (copy("archivo.txt", "archivo_copia.txt")) {
    echo "Archivo copiado exitosamente.\n";
} else {
    echo "No se pudo copiar el archivo.\n";
}

// 102. Función rename() para cambiar el nombre de un archivo
if (rename("archivo_copia.txt", "archivo_renombrado.txt")) {
    echo "Archivo renombrado exitosamente.\n";
} else {
    echo "No se pudo renombrar el archivo.\n";
}

// 103. Subir archivos usando $_FILES[]
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    $nombre_archivo = $_FILES['archivo']['name'];
    $tmp_archivo = $_FILES['archivo']['tmp_name'];
    $directorio_destino = "uploads/" . $nombre_archivo;
    if (move_uploaded_file($tmp_archivo, $directorio_destino)) {
        echo "Archivo subido exitosamente: $nombre_archivo\n";
    } else {
        echo "Error al subir el archivo.\n";
    }
}

// 104. Crear una constante con const
const VERSION = "1.0.0";
echo "La versión de la aplicación es: " . VERSION . "\n";

// 105. Crear un array de constantes usando define()
define("SALUDO", "¡Hola, mundo!");
echo SALUDO . "\n";

// Continuo


// Paso 1: Obtener el contenido de la página web
$url = "https://www.example.com"; // URL de la página web que deseas obtener
$contenido = file_get_contents($url);

// Paso 2: Eliminar las etiquetas HTML
$contenido_sin_etiquetas = strip_tags($contenido);

// Mostrar el contenido sin etiquetas
echo $contenido_sin_etiquetas;


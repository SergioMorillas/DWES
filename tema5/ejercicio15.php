<!-- EJERCICIO 15: Facturación
Crear un sistema que gestione una lista de productos y su facturación utilizando
objetos en PHP. Para ello implementa los siguientes requisitos:
1. Crea una clase llamada Producto con las siguientes propiedades:
    ○ nombre (string)
    ○ precio (float)
    ○ cantidad (int)
    ○ La clase debe incluir un constructor que inicialice estas
propiedades y un método llamado calcularSubTotal() que devuelva el
valor total del producto (precio * cantidad).
2. Crea una clase llamada Factura con las siguientes propiedades:

        ■ NumeroFactura (int)
        ■ Nombre del cliente (cadena)
        ■ productos (array de objetos de la clase Producto)
    ○ La clase debe incluir un constructor que inicialice el número de
factura y un array vacío de productos.
    ○ Agrega un método llamado agregarProducto($producto) que permita
añadir un objeto Producto al array de productos.
    ○ Incluye un método privado llamado calcularBaseImponible() que
calcule y devuelva el valor total de todos los productos en la
factura sin aplicar el IVA.
    ○ Incluye el método privado llamado totalFactura() que devuelve el
total de la factura tras aplicar el IVA.
    ○ Agrega el método muestraArticulos() que muestra el nombre y el
precio de los artículos por pantalla ordenados de mayor a menor
por su precio.
    ○ Agrega un método llamado imprimeFactura() que muestre la factura
de la siguiente forma:
Factura número: XXXX Cliente: XXXXXXXXXXXX
Artículo    Precio  Cantidad    Subtotal
xxxxxxxxxxx xx,xx   xxx         xxxx,xx
xxxxxxxxxxx xx,xx   xxx         xxxx,xx
xxxxxxxxxxx xx,xx   xxx         xxxx,xx
=========================================
                Base Imponible: xxxxx,xx
                IVA 21%:        xxx,xx
                Total Factura:  xxxxx,xx

3. Crea 5 productos y una factura. Introduce los productos en la factura y
muestra el listado de esta en HTML. -->
<?php

if (php_sapi_name() == "cli") {
    echo "consola";
    require_once "Faker/src/autoload.php";
} else {
    echo "navegador";
    require_once "../Faker/src/autoload.php";
}
class Producto
{
    private string $nombre;
    private float $precio;
    private int $cantidad;

    public function __construct(string $nombre, float $precio)
    {
        $this->nombre = $nombre;
        if (is_numeric($precio)) {
            $this->precio = $precio;
        } else {
            $this->precio = 0;
        }
        $this->cantidad = 1;
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
    public function calcularSubTotal()
    {
        return $this->precio * $this->cantidad;
    }
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Nombre: {$this->nombre}\n\tPrecio: {$this->precio}€\n\tCantidad: {$this->cantidad}";
    }
    public function filaHTML(): string
    {
        return "<tr><td>{$this->nombre}</td><td>{$this->precio}</td><td>{$this->cantidad}</td><td>{$this->calcularSubTotal()}€</td><td>";
    }
    public function aumentarCantidad()
    {
        $this->cantidad++;
    }
}
class Factura
{
    public int $numeroFactura;
    public string $nombreCliente;
    public array $productos;
    public float $valorFactura; //Con esta variable me ahorro tener que iterar todos los productos cuando quiera el precio

    public function __construct(int $numeroFactura, string $nombreCliente)
    {
        $this->numeroFactura = $numeroFactura;
        $this->nombreCliente = $nombreCliente;
        $this->productos = array();
        $this->valorFactura = 0;
    }
    //     ○ Agrega un método llamado agregarProducto($producto) que permita
    // añadir un objeto Producto al array de productos.
    public function agregarProducto($producto)
    {
        if ($producto instanceof Producto) {
            if (array_key_exists($producto->nombre, $this->productos)) {
                $this->productos[$producto->nombre]->aumentarCantidad();
            } else {
                $this->productos[$producto->nombre] = $producto;
            }

            $this->valorFactura += $producto->calcularSubTotal();
        }
    }

    //     ○ Incluye un método privado llamado calcularBaseImponible() que
    // calcule y devuelva el valor total de todos los productos en la
    // factura sin aplicar el IVA.
    public function calcularBaseImponible()
    {
        return $this->valorFactura;
    }
    //     ○ Incluye el método privado llamado totalFactura() que devuelve el
    // total de la factura tras aplicar el IVA.
    public function totalFactura()
    {
        return $this->valorFactura * 1.21;
    }
    //     ○ Agrega el método muestraArticulos() que muestra el nombre y el
    // precio de los artículos por pantalla ordenados de mayor a menor
    // por su precio.
    public function muestraArticulos()
    {
        $aux = "";
        usort($this->productos, function ($a, $b) {
            return $a->calcularSubTotal() - $b->calcularSubTotal();
        });
        // Iteramos por todos los productos
        foreach ($this->productos as $producto) {
            $aux .= $producto . "\t" . $producto->calcularSubTotal() . "\n";
        }
        return $aux;
    }
    //     ○ Agrega un método llamado imprimeFactura() que muestre la factura
    // de la siguiente forma:
    public function imprimeFactura()
    {
        usort($this->productos, function ($a, $b) {
            if($b->calcularSubTotal() - $a->calcularSubTotal()==0) return strcmp($a->nombre, $b->nombre);
            return $b->calcularSubTotal() - $a->calcularSubTotal();
        });

        $html = "<table><tr><th>Numero de la factura: $this->numeroFactura </th><th>Nombre del cliente: $this->nombreCliente</th></tr>
        <tr><th>Articulo</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>";

        foreach ($this->productos as $producto) {
            $html .= $producto->filaHTML();
        }
        return $html;
    }
}

$faker = Faker\Factory::create('es_ES');
$ps = [];
for ($i = 0; $i < 1000; $i++) {
    $auxP = new Producto($faker->word. " " .$faker->word , rand(1,2000), rand(1,2000) ** $i);
    $ps[] = $auxP;
}
$pss = [];
for ($i = 0; $i < 10000; $i++) {
    $auxP = new Producto($faker->word. " " .$faker->word, rand(1,2000), rand(1,2000) ** $i);
    $pss[] = $auxP;
}

$factura = new Factura(1, $faker->name);
foreach ($ps as $product) {
    $factura->agregarProducto($product);
    $factura->agregarProducto($product);
}

$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));
$factura->agregarProducto(new Producto("Articulo a pelo", rand(1,2000), rand(500,2000)));

foreach ($pss as $product) {
    $factura->agregarProducto($product);
}



echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";
echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    echo "<link rel=\"stylesheet\" href=\"factura.css\">";
    echo "<title>Factura</title>";
echo "</head>";
echo "<body>";
echo $factura->imprimeFactura();
echo "</body>";
echo "</html>";


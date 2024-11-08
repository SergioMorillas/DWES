<!-- EJERCICIO 1: Uso de printf, sprintf y formateo de salidas.
Dado el ejercicio de facturación orientado a objetos realizado en el tema
anterior, modifica dicho ejercicio para que formatee la salida de la siguiente
forma:
1. Nombre del producto (hasta 20 caracteres): debe ajustarse a la izquierda
con un ancho fijo de 20 caracteres:
2. Precio unitario (con 2 decimales): debe alinearse a la derecha con 2
decimales de precisión.
3. Cantidad (entero): debe ser un número entero sin decimales, alineado a la
derecha.
4. Subtotal (el precio unitario multiplicado por la cantidad en stock, con 2
decimales): debe mostrar el resultado de la multiplicación de precio por
cantidad, con 2 decimales de precisión.
A continuación, debes imprimir la base imponible, iva y total de la factura, que
deberá imprimirse con el mismo formato de la columna "Subtotal" y debe estar
alineado a la derecha también.
Similar a esta factura: -->

<?php

if (php_sapi_name() == "cli") {
    require_once "Faker/src/autoload.php";
} else {
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
        //Al ponerlo en html el N.n no funciona porque no procesa los espacios.
        $aux = sprintf("<tr><td>%20s</td><td>%'#5.2f</td><td>%'#5d</td><td class=\"sub\">%'#60.2f€</td>", $this->nombre, $this->precio, $this->cantidad, $this->calcularSubTotal());
        return $aux;
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
    public function calcularIVA()
    {
        return $this->valorFactura * 0.79;
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
            if ($b->calcularSubTotal() - $a->calcularSubTotal() == 0) {
                return strcmp($a->nombre, $b->nombre);
            }

            return $b->calcularSubTotal() - $a->calcularSubTotal();
        });

        $html = "<table><tr><th>Numero de la factura: $this->numeroFactura </th><th></th><th></th><th>Nombre del cliente: $this->nombreCliente</th></tr>
        <tr><th>Articulo</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>";

        foreach ($this->productos as $producto) {
            $html .= $producto->filaHTML();
        }
        $html .= $this->datosLegales();

        return $html;
    }
    public function datosLegales(): string
    {
        $aux = "";
        $aux .= sprintf("<tr class=\"datos\"><td>%-20s</td><td></td><td></td><td class=\"sub\">%'#60.2f€</td>","Base imponible", $this->calcularBaseImponible());
        $aux .= sprintf("<tr class=\"datos\"><td>%-20s</td><td></td><td></td><td class=\"sub\">%'#60.2f€</td>","IVA (21%)", $this->calcularIVA());
        $aux .= sprintf("<tr class=\"datos\"><td>%-20s</td><td></td><td></td><td class=\"sub\">%'#60.2f€</td>","Total factura", $this->totalFactura());
        return $aux;
    }
}

$faker = Faker\Factory::create('es_ES');
$ps = [];
for ($i = 0; $i < rand(1,14); $i++) {
    $auxP = new Producto($faker->word . " " . $faker->word, rand(1, 2000), rand(1, 2000) ** $i);
    $ps[] = $auxP;
}
$nombre = sprintf("%'#20s", $faker->name);

$factura = new Factura(1, $nombre);
foreach ($ps as $product) {
    $factura->agregarProducto($product);
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
// echo "<marquee>";
echo $factura->imprimeFactura();
// echo "</marquee>";
echo "</body>";
echo "</html>";

<?php

// Desarrolla un sistema para gestionar el alquiler de vehículos. Define al menos las siguientes clases:
// Vehículo: contiene propiedades como matrícula, marca, modelo, estaAlquilado y tipo (cadena que describe "Sedán", "SUV", "Furgoneta", etc.). Métodos para mostrar información del vehículo y método que permita alquilar y devolver el vehículo.
// Cliente: maneja la información del cliente, con propiedades como nombre, apellido, DNI.
// ContratoAlquiler: incluye detalles del contrato de un vehículo a un cliente, contendrá:
// Fecha y hora de recogida del vehículo. Se debe aplicar la fecha y hora del sistema al crear la instancia.
// Fecha y hora de devolución del vehículo. Se establece al invocar al método devolverCoche.
// Cadena que describe el estado ("Activo", "Finalizado").
// Métodos para calcular el costo total del alquiler, cuyo precio depende del tipo de vehículo alquilado. El coste dependerá del número de días que lo haya tomado prestado (sólo podrá ser calculado cuando se devuelva el coche y se establezca la fecha de devolución):
// Vehículo
// Coste Día
// Sedan     -> 50€
// SUV       -> 70€
// Furgoneta -> 100€

// Crea un vehículo de cada tipo y un Cliente. Realiza contratos de alquiler con los distintos vehículos a este cliente y muestra el coste de alquiler de los vehículos que han sido alquilados.

class Vehiculo
{
    private $matrícula;
    private $marca;
    private $modelo;
    private $estaAlquilado;
    private $tipo;
    private $contrato;

    public function __construct($marca, $modelo, $tipo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Matrcula: {$this->matrcula}, Marca: {$this->marca}, Modelo: {$this->modelo}, EstaAlquilado: {$this->estaAlquilado}, Tipo: {$this->tipo}";
    }
    public function alquilar($cliente):ContratoAlquiler
    {
        if (!$this->estaAlquilado) {
            $this->estaAlquilado = true;
            $this->contrato = new ContratoAlquiler($this, $cliente);
        }
    }
    public function devolver()
    {
        if ($this->estaAlquilado){
            $this->contrato->finalizar();
        }
        return $this;
    }
}
class Cliente
{
    private $nombre;
    private $apellido;
    private $DNI;
    public function __construct( $nombre, $apellido, $DNI)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->DNI = $DNI;
    }

    public function __toString()
    {
        return "Nombre: {$this->nombre}, Apellido: {$this->apellido}, DNI: {$this->DNI}";
    }

}
class ContratoAlquiler
{
    const SEDAN = 50;
    const SUV = 70;
    const FURGONETA = 100;
    private $vehiculo;
    private $cliente;
    private $fechaInicio;
    private $fechaFin;
    private $estado;
    private $costeTotal;

    public function __construct($vehiculo, $cliente)
    {
        $this->vehiculo = $vehiculo;
        $this->cliente = $cliente;
        $this->fechaInicio = new DateTime();
        $this->estado = "Activo";
    }

    public function __toString()
    {
        return "Vehiculo: {$this->vehiculo}, Cliente: {$this->cliente}, FechaInicio: {$this->fechaInicio}, FechaFin: {$this->fechaFin}, Estado: {$this->estado}, CosteTotal: {$this->costeTotal}";
    }
    public function finalizar(){
        $this->fechaFin = new DateTime();
        if ($this->modelo == "Sedan") $this->costeTotal = ($this->fechaInicio-$this->fechaFin)*self::SEDAN;
        elseif ($this->modelo == "SUV") $this->costeTotal = ($this->fechaInicio-$this->fechaFin)*self::SUV;
        else $this->costeTotal = ($this->fechaInicio-$this->fechaFin)*self::FURGONETA;
        $this->estado = "Finalizado";
    }
}


$v1 = new Vehiculo("Opel", "Sedan", "x");
$v2 = new Vehiculo("Opel", "SUV", "x");
$v3 = new Vehiculo("Opel", "Furgoneta", "x");

$c1 = new Cliente("Sergio", "morillas", "001");
$c2 = new Cliente("Sergio", "morillas", "002");
$c3 = new Cliente("Sergio", "morillas", "003");


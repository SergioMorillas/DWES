<?php
class Vehiculo
{
    private $matricula;
    private $marca;
    private $modelo;
    private $potencia;
    private $velocidadMaxima;
    private $pathImagen;
    public function __construct($matricula, $marca, $modelo, $potencia, $velocidadMaxima, $pathImagen)
    {
        if (!preg_match('/^[0-9]{4}[A-Z]{3}$/', $matricula)) {
            throw
            new
            Exception("Formato
    de
    matrícula
    inválido");
        }
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->potencia = $potencia;
        $this->velocidadMaxima = $velocidadMaxima;
        $this->pathImagen = $pathImagen;
    }
//Gettersysetters
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function setMatricula($matricula)
    {
        if
        (!preg_match('/^[0-9]{4}[A-Z]{3}$/',
            $matricula)) {
            throw
            new
            Exception("Formato de matrícula inválido");
        }
        $this->matricula = $matricula;
    }
    public function
    getMarca() {
        return
        $this->marca;
    }
    public function
    setMarca($marca) {
        $this->marca = $marca;
    }
    public function
    getModelo() {
        return
        $this->modelo;
    }
    public function
    setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function
    getPotencia() {
        return
        $this->potencia;
    }
    public function
    setPotencia($potencia) {
        $this->potencia = $potencia;
    }
    public function
    getVelocidadMaxima() {
        return
        $this->velocidadMaxima;
    }
    public function
    setVelocidadMaxima($velocidadMaxima) {
        $this->velocidadMaxima = $velocidadMaxima;
    }
    public function
    getPathImagen() {
        return
        $this->pathImagen;
    }
    public function
    setPathImagen($pathImagen) {
        $this->pathImagen = $pathImagen;
    }
}


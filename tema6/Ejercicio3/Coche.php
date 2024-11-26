<?php
class Coche
{

    public string   $matricula;
    public string   $marca;
    public string   $modelo;
    public int      $potencia;
    public int      $velocidadMaxima;

    public function __construct(String $matricula)
    {
        $this->matricula = $matricula;
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
    public function __toString(): string
    {
        return "{$this->matricula}\t{$this->marca}\t{$this->modelo}\t{$this->potencia}\t{$this->velocidadMaxima}";
    }

    public function crearJSON()
    {
        $cocheArray = [
            'matricula' => $this->matricula,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'potencia' => $this->potencia,
            'velocidadMaxima' => $this->velocidadMaxima,
        ];
        $json_str = json_encode($cocheArray, JSON_PRETTY_PRINT);
        return $json_str;
    }
}

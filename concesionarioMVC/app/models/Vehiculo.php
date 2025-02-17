<?php
class Vehiculo {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    /**
     * Obtiene todos los vehículos
     *
     * @return array
     */
    public function obtenerVehiculos() {
        $this->db->query("SELECT * FROM Vehiculo");

        $resultados = $this->db->registros();
        return $resultados;
    }

    /**
     * Obtiene un vehículo por su ID
     *
     * @param int $id
     * @return object
     */
    public function obtenerVehiculoPorId($id) {
        $this->db->query("SELECT * FROM Vehiculo WHERE vehiculo_id = :id");
        $this->db->bind(":id", $id);

        $fila = $this->db->registro();
        return $fila;
    }

    /**
     * Agrega un nuevo vehículo
     *
     * @param array $datos
     * @return bool
     */
    public function agregarVehiculo($datos) {
        $this->db->query("INSERT INTO Vehiculo (matricula, marca, modelo, anio, color, precio) 
                          VALUES (:matricula, :marca, :modelo, :anio, :color, :precio)");

        // Vinculamos los valores
        $this->db->bind(":matricula", $datos["matricula"]);
        $this->db->bind(":marca", $datos["marca"]);
        $this->db->bind(":modelo", $datos["modelo"]);
        $this->db->bind(":anio", $datos["anio"]);
        $this->db->bind(":color", $datos["color"]);
        $this->db->bind(":precio", $datos["precio"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Actualiza un vehículo existente
     *
     * @param array $datos
     * @return bool
     */
    public function actualizarVehiculo($datos) {
        $this->db->query("UPDATE Vehiculos SET matricula = :matricula, marca = :marca, modelo = :modelo, anio = :anio, color = :color, precio = :precio 
                          WHERE vehiculo_id = :id");

        // Vinculamos los valores
        $this->db->bind(":id", $datos["id"]);
        $this->db->bind(":matricula", $datos["matricula"]);
        $this->db->bind(":marca", $datos["marca"]);
        $this->db->bind(":modelo", $datos["modelo"]);
        $this->db->bind(":anio", $datos["anio"]);
        $this->db->bind(":color", $datos["color"]);
        $this->db->bind(":precio", $datos["precio"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Borra un vehículo por su ID
     *
     * @param int $id
     * @return bool
     */
    public function borrarVehiculo($id) {
        $this->db->query("DELETE FROM Vehiculo WHERE vehiculo_id = :id");
        $this->db->bind(":id", $id);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
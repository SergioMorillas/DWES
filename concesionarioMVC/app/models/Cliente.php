<?php

class Cliente {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function obtenerClientes() {
        $this->db->query("SELECT * FROM cliente");

        $resultados = $this->db->registros();
        return $resultados;
    }
    public function clienteExiste($email){
        $this->db->query("SELECT * FROM cliente WHERE email = :email");
        $this->db->bind(":email", $email);

        $fila = $this->db->registro();
        return $fila;
    }
    public function obtenerClientePorId($id) {
        $this->db->query("SELECT * FROM cliente WHERE cliente_id = :id");
        $this->db->bind(":id", $id);

        $fila = $this->db->registro();
        return $fila;
    }

    public function agregarCliente($datos) {
        $this->db->query("INSERT INTO cliente (documento_identidad, nombre, apellidos, fecha_nacimiento, email, telefono, direccion, fotografia) 
                          VALUES (:documento, :nombre, :apell, :fechaNac, :email, :telefono, :direccion, :fotografia)");

        // Vinculamos los valores
        $this->db->bind(":documento", $datos["documento"]);
        $this->db->bind(":nombre", $datos["nombre"]);
        $this->db->bind(":apell", $datos["apell"]);
        $this->db->bind(":fechaNac", $datos["fechaNac"]);
        $this->db->bind(":email", $datos["email"]);
        $this->db->bind(":telefono", $datos["telefono"]);
        $this->db->bind(":direccion", $datos["direccion"]);
        $this->db->bind(":fotografia", $datos["fotografia"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarCliente($datos) {
        $this->db->query("UPDATE cliente SET documento_identidad = :documento, nombre = :nombre, apellidos = :apell, fecha_nacimiento = :fechaNac, email = :email, telefono = :telefono, direccion = :direccion, fotografia = :fotografia 
                          WHERE cliente_id = :id");

        // Vinculamos los valores
        $this->db->bind(":id", $datos["id"]);
        $this->db->bind(":documento", $datos["documento"]);
        $this->db->bind(":nombre", $datos["nombre"]);
        $this->db->bind(":apell", $datos["apell"]);
        $this->db->bind(":fechaNac", $datos["fechaNac"]);
        $this->db->bind(":email", $datos["email"]);
        $this->db->bind(":telefono", $datos["telefono"]);
        $this->db->bind(":direccion", $datos["direccion"]);
        $this->db->bind(":fotografia", $datos["fotografia"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarCliente($id) {
        $this->db->query("DELETE FROM cliente WHERE cliente_id = :id");
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

<?php

class Cliente {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function obtenerClientes() {
        $this->db->query("SELECT * FROM usuarios");

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerClientePorId($id) {
        $this->db->query("SELECT * FROM usuarios WHERE id = :id");
        $this->db->bind(":id", $id);

        $fila = $this->db->registro();
        return $fila;
    }

    public function agregarCliente($datos) {
        $hash = password_hash($datos["contrasena"], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO usuarios (nombre, apellidos, fecha_de_nacimiento, login, grupo, password) VALUES (:nombre, :apell, :fechaNac, :login, :rango, :contrasena)");

        // Vinculamos los valores
        $this->db->bind(":nombre", $datos["nombre"]);
        $this->db->bind(":apell", $datos["apell"]);
        $this->db->bind(":fechaNac", $datos["fechaNac"]);
        $this->db->bind(":rango", $datos["rango"]);
        $this->db->bind(":login", $datos["login"]);
        $this->db->bind(":contrasena", $hash);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarCliente($datos) {
        $hash = password_hash($datos["contrasena"], PASSWORD_DEFAULT);

        $this->db->query("UPDATE usuarios SET nombre = :nombre, apellidos = :apell, fecha_de_nacimiento = :fechaNac, login = :login, grupo = :rango, password = :contrasena WHERE id = :id");

        // Vinculamos los valores
        $this->db->bind(":id", $datos["id"]);
        $this->db->bind(":nombre", $datos["nombre"]);
        $this->db->bind(":apell", $datos["apell"]);
        $this->db->bind(":fechaNac", $datos["fechaNac"]);
        $this->db->bind(":rango", $datos["rango"]);
        $this->db->bind(":login", $datos["login"]);
        $this->db->bind(":contrasena", $hash);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarCliente($id) {
        $this->db->query("DELETE FROM usuarios WHERE id = :id");
        $this->db->bind(":id", $id);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

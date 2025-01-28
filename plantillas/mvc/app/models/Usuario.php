<?php
    
class Usuario {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function obtenerUsuarios() {
        $this->db->query("SELECT * from usuarios");

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarUsuario($datos){
        $hash = password_hash($datos["contrasena"], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO usuarios (id, nombre, apellidos, fecha_de_nacimiento, login, grupo, password) VALUES (:id, :nombre, :apell, :fechaNac, :login, :rango, :contrasena)");

        // Vinculamos los valores
        $this->db->bind(":id", null);
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
}
<?php

class ManejoUsuarios {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function registrarUsuario($nombre, $contraseña, $rango) {
        $rangoValido = ['Administrador', 'Administrativo', 'Cliente'];
        if (!in_array($rango, $rangoValido)) {
            throw new Exception("Rango inválido. Los rangos válidos son: Administrador, Administrativo, Cliente.");
        }

        $hash = password_hash($contraseña, PASSWORD_DEFAULT);
        $linea = "$nombre@$hash@$rango\n";
        file_put_contents($this->file, $linea, FILE_APPEND);
    }

    public function usuarioExiste($nombre) {
        if (!file_exists($this->file)) {
            return false;
        }

        $usuarios = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($usuarios as $usuario) {
            list($nombreRegistrado) = explode('@', $usuario);
            if ($nombreRegistrado === $nombre) {
                return true;
            }
        }
        return false;
    }

    public function verificarContraseña($nombre, $contraseña) {
        if (!file_exists($this->file)) {
            return false;
        }

        $usuarios = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($usuarios as $usuario) {
            list($nombreRegistrado, $hash) = explode('@', $usuario);
            if ($nombreRegistrado === $nombre) {
                return password_verify($contraseña, $hash);
            }
        }
        return false;
    }

    public function obtenerRango($nombre) {
        if (!file_exists($this->file)) {
            return null;
        }

        $usuarios = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($usuarios as $usuario) {
            list($nombreRegistrado, , $rango) = explode('@', $usuario);
            if ($nombreRegistrado === $nombre) {
                return $rango;
            }
        }
        return null;
    }

    public function cambiarNombre($nombreActual, $nuevoNombre) {
        if (!file_exists($this->file)) {
            throw new Exception("El archivo no existe.");
        }

        $usuarios = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $actualizado = false;
        foreach ($usuarios as &$usuario) {
            list($nombreRegistrado, $hash, $rango) = explode('@', $usuario);
            if ($nombreRegistrado === $nombreActual) {
                $usuario = "$nuevoNombre@$hash@$rango";
                $actualizado = true;
                break;
            }
        }

        if ($actualizado) {
            file_put_contents($this->file, implode("\n", $usuarios) . "\n");
        } else {
            throw new Exception("Usuario no encontrado.");
        }
    }

    public function cambiarContraseña($nombre, $nuevaContraseña) {
        if (!file_exists($this->file)) {
            throw new Exception("El archivo no existe.");
        }

        $usuarios = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $actualizado = false;
        foreach ($usuarios as &$usuario) {
            list($nombreRegistrado, , $rango) = explode('@', $usuario);
            if ($nombreRegistrado === $nombre) {
                $nuevoHash = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
                $usuario = "$nombre@$nuevoHash@$rango";
                $actualizado = true;
                break;
            }
        }

        if ($actualizado) {
            file_put_contents($this->file, implode("\n", $usuarios) . "\n");
        } else {
            throw new Exception("Usuario no encontrado.");
        }
    }
}

?>
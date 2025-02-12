<?php
class Clientes extends Controlador
{
    public function __construct()
    {
        //1) Acceso al modelo
        $this->usuarioCliente = $this->modelo('Cliente');
    }

    public function login()
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            // Si ya tiene sesión le mandamos a su panel de control
            $this->vista('clientes/inicio');
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre      = $_POST['username'];
            $contraseña = $_POST['password'];
            $error       = '';

            try {
                $clientes = usuarioCliente->obtenerClientes();

                if ($registro->usuarioExiste($nombre)) {
                    if ($registro->verificarContraseña($nombre, $contraseña)) {
                        $_SESSION['usuario'] = $nombre;
                        $_SESSION['rango']   = $registro->obtenerRango($nombre);
                        exit;
                    } else {
                        $error = 'Contraseña incorrecta.';
                    }
                } else {
                    $error = 'El usuario no existe.';
                }

            } catch (Exception $e) {
                $error = 'Error: ' . $e->getMessage();
            }
        }
        $this->vista('clientes/login');
    }

    public function index()
    {
        // Podemos pasar parametros a la vista que queramos
        // Para ello nos creamos un array con los parámetros
        $usuarios = $this->usuarioCliente->obtenerClientes();
        $datos    = [
            'usuarios' => $usuarios, // Array con todos los usuarios
        ];
        // Le pasamos a la vista los parametros
        $this->vista('clientes/inicio', $datos);
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'nombre'     => trim($_POST['nombre']),
                'apell'      => trim($_POST['apell']),
                'fechaNac'   => trim($_POST['fechaNac']),
                'rango'      => trim($_POST['rango']),
                'login'      => trim($_POST['login']),
                'contrasena' => trim($_POST['contrasena']),
            ];

            if ($this->usuarioCliente->agregarCliente($datos)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo realizar el alta");
            }
        } else {
            $datos = [
                'nombre'     => '',
                'apell'      => '',
                'fechaNac'   => '',
                'rango'      => '',
                'login'      => '',
                'contrasena' => '',
            ];
            $this->vista('clientes/agregar', $datos);
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id'         => $id,
                'nombre'     => trim($_POST['nombre']),
                'apell'      => trim($_POST['apell']),
                'fechaNac'   => trim($_POST['fechaNac']),
                'rango'      => trim($_POST['rango']),
                'login'      => trim($_POST['login']),
                'contrasena' => trim($_POST['contrasena']),
            ];

            if ($this->usuarioCliente->actualizarCliente($datos)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo actualizar el cliente");
            }
        } else {
            // Obtener información del cliente desde el modelo
            $cliente = $this->usuarioCliente->obtenerClientePorId($id);
            $datos   = [
                'id'         => $cliente->id,
                'nombre'     => $cliente->nombre,
                'apell'      => $cliente->apell,
                'fechaNac'   => $cliente->fechaNac,
                'rango'      => $cliente->rango,
                'login'      => $cliente->login,
                'contrasena' => $cliente->contrasena,
            ];
            $this->vista('clientes/editar', $datos);
        }
    }

    public function borrar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->usuarioCliente->borrarCliente($id)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo borrar el cliente");
            }
        } else {
            // Obtener información del cliente desde el modelo
            $cliente = $this->usuarioCliente->obtenerClientePorId($id);
            $datos   = [
                'id'         => $cliente->id,
                'nombre'     => $cliente->nombre,
                'apell'      => $cliente->apell,
                'fechaNac'   => $cliente->fechaNac,
                'rango'      => $cliente->rango,
                'login'      => $cliente->login,
                'contrasena' => $cliente->contrasena,
            ];
            $this->vista('clientes/borrar', $datos);
        }
    }

    public function forms($datos)
    {
        $this->vista('clientes/forms', $datos);
    }
}

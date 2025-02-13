<?php
class Clientes extends Controlador
{
    public function __construct()
    {
        //1) Acceso al modelo
        $this->clienteController = $this->modelo('Cliente');
        $this->usuarioController = $this->modelo('Usuario');

    }

    public function login()
    {
        session_start();

        if (isset($_SESSION['cliente'])) {
            // Si ya tiene sesión le mandamos a su panel de control
            $clientes = $this->clienteController->obtenerClientes();
            $datos    = [
                'clientes' => $clientes, // Array con todos los clientes
            ];
            $this->vista('clientes/inicio', $datos );
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre      = $_POST['username'];
            $contraseña  = $_POST['password'];
            $error       = '';

            try {
                $registro = $this->clienteController;
                $gestorLogin = $this->usuarioController;
                $persona = ($gestorLogin->usuarioExiste($nombre));
                if ($persona) {
                    if (password_verify($contraseña, $persona->password)) {
                        $_SESSION['cliente'] = $nombre;
                        $_SESSION['rango']   = $persona->rango;
                        $clientes = $this->clienteController->obtenerClientes();
                        $datos    = [
                            'clientes' => $clientes, // Array con todos los clientes
                        ];
                        $this->vista('clientes/inicio', $datos);
                        exit;
                    } else {
                        $error = 'Contraseña incorrecta.';
                    }
                } else {
                    $error = 'El cliente no existe.';
                }

            } catch (Exception $e) {
                $error = 'Error: ' . $e->getMessage();
            }
            $mostrarError  = ['error' => $error];
            $this->vista('clientes/login', $mostrarError);
        }
        $this->vista('clientes/login' );
    }

    public function index()
    {
        $clientes = $this->clienteController->obtenerClientes();
        $datos    = [
            'clientes' => $clientes, // Array con todos los clientes
        ];
        $this->vista('clientes/inicio', $datos);
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'documento'    => trim($_POST['documento']),
                'nombre'       => trim($_POST['nombre']),
                'apell'        => trim($_POST['apell']),
                'fechaNac'     => trim($_POST['fechaNac']),
                'email'        => trim($_POST['email']),
                'telefono'     => trim($_POST['telefono']),
                'direccion'    => trim($_POST['direccion']),
                'fotografia'   => trim($_POST['fotografia']),
            ];

            if ($this->clienteController->agregarCliente($datos)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo realizar el alta");
            }
        } else {
            $datos = [
                'documento'    => '',
                'nombre'       => '',
                'apell'        => '',
                'fechaNac'     => '',
                'email'        => '',
                'telefono'     => '',
                'direccion'    => '',
                'fotografia'   => '',
            ];
            $this->vista('clientes/agregar', $datos);
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id'           => $id,
                'documento'    => trim($_POST['documento']),
                'nombre'       => trim($_POST['nombre']),
                'apell'        => trim($_POST['apell']),
                'fechaNac'     => trim($_POST['fechaNac']),
                'email'        => trim($_POST['email']),
                'telefono'     => trim($_POST['telefono']),
                'direccion'    => trim($_POST['direccion']),
                'fotografia'   => trim($_POST['fotografia']),
            ];

            if ($this->clienteController->actualizarCliente($datos)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo actualizar el cliente");
            }
        } else {
            $cliente = $this->clienteController->obtenerClientePorId($id);
            $datos   = [
                'id'           => $cliente->cliente_id,
                'documento'    => $cliente->documento_identidad,
                'nombre'       => $cliente->nombre,
                'apell'        => $cliente->apellidos,
                'fechaNac'     => $cliente->fecha_nacimiento,
                'email'        => $cliente->email,
                'telefono'     => $cliente->telefono,
                'direccion'    => $cliente->direccion,
                'fotografia'   => $cliente->fotografia,
            ];
            $this->vista('clientes/editar', $datos);
        }
    }

    public function borrar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->clienteController->borrarCliente($id)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo borrar el cliente");
            }
        } else {
            $cliente = $this->clienteController->obtenerClientePorId($id);
            $datos   = [
                'id'           => $cliente->cliente_id,
                'documento'    => $cliente->documento_identidad,
                'nombre'       => $cliente->nombre,
                'apell'        => $cliente->apellidos,
                'fechaNac'     => $cliente->fecha_nacimiento,
                'email'        => $cliente->email,
                'telefono'     => $cliente->telefono,
                'direccion'    => $cliente->direccion,
                'fotografia'   => $cliente->fotografia,
            ];
            $this->vista('clientes/borrar', $datos);
        }
    }

    public function forms($datos)
    {
        $this->vista('clientes/forms', $datos);
    }
}
?>

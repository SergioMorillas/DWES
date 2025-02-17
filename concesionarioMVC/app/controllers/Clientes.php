<?php
class Clientes extends Controlador
{
    /**
     * @var mixed
     */
    private $clienteController;

    /**
     * @var mixed
     */
    private $usuarioController;

    public function __construct()
    {
        $this->clienteController = $this->modelo('Cliente');
        $this->usuarioController = $this->modelo('Usuario');
        session_start();
    }

    /**
     * Maneja el proceso de inicio de sesión de los clientes
     */
    public function login()
    {
        if (isset($_SESSION['cliente'])) {
            $this->redireccionarAPanel();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['username'];
            $contraseña = $_POST['password'];
            $error = '';

            try {
                if ($this->procesarLogin($nombre, $contraseña)) {
                    $this->redireccionarAPanel();
                } else {
                    $error = 'Nombre de usuario o contraseña incorrectos.';
                }
            } catch (Exception $e) {
                $error = 'Error: ' . $e->getMessage();
            }

            $this->vista('clientes/login', ['error' => $error]);
            return;
        }

        $this->vista('clientes/login');
    }

    /**
     * Procesa el login del cliente
     *
     * @param string $nombre
     * @param string $contraseña
     * @return bool
     * @throws Exception
     */
    private function procesarLogin($nombre, $contraseña)
    {
        $persona = $this->usuarioController->usuarioExiste($nombre);
        if ($persona && password_verify($contraseña, $persona->password)) {
            $_SESSION['cliente'] = $nombre;
            $_SESSION['rango'] = $persona->grupo;
            return true;
        }
        return false;
    }

    /**
     * Redirige al cliente al panel principal
     */
    private function redireccionarAPanel()
    {
        $clientes = $this->clienteController->obtenerClientes();
        $datos = [
            'clientes' => $clientes,
        ];
        $this->vista('clientes/panel', $datos);
        exit;
    }

    /**
     * Inicio de sesión
     */
    public function inicio()
    {
        $this->index();
    }

    /**
     * Página principal
     */
    public function index()
    {
        if (isset($_SESSION['cliente'])) {
            $this->redireccionarAPanel();
        } else {
            $this->vista("clientes/login");
        }
    }

    /**
     * Agrega un nuevo cliente
     */
    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->obtenerDatosFormulario();
            if ($this->clienteController->agregarCliente($datos)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo realizar el alta");
            }
        } else {
            $this->vista('clientes/agregar', $this->obtenerDatosVacios());
        }
    }

    /**
     * Edita un cliente existente
     *
     * @param int $id
     */
    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->obtenerDatosFormulario();
            $datos['id'] = $id;
            if ($this->clienteController->actualizarCliente($datos)) {
                redireccionar('/clientes');
            } else {
                die("No se pudo actualizar el cliente");
            }
        } else {
            $cliente = $this->clienteController->obtenerClientePorId($id);
            $datos = $this->mapearClienteADatos($cliente);
            $this->vista('clientes/editar', $datos);
        }
    }

    /**
     * Borra un cliente existente
     *
     * @param int $id
     */
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
            $datos = $this->mapearClienteADatos($cliente);
            $this->vista('clientes/borrar', $datos);
        }
    }

    /**
     * Carga la vista de formularios
     *
     * @param array $datos
     */
    public function forms($datos)
    {
        $this->vista('clientes/forms', $datos);
    }

    /**
     * Cierra la sesión del cliente
     */
    public function logout()
    {
        if (!empty($_SESSION['cliente'])) {
            unset($_SESSION['cliente']);
            unset($_SESSION['rango']);
        }
        redireccionar("blogs");
    }

    /**
     * Obtiene los datos del formulario
     *
     * @return array
     */
    private function obtenerDatosFormulario()
    {
        return [
            'documento' => trim($_POST['documento']),
            'nombre' => trim($_POST['nombre']),
            'apell' => trim($_POST['apell']),
            'fechaNac' => trim($_POST['fechaNac']),
            'email' => trim($_POST['email']),
            'telefono' => trim($_POST['telefono']),
            'direccion' => trim($_POST['direccion']),
            'fotografia' => trim($_POST['fotografia']),
        ];
    }

    /**
     * Mapea un objeto cliente a un array de datos
     *
     * @param object $cliente
     * @return array
     */
    private function mapearClienteADatos($cliente)
    {
        return [
            'id' => $cliente->cliente_id,
            'documento' => $cliente->documento_identidad,
            'nombre' => $cliente->nombre,
            'apell' => $cliente->apellidos,
            'fechaNac' => $cliente->fecha_nacimiento,
            'email' => $cliente->email,
            'telefono' => $cliente->telefono,
            'direccion' => $cliente->direccion,
            'fotografia' => $cliente->fotografia,
        ];
    }

    /**
     * Obtiene un array de datos vacíos
     *
     * @return array
     */
    private function obtenerDatosVacios()
    {
        return [
            'documento' => '',
            'nombre' => '',
            'apell' => '',
            'fechaNac' => '',
            'email' => '',
            'telefono' => '',
            'direccion' => '',
            'fotografia' => '',
        ];
    }
}

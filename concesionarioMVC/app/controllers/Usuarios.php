<?php
class Usuarios extends Controlador
{
    /**
     * @var mixed
     */
    private $usuarioController;

    public function __construct()
    {
        $this->usuarioController = $this->modelo('Usuario');
        session_start();
    }

    /**
     * Maneja el proceso de inicio de sesión de los usuarios
     */
    public function login()
    {
        if (isset($_SESSION['usuario'])) {
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

            $this->vista('usuarios/login', ['error' => $error]);
            return;
        }

        $this->vista('usuarios/login');
    }

    /**
     * Procesa el login del usuario
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
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rango'] = $persona->grupo;
            return true;
        }
        return false;
    }

    /**
     * Redirige al usuario al panel principal
     */
    private function redireccionarAPanel()
    {
        $usuarios = $this->usuarioController->obtenerUsuarios();
        $datos = [
            'usuarios' => $usuarios,
        ];
        $this->vista('usuarios/panel', $datos);
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
        if (isset($_SESSION['usuario'])) {
            $this->redireccionarAPanel();
        } else {
            $this->vista("usuarios/login");
        }
    }

    /**
     * Agrega un nuevo usuario
     */
    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->obtenerDatosFormulario();
            if ($this->usuarioController->agregarUsuario($datos)) {
                redireccionar('/usuarios');
            } else {
                die("No se pudo realizar el alta");
            }
        } else {
            $this->vista('usuarios/agregar', $this->obtenerDatosVacios());
        }
    }

    /**
     * Edita un usuario existente
     *
     * @param int $id
     */
    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->obtenerDatosFormulario();
            $datos['id'] = $id;
            if ($this->usuarioController->actualizarUsuario($datos)) {
                redireccionar('/usuarios');
            } else {
                die("No se pudo actualizar el usuario");
            }
        } else {
            $usuario = $this->usuarioController->obtenerUsuarioPorId($id);
            $datos = $this->mapearUsuarioADatos($usuario);
            $this->vista('usuarios/editar', $datos);
        }
    }

    /**
     * Borra un usuario existente
     *
     * @param int $id
     */
    public function borrar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->usuarioController->borrarUsuario($id)) {
                redireccionar('/usuarios');
            } else {
                die("No se pudo borrar el usuario");
            }
        } else {
            $usuario = $this->usuarioController->obtenerUsuarioPorId($id);
            $datos = $this->mapearUsuarioADatos($usuario);
            $this->vista('usuarios/borrar', $datos);
        }
    }

    /**
     * Carga la vista de formularios
     *
     * @param array $datos
     */
    public function forms($datos)
    {
        $this->vista('usuarios/forms', $datos);
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout()
    {
        if (!empty($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
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
     * Mapea un objeto usuario a un array de datos
     *
     * @param object $usuario
     * @return array
     */
    private function mapearUsuarioADatos($usuario)
    {
        return [
            'id' => $usuario->usuario_id,
            'documento' => $usuario->documento_identidad,
            'nombre' => $usuario->nombre,
            'apell' => $usuario->apellidos,
            'fechaNac' => $usuario->fecha_nacimiento,
            'email' => $usuario->email,
            'telefono' => $usuario->telefono,
            'direccion' => $usuario->direccion,
            'fotografia' => $usuario->fotografia,
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
?>

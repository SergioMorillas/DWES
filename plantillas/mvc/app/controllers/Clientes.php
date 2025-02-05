<?php
class Clientes extends Controlador
{
    public function __construct()
    {
        //1) Acceso al modelo
        $this->usuarioCliente = $this->modelo('Cliente');
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
        }
    }
    public function forms($datos)
    {
        $this->vista('clientes/forms', $datos);
    }
}

<?php
class Vehiculos extends Controlador
{
    private $vehiculoController;

    public function __construct()
    {
        $this->vehiculoController = $this->modelo('Vehiculo');
        session_start();
    }

    public function index()
    {
        if (isset($_SESSION['usuario'])) {
            $vehiculos = $this->vehiculoController->obtenerVehiculos();
            $datos = [
                'vehiculos' => $vehiculos,
            ];
            $this->vista('vehiculos/listado', $datos);
        } else {
            $this->vista("usuarios/login");
        }
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->obtenerDatosFormulario();
            if ($this->vehiculoController->agregarVehiculo($datos)) {
                redireccionar('/vehiculos');
            } else {
                die("No se pudo realizar el alta");
            }
        } else {
            $this->vista('vehiculos/agregar', $this->obtenerDatosVacios());
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->obtenerDatosFormulario();
            $datos['id'] = $id;
            if ($this->vehiculoController->actualizarVehiculo($datos)) {
                redireccionar('/vehiculos');
            } else {
                die("No se pudo actualizar el vehículo");
            }
        } else {
            $vehiculo = $this->vehiculoController->obtenerVehiculoPorId($id);
            $datos = $this->mapearVehiculoADatos($vehiculo);
            $this->vista('vehiculos/editar', $datos);
        }
    }

    public function borrar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->vehiculoController->borrarVehiculo($id)) {
                redireccionar('/vehiculos');
            } else {
                die("No se pudo borrar el vehículo");
            }
        } else {
            $vehiculo = $this->vehiculoController->obtenerVehiculoPorId($id);
            $datos = $this->mapearVehiculoADatos($vehiculo);
            $this->vista('vehiculos/borrar', $datos);
        }
    }

    private function obtenerDatosFormulario()
    {
        return [
            'marca' => trim($_POST['marca']),
            'modelo' => trim($_POST['modelo']),
            'año' => trim($_POST['año']),
            'color' => trim($_POST['color']),
            'matricula' => trim($_POST['matricula']),
        ];
    }

    private function mapearVehiculoADatos($vehiculo)
    {
        return [
            'id' => $vehiculo->vehiculo_id,
            'marca' => $vehiculo->marca,
            'modelo' => $vehiculo->modelo,
            'año' => $vehiculo->año,
            'color' => $vehiculo->color,
            'matricula' => $vehiculo->matricula,
        ];
    }

    private function obtenerDatosVacios()
    {
        return [
            'marca' => '',
            'modelo' => '',
            'año' => '',
            'color' => '',
            'matricula' => '',
        ];
    }
}
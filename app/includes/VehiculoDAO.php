<?php
require_once 'IVehiculoDAO.php';
require_once 'Vehiculo.php';

class VehiculoDAO implements IVehiculoDAO {
    private $filePath = 'data/vehiculos.json';

    public function __construct() {
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function registrarVehiculo($vehiculo) {
        $vehiculos = $this->listarVehiculos();
        $vehiculos[] = $vehiculo;
        $this->guardarVehiculos($vehiculos);
    }

    public function eliminarVehiculo($matricula) {
        $vehiculos = $this->listarVehiculos();
        $vehiculos = array_filter($vehiculos, function ($v) use ($matricula) {
            return $v->getMatricula() !== $matricula;
        });
        $this->guardarVehiculos($vehiculos);
    }

    public function modificarVehiculo($vehiculo) {
        $vehiculos = $this->listarVehiculos();
        foreach ($vehiculos as $index => $v) {
            if ($v->getMatricula() === $vehiculo->getMatricula()) {
                $vehiculos[$index] = $vehiculo;
                break;
            }
        }
        $this->guardarVehiculos($vehiculos);
    }

    public function consultarVehiculo($matricula) {
        $vehiculos = $this->listarVehiculos();
        foreach ($vehiculos as $v) {
            if ($v->getMatricula() === $matricula) {
                return $v;
            }
        }
        return null;
    }

    public function listarVehiculos() {
        $json = file_get_contents($this->filePath);
        $data = json_decode($json, true);
        $vehiculos = [];
        foreach ($data as $item) {
            $vehiculos[] = new Vehiculo(
                $item['matricula'],
                $item['marca'],
                $item['modelo'],
                $item['potencia'],
                $item['velocidadMaxima'],
                $item['pathImagen']
            );
        }
        return $vehiculos;
    }

    private function guardarVehiculos($vehiculos) {
        $data = array_map(function ($v) {
            return [
                'matricula' => $v->getMatricula(),
                'marca' => $v->getMarca(),
                'modelo' => $v->getModelo(),
                'potencia' => $v->getPotencia(),
                'velocidadMaxima' => $v->getVelocidadMaxima(),
                'pathImagen' => $v->getPathImagen()
            ];
        }, $vehiculos);
        file_put_contents($this->filePath, json_encode($data));
    }
}
?>
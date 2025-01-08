<?php interface IVehiculoDAO
{
    public function registrarVehiculo($vehiculo);
    public function eliminarVehiculo($matricula);
    public function modificarVehiculo($vehiculo);
    public function consultarVehiculo($matricula);
    public function listarVehiculos();
}

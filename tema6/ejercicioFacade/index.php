<!-- EJERCICIO 7: Patrón Facade y uso con funciones de fechas
El patrón Facade es un patrón de diseño estructural que proporciona una interfaz
simplificada a un conjunto de interfaces en un subsistema. Su propósito es
ocultar la complejidad de un sistema y proporcionar un punto de acceso más
sencillo para el cliente.
Para ello, una vez vistas las funciones de fechas, realiza una clase que
implemente los métodos de la interfaz siguiente:
interface DateFacadeInterface {
public function obtenerFechaHoraActual();
public function formatearFecha($fecha);
public function compararFechas($fecha1, $fecha2);
public function calcularDiferenciaFechas($fecha1, $fecha2);
public function esFechaValida($dia, $mes, $anio);
public function modificarFecha($fecha, $modificacion);
public function convertirZonaHoraria($fecha, $zonaOrigen, $zonaDestino);
public function obtenerFechaNMesesAtras($fecha, $meses);
public function obtenerPrimerYUltimoDiaDelMes();
}
Los métodos deben realizar las siguiente tarea:
1. Obtener la fecha usando usando date() y strftime(): obtiene la fecha del
sistema en formato “dd-mm-aaaa”.
2. Formatear fecha: retorna la fecha del sistema en formato similar a
"Lunes 4 de noviembre del 2024".
3. Comparar fechas: compara dos fechas ingresadas por el usuario y muestre
cuál de ellas es anterior, posterior o si son iguales.
4. Calcular diferencias entre fechas: calcula y muestra la cantidad de días
entre dos fechas ingresadas por el usuario.
5. Validar fechas: valida si es una fecha correcta, mostrando un mensaje
adecuado.
6. Modificar fechas: dada una fecha permite agregar o restar, mostrando la
nueva fecha resultante.
7. Convertir entre zonas horarias: dada una fecha convierte una fecha y hora
ingresada en la zona horaria de Nueva York a la zona horaria de Londres.
8. Generar fechas futuras o pasadas: dada una fecha, genere la fecha que
corresponde a N meses antes de la fecha ingresada.
9. Manejo de calendarios: dado una fecha determinada muestra el primer y el
último día de ese mes. -->

<?php

interface DateFacadeInterface
{
    public function obtenerFechaHoraActual();
    public function formatearFecha($fecha);
    public function compararFechas($fecha1, $fecha2);
    public function calcularDiferenciaFechas($fecha1, $fecha2);
    public function esFechaValida($dia, $mes, $anio);
    public function modificarFecha($fecha, $modificacion);
    public function convertirZonaHoraria($fecha, $zonaOrigen, $zonaDestino);
    public function obtenerFechaNMesesAtras($fecha, $meses);
    public function obtenerPrimerYUltimoDiaDelMes();
}

/**
 * Date
 * Clase creada con la interfaz @DateFacadeInterface como padre para implementar el patron facade
 */
date_default_timezone_set('Europe/Madrid');
setlocale(LC_ALL, 'eu_ES.utf8');
class DateFacade implements DateFacadeInterface
{

    /**
     * 1. Obtener la fecha usando usando date() y strftime(): obtiene la fecha del
     * sistema en formato “dd-mm-aaaa”.
     */
    public function obtenerFechaHoraActual()
    {
        return date("d-m-Y");
    }
    /**
     * 2. Formatear fecha: retorna la fecha del sistema en formato similar a
     * "Lunes 4 de noviembre del 2024".
     */
    public function formatearFecha($fecha)
    {
        $meses = array(
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 
            6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 
            10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        );
    
        $dias_semana = array(
            'Sunday' => 'Domingo', 'Monday' => 'Lunes', 'Tuesday' => 'Martes', 
            'Wednesday' => 'Miércoles', 'Thursday' => 'Jueves', 
            'Friday' => 'Viernes', 'Saturday' => 'Sábado'
        );
    
        $dia_semana = $dias_semana[date('l')];
        $dia = date('d');
        $mes = $meses[(int)date('m')];
        $anio = date('Y');
    
        return "$dia_semana $dia de $mes de $anio";
    }
    
    
    public function compararFechas($fecha1, $fecha2)
    {
    }
    public function calcularDiferenciaFechas($fecha1, $fecha2)
    {

    }
    public function esFechaValida($dia, $mes, $anio)
    {

    }
    public function modificarFecha($fecha, $modificacion)
    {

    }
    public function convertirZonaHoraria($fecha, $zonaOrigen, $zonaDestino)
    {

    }
    public function obtenerFechaNMesesAtras($fecha, $meses)
    {

    }
    public function obtenerPrimerYUltimoDiaDelMes()
    {

    }
}

$d = new DateFacade();
$fecha =  $d->obtenerFechaHoraActual();
echo $d->formatearFecha(new DateTime("now"));
<?php
// Ejemplo 1: Crear un objeto DateTime con la fecha y hora actuales
$fecha_actual = new DateTime(); // Crea la fecha y hora actuales
echo $fecha_actual->format('Y-m-d H:i:s'); // Muestra la fecha en formato 'AAAA-MM-DD HH:MM:SS'

// Ejemplo 2: Crear un objeto DateTime con una fecha específica
$fecha_especifica = new DateTime('2024-12-05 14:30:00'); // Fecha especificada
echo $fecha_especifica->format('d/m/Y H:i'); // Muestra '05/12/2024 14:30'

// Ejemplo 3: Crear un objeto DateTime con la zona horaria especificada
$zona_horaria = new DateTime('now', new DateTimeZone('America/New_York'));
echo $zona_horaria->format('Y-m-d H:i:s T'); // '2024-12-05 14:30:00 EST'

// Ejemplo 4: Modificar una fecha con el método modify()
$fecha = new DateTime('2024-12-05');
$fecha->modify('+2 days'); // Sumar 2 días
echo $fecha->format('Y-m-d'); // Muestra '2024-12-07'

// Ejemplo 5: Comparar fechas con el método diff()
$fecha1 = new DateTime('2024-12-05');
$fecha2 = new DateTime('2024-12-10');
$diferencia = $fecha1->diff($fecha2);
echo $diferencia->format('%d días, %h horas'); // Muestra '5 días, 0 horas'

// Ejemplo 6: Crear un objeto DateTimeImmutable (sin modificar el original)
$fecha_inmutable = new DateTimeImmutable('2024-12-05');
$fecha_inmutable_nueva = $fecha_inmutable->modify('+5 days');
echo $fecha_inmutable->format('Y-m-d'); // Muestra '2024-12-05'
echo $fecha_inmutable_nueva->format('Y-m-d'); // Muestra '2024-12-10'

// Ejemplo 7: Obtener la fecha actual con la zona horaria UTC
$fecha_utc = new DateTime('now', new DateTimeZone('UTC'));
echo $fecha_utc->format('Y-m-d H:i:s'); // Muestra la fecha en UTC

// Ejemplo 8: Establecer una fecha específica con setDate() y setTime()
$fecha = new DateTime();
$fecha->setDate(2024, 12, 5); // Establecer fecha: 5 de diciembre de 2024
$fecha->setTime(14, 30); // Establecer hora: 14:30
echo $fecha->format('Y-m-d H:i:s'); // Muestra '2024-12-05 14:30:00'

// Ejemplo 9: Crear una fecha con el constructor de DateTime y DateTimeZone
$fecha_con_zona = new DateTime('2024-12-05 15:00:00', new DateTimeZone('Europe/Madrid'));
echo $fecha_con_zona->format('Y-m-d H:i:s T'); // '2024-12-05 15:00:00 CET'

// Ejemplo 10: Crear una fecha con un intervalo (DateInterval)
$fecha_inicial = new DateTime('2024-12-05');
$intervalo = new DateInterval('P1D'); // Intervalo de 1 día
$fecha_final = $fecha_inicial->add($intervalo); // Sumar el intervalo
echo $fecha_final->format('Y-m-d'); // Muestra '2024-12-06'

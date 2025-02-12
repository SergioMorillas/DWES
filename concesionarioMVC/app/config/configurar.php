<?php
// Configuracion de acceso a la base de datos
define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASSWORD', 'mysql'); // Pass por defecto al instalar AMMPS
define('DB_NOMBRE', 'concesionarioMVC');


// Ruta de la aplicación raiz /localhost/DWES/mvc
// Con __FILE__ Obtenemos la ruta de este archivo 'configurar.php'
// Con dirname obtenemos la carpeta padre de un ruta determinada
define ('RUTA_APP', dirname(dirname(__FILE__)));

// Ruta URL 
// Similar a la ruta PATH pero partiendo del dominio
// En el ejemplo DWES/mvc
define('RUTA_URL', 'http://localhost/DWES/concesionarioMVC/'); // Esta configurado
define('RUTA_BASE', '/DWES/concesionarioMVC/'); // Esta configurado

// Nombre del sitio
define('NOMBRE_SITIO', 'Concesionario Morillas'); // Esta configurado
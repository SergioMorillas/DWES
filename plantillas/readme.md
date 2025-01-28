# Carpeta config 

## configurar.php

Contiene los parametros de conexión a la **BBDD** y las rutas de la aplicación, un ejemplo sería:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASSWORD', 'mysql'); // Pass por defecto al instalar AMMPS
define('DB_NOMBRE', 'mvc');


// Ruta de la aplicación raiz /localhost/DWES/mvc
// Con __FILE__ Obtenemos la ruta de este archivo 'configurar.php'
// Con dirname obtenemos la carpeta padre de un ruta determinada
define ('RUTA_APP', dirname(dirname(__FILE__)));
define('RUTA_URL', '//http://localhost/DWES/plantillas/mvc/'); // Esta por configurar

define('NOMBRE_SITIO', 'Concesionario'); // Esta por configurar
```

# Carpeta librerias

## DataBase.php

Configura la conexión a la BBDD con PDO a través de PHP. Principalmente configurado con las variables de config.php, para que no haya que tocar el codigo. 

```php
<?php
class DataBase {
    private $host = DB_HOST;
    private $usuario = DB_USUARIO;
    private $password = DB_PASSWORD;
    private $nombre_BD = DB_NOMBRE; 
    private $dbh;  
    private $stmt; 
    private $error;
    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_BD;
        $opciones = array(
            PDO::ATTR_PERSISTENT=>true, 
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones); // Nos conectamos
            $this->dbh->exec('set names utf8'); 
        } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
        }

    }
    public function query($sql) {
        $this->stmt=$this->dbh->prepare($sql);
    }
    public function bind($parametro, $valor, $tipo=null) { 
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo=PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo=PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo=PDO::PARAM_INT;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }
    public function execute() {
        return $this->stmt->execute();
    }
    public function registros() {
        $this->execute();
        return  $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function registro() {
        $this->execute();
        return  $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function rowCount() {
        return  $this->stmt->rowCount();
    }
}
```

## Controlador.php

Es la clase padre de todos los controladores, tiene dos metodos principales, uno para cargar el modelo a traves de un require_once de los modelos. También permite cargar las vistas

```php
<?php
class Controlador {
    public function modelo($m) {
        require_once '../app/models/' . $m . '.php';
        return new $m();
    }
     public function vista($v, $datos=[]) {        
        if (file_exists('../app/views/' . $v . '.php')) {
            require_once '../app/views/' . $v . '.php';           
        } else {            
            die ('La vista no existe');
        }
    }
}
```

## Core.php

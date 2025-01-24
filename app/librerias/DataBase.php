<?php
include_once "..\config\configurar.php";
class DataBase
{
    private $host     = DB_HOST;
    private $usuario  = DB_USUARIO;
    private $password = DB_PASSWORD;
    private $nombre   = DB_NOMBRE;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn      = "mysql:host=$this->host; dbname=$this->nombre;";
        $opciones = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
            $this->dbh->exec("set names utf8");
        } catch (PDOException $e) {
            $this->error = $e;
            echo $this->error;
        }
    }

    public function datosTabla($nombre)
    {
        $query = "SELECT * FROM $nombre";
        $result = $this->dbh->query($query);
    
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo "<thead><tr>";
            foreach (array_keys($row) as $key) {
                echo "<th>" . htmlspecialchars($key) . "</th>";
            }
            echo "</tr></thead>";
            
            $result->execute();
            echo "<tbody>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>";
                foreach ($row as $value) {
                    echo htmlspecialchars($value);
                }
                echo "</tr></td>";
            }
            echo "</tbody>";
        }
        echo "</table>";
    }
    
}
$db = new DataBase();
$db->datosTabla("usuarios");
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

    private $dibujoMultilinea = <<<Capi

⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  ⠀⠀⠀⠀⢀⣤⢤⠤⢄⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  ⠀⣴⣻⠟⠛⠛⠳⣯⡓⣆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  ⢀⣞⡿⠋⠀⠀⠀⠀⠀⠻⣮⢳⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⣀⢴⣿⣭⣭⣟⠶⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣾⡿⠁⠀⠀⠀⠀⡀⠀⠀⠘⢷⡹⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⣰⣻⠟⠁⠀⠀⠈⠻⢦⡑⢄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣞⡾⠁⠀⠀⠀⠀⢠⡿⠀⠠⠀⠈⢷⡹⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⣸⣳⠏⠀⠀⠀⠀⠀⠀⠈⠹⣦⡓⢄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣞⣾⠁⠀⠀⠀⠀⢀⣿⠃⢀⠁⠠⡀⠈⣷⣹⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⢠⣯⡟⠀⠀⠀⣤⠀⠀⠀⠀⠀⠈⠻⣮⡣⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡜⣼⠃⠀⠀⠀⠀⠀⣼⡟⢀⠠⠐⠀⢡⠀⠘⣷⢳⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⣼⣿⠃⠀⣴⠀⠹⣷⡀⠀⠀⠀⠀⠀⠈⢷⣜⢦⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣼⣿⠏⠀⠀⠀⠀⠀⢰⣿⠀⠄⠂⠐⡈⠀⢃⠀⢹⣎⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⡟⣿⠀⠀⠏⠀⡀⠻⣷⡀⠀⠀⠀⠀⠀⠈⢻⣌⢦⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣏⡿⠀⠀⠀⠀⠀⠀⣸⡟⠀⠰⠀⠂⠡⢀⠸⡀⠈⣿⢿⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⢸⣟⡏⠀⣠⠂⠐⠀⡀⠙⣿⡄⠀⠀⠀⠀⠀⠀⠙⣧⡳⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⣿⠃⠀⠀⠀⠀⠀⠀⣿⠇⡂⠁⠄⡁⠐⠠⠀⢡⠀⠸⣏⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⢸⣿⡇⠀⣟⠀⠠⠁⠀⠄⡈⢿⣆⠐⠀⠀⠀⠀⠀⠈⢿⡜⢦⣀⣤⢴⣖⣶⣿⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⣿⠀⡇⠈⡐⠀⠌⠐⠠⠘⡆⢿⣼⡆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⢸⣿⡇⠀⡯⠀⢂⠠⠁⠠⠀⠌⢿⣆⠀⠀⠀⠀⠀⠀⣀⣿⣾⡿⠛⠋⠉⠉⢹⡄⠀⢠⡿⠀⠀⠀⠀⠀⠀⠀⠀⣿⡄⣠⣐⡀⠁⠌⠠⢁⠀⢣⠀⣏⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⢸⣿⡇⠀⢃⠐⠀⠄⠠⠁⡐⠈⡈⣿⡆⠀⠀⢀⣴⠿⠛⠉⢸⡇⠀⠀⠀⠀⢸⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠿⢟⠛⢻⡧⠐⠈⡐⠠⢀⠂⠆⣿⣽⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⢸⣿⡇⠀⠀⠂⢈⠀⢂⠐⠀⢂⠐⢸⣧⠀⠀⠀⠀⠀⠐⠀⢸⡁⠀⠀⠀⠀⠈⡗⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣼⣧⣴⣤⡀⠂⢂⠀⡃⠀⢸⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠘⣿⡇⠀⠀⠡⠀⠂⠄⠂⢡⣾⠿⠿⠿⠀⠀⠀⠀⠀⠀⠀⢸⡇⠀⠀⠀⠀⠀⣟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⠋⠉⠉⣿⡇⠀⠡⠀⢸⠀⠈⣧⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⡿⣿⠀⠠⠁⠐⠠⠐⠠⡘⢿⣤⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⣇⠀⠀⠀⠀⠀⢻⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢰⡟⠀⢈⠐⠠⠈⠀⠀⣿⢸⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⣿⣿⠀⠀⡃⢀⠂⠀⣿⡿⠛⠿⠶⠀⠀⠀⠀⠀⠀⠀⠀⠀⢻⡀⠀⠀⠀⠀⠘⣧⠀⠀⠀⠀⠀⠀⣀⣀⠀⠀⠀⠀⠀⠀⠀⠈⢷⡀⢀⠈⠄⠐⡀⠀⢼⡾⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⢿⣿⡇⠀⡇⠀⡀⠂⢹⣷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣸⡇⠀⠀⠀⠀⠀⠈⠳⣄⡀⠀⢀⣾⣿⣿⣿⣦⡀⠀⠀⠀⠀⠀⠈⢿⡄⠢⠐⠠⠀⠀⢸⡇⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⢸⣿⣧⠀⠰⠀⠠⠐⠀⠹⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⠟⠀⠀⠀⠀⠀⠀⠀⠀⠈⠙⠶⣾⣿⣿⣿⣿⣿⣷⠀⠀⠀⠀⠀⠀⠘⢿⣄⠂⠐⠀⠀⣼⢧⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠈⣿⣿⠀⠘⠄⠐⠀⠌⢠⡿⠀⠀⠀⠀⣀⣤⣦⣶⣤⣴⠏⠀⣀⣤⣴⣶⣶⣶⣦⣤⡀⠀⠀⠙⢿⣿⣿⣿⣿⡿⠀⠀⠀⠀⠀⠀⠀⠜⣿⡀⠈⠀⢠⣿⣿⠁⢀⡀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠸⣿⣇⠀⠻⡀⠈⠀⣿⠃⠀⠀⢠⣾⣿⣿⡿⢿⣿⠏⢠⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠉⢿⡛⠉⠀⠀⠀⠀⠀⠀⠀⠀⠐⠘⣿⣀⣴⣿⣿⣿⣿⣿⣭⣟⢦⣀⣀⣀⠀⠀
⠀⠀⠀⢻⣻⣆⠀⠱⣀⢩⣿⠀⠀⠀⠠⠟⠋⠁⠀⣰⠃⠀⠸⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠀⠀⠀⠀⠀⠈⢷⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢹⣿⣿⡟⠙⣿⣿⠁⠀⢹⣿⡿⠿⣯⡻⡆
⠀⠀⠀⠈⢻⣻⣦⠀⠉⢸⡗⠀⠀⠀⠀⠀⠀⠀⢠⡟⠀⠀⠀⠈⠛⠿⣿⣿⣿⠿⠛⠉⠀⠀⠀⠀⣀⠀⠀⠈⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣿⣿⡶⠀⣿⣿⡀⠐⠈⢁⠠⠀⣼⣇⡇
⠀⠀⠀⠀⠀⠙⢽⡷⣦⣽⡇⠀⠀⠀⠀⠀⠀⠀⢰⡇⢀⠀⠀⠀⠀⠀⠀⠀⢀⠀⠀⠀⠀⠀⠀⠀⣿⠀⠀⠀⠸⣆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠻⢿⣝⣿⡼⣿⣧⡐⠈⣠⣤⢾⣫⠟⠁
⠀⠀⠀⠀⠀⠀⠀⠙⢻⣿⠇⠀⠀⠀⠀⠀⠀⠀⢸⠇⠘⣧⠀⠀⠀⠀⠀⢀⣾⣧⣄⣀⢀⣀⣠⣾⠋⠀⠀⠀⠀⠙⢦⣀⠀⠀⠀⠀⠀⠀⠀⠀⣠⣾⣻⡇⠀⠘⢿⣿⣛⡿⠷⠋⠁⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⡾⣿⠀⠀⠀⠀⠀⠀⠀⢠⡟⠀⠀⠈⠳⣶⣤⡴⣾⢿⡹⢮⡝⣯⢻⣽⣿⣿⣄⠀⠀⠀⠀⠀⠀⠉⠓⠦⣤⣄⣀⣀⣠⣤⠿⢻⡞⣷⠀⠀⠀⠉⠁⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⢀⣾⣷⣿⠀⠀⠀⠀⠀⣀⡴⠋⠀⠀⠀⠀⠀⠹⣷⡹⣎⢷⡹⢧⣻⣼⠿⣿⣄⠉⠙⢷⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣿⡿⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⢻⣽⣧⣤⣀⣀⣠⡴⠞⠋⠀⠀⠀⠀⠀⠀⠀⠀⠘⠻⣯⣞⣭⣻⣟⣷⡀⢀⠛⢿⡄⢸⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠐⣶⣶⣶⣿⡿⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠈⢿⣿⡿⠛⠛⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠛⠛⠛⠛⠻⣧⡈⠐⢈⣡⣾⠏⠀⠀⠀⠀⠀⠀⠀⣀⣤⣶⣯⠿⠟⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠘⢿⣓⣶⣆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠛⠻⠛⠋⠁⠀⠀⠀⠀⠀⠀⠶⠛⠉⢸⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⣿⣺⣿⣿⣻⢦⣤⣤⣀⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣸⢿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⢿⣿⣧⠀⠉⠉⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡿⣾⠹⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⠛⣯⣷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢈⣷⡿⠀⠘⠻⣤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⠟⠁⠀⢿⣸⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⣿⡇⠀⠀⠖⠀⠙⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠁⢶⠀⠀⢸⣿⠇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⠉⠙⠒⠒⠒⠖⠶⠦⠤⠤⢤⡤⣤⠤⣤⢤⡤⣤⢤⡤⠤⠤⠤⠴⠶⠒⠒⠒⠒⠊⠉⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀

Capi;

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
        $query  = "SELECT * FROM $nombre";
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
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";
        }
        echo "</table>";
        echo <<<PRE
        <pre>
            $this->dibujoMultilinea
        </pre>
        PRE;
    }

    public function insertarDatos($tabla, $datos)
    {
        $columnas = implode(", ", array_keys($datos));
        $valores  = implode(", ", array_map(function ($valor) {
            return "'" . htmlspecialchars($valor) . "'";
        }, array_values($datos)));

        $sql = "INSERT INTO $tabla ($columnas) VALUES ($valores)";

        try {
            $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
        }
    }

    public function actualizarDatos($tabla, $datos, $condiciones)
    {
        $sets = implode(", ", array_map(function ($columna, $valor) {
            return "$columna = '" . htmlspecialchars($valor) . "'";
        }, array_keys($datos), $datos));

        $where = implode(" AND ", array_map(function ($columna, $valor) {
            return "$columna = '" . htmlspecialchars($valor) . "'";
        }, array_keys($condiciones), $condiciones));

        $sql = "UPDATE $tabla SET $sets WHERE $where";

        try {
            $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo "Error en la actualización: " . $e->getMessage();
        }
    }

    public function borrarDatos($tabla, $condiciones)
    {
        $where = implode(" AND ", array_map(function ($columna, $valor) {
            return "$columna = '" . htmlspecialchars($valor) . "'";
        }, array_keys($condiciones), $condiciones));

        $sql = "DELETE FROM $tabla WHERE $where";

        try {
            $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo "Error en el borrado: " . $e->getMessage();
        }
    }

    public function eliminarPrimaryKey($tabla)
    {
        $sql = "ALTER TABLE $tabla DROP PRIMARY KEY";

        try {
            $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo "Error al eliminar PRIMARY KEY: " . $e->getMessage();
        }
    }

    public function añadirCampoId($tabla, $campo = 'id')
    {
        $sql = "ALTER TABLE $tabla ADD $campo INT AUTO_INCREMENT PRIMARY KEY";

        try {
            $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo "Error al añadir campo '$campo': " . $e->getMessage();
        }
    }

    public function añadirRestriccionUnique($tabla, $campo)
    {
        $sql = "ALTER TABLE $tabla ADD UNIQUE ($campo)";

        try {
            $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo "Error al añadir restricción UNIQUE en '$campo': " . $e->getMessage();
        }
    }
}
$db = new DataBase();
$db->datosTabla("usuarios");

$datosInsercion = [
    "nombre"              => "maria",
    "apellidos"           => "lopez gomez",
    "fecha_de_nacimiento" => "1985-05-15",
    "login"               => "maria.lopez",
    "password"            => "\$2y\$10\$I6UvaXHcB5BQ/Bh0W7c1Huscr1Q22X/ubPizS5I1CUWyKSBvm3KI.",
    "grupo"               => "Administrador",
];
$datosActualizacion = [
    "login" => "l.fernandez",
];
$condicionesActualizacion = [
    "nombre" => "Laura",
];
$condicionesBorrado = [
    "nombre" => "Ana",
];

$db->insertarDatos("usuarios", $datosInsercion);
$db->actualizarDatos("usuarios", $datosActualizacion, $condicionesActualizacion);
$db->borrarDatos("usuarios", $condicionesBorrado);

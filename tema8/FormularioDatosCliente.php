<?php
    $cookie_name = 'datoscliente';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clave = $_POST['clave'];
            $valor = $_POST['valor'];

            // Recuperar la cookie existente o crear una nueva si no existe
            $datoscliente = isset($_COOKIE[$cookie_name]) ? unserialize($_COOKIE[$cookie_name]) : [];

            // Añadir la nueva pareja clave-valor
            $datoscliente[$clave] = $valor;

            // Guardar el array de nuevo en la cookie
            setcookie($cookie_name, serialize($datoscliente), time() + 3600); // Expira en 1 hora

            // Mostrar contenido de la cookie
            $this->mostrarContenidoCookie();
        }
class FormularioDatosCliente {
    private $cookie_name = 'datoscliente';

    
    

    public function mostrarContenidoCookie() {
        if (isset($_COOKIE)) {
            $datoscliente = unserialize($_COOKIE[$this->cookie_name]);
            if (!empty($datoscliente)) {
                echo '<h3>Contenido de la cookie "datoscliente":</h3>';
                echo '<ul>';
                foreach ($datoscliente as $k => $v) {
                    echo '<li>' . htmlspecialchars($k) . ': ' . htmlspecialchars($v) . '</li>';
                }
                echo '</ul>';
            }
        } else {
            echo 'No hay datos en la cookie "datoscliente".';
        }
    }

    public function mostrarFormulario() {
        echo '<form method="post">';
        echo 'Clave: <input type="text" name="clave"><br>';
        echo 'Valor: <input type="text" name="valor"><br>';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    }

    public function mostrarMensaje() {
        if (isset($_COOKIE)) {
            $datoscliente = unserialize($_COOKIE[$this->cookie_name]);

            if (!empty($datoscliente['nombre'])) {
                $nombre = htmlspecialchars($datoscliente['nombre']);
                echo "Hola $nombre, aquí tienes la información basada en tus preferencias.";
            } else {
                echo "Hola, aquí tienes la información basada en tus preferencias.";
            }
        } else {
            echo "La cookie 'datoscliente' no está disponible.";
        }
    }
}

// Crear instancia de la clase
$formulario = new FormularioDatosCliente();

// Mostrar el formulario
$formulario->mostrarFormulario();
?>

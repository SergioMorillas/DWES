<?php
function pintarHTML($delimitador=" ", ...$str) {
    $completa = "";
    foreach ($str as $cadena) {
        $completa .= $cadena;
    }
    echo htmlspecialchars($completa);
}
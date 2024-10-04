<?php
//obtener 3 comandos del usuario
for ($i=0; $i < 3; $i++) {
    $linea = readline("Comando: ");
    readline_add_history($linea);
}
//mostrar historial
print_r(readline_list_history());
//mostrar variables
print_r(readline_info());
?>

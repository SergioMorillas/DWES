<?php
if (php_sapi_name() == "cli") {
    echo "consola";
    require_once "Faker/src/autoload.php";
} else {
    echo "navegador";
    require_once "../Faker/src/autoload.php";
}
$faker = Faker\Factory::create('es_ES'); // Crear objeto de tipo Faker es-ES
for ($i=0; $i < 100; $i++) {  
    // echo "Prueba con faker:\t" . $faker->name. "\n";
    // echo "Prueba con faker:\t" . $faker->country. "\n";
}
echo $faker->randomHtml(50,3);
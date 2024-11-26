<?php
$coche1 = new Coche("1234NNN");
$coche1->marca = "prueba 123";
$coche1->modelo = "prueba 123";
$coche1->potencia = 123;
$coche1->velocidadMaxima = 123;
$coche2 = new Coche("1234NNN");
$coche2->marca = "prueba 123";
$coche2->modelo = "prueba 123";
$coche2->potencia = 123;
$coche2->velocidadMaxima = 123;
$coche3 = new Coche("1234NNN");
$coche3->marca = "prueba 123";
$coche3->modelo = "prueba 123";
$coche3->potencia = 123;
$coche3->velocidadMaxima = 123;

$dao = new CocheDAO(); 
$dao.crear($coche1);
$dao.crear($coche2);
$dao.crear($coche3);
<!-- EJERCICIO 8. Página php
Realiza un programa en php que muestre por pantalla la tabla resumen que aparece entre asteriscos en la parte inferior, teniendo en cuenta los siguientes requisitos y las fórmulas abajo indicadas:
Un corredor de atletismo necesita conocer cuales son sus franjas de trabajo al 70%, 80%, 90% y 100%. 
Para ello necesitamos que dicho corredor nos introduzca su edad y su frecuencia cardíaca en reposo (Frep) (dichos datos los guardaremos inicialmente en variables en php). 
Posteriormente mostraremos por pantalla una tabla con el siguiente aspecto tras calcular dichas franjas.

*********************************
*      70%      *      XXXX     *
*      80%      *      XXXX     *
*      90%      *      XXXX     *
*********************************


FMax = 208 – (0,7*Edad)
Pulsaciones Objetivo = (FMax-Frep)*FCObjetivo(%) + FRep -->
<?php
$edad = 20;
$frep = 39;

$edad = readline("Introduzca su edad: ");
$frep = readline("Introduzca su frecuencia cardiaca en reposo: ");

$pulsaciones70 = calcula_pulsaciones($frep, 0.70, $edad);
$pulsaciones80 = calcula_pulsaciones($frep, 0.80, $edad);
$pulsaciones90 = calcula_pulsaciones($frep, 0.90, $edad);


echo "*********************************
*      70%      *" . "      $pulsaciones70    " . "*
*      80%      *" . "      $pulsaciones80    " . "*
*      90%      *" . "      $pulsaciones90    " . "*
*********************************";


function calcula_pulsaciones($frep, $porcentaje, $edad)
{
    $fmax = 208 - (0.7 * $edad);
    $pulsaciones = ($fmax - $frep) * $porcentaje + $frep;
    return $pulsaciones;
}
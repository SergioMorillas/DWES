<!-- EJERCICIO 2: Función esPrimo
Diseñar una función que nos diga si un número es primo (un número primo es un número natural mayor que 1 que tiene únicamente dos divisores él mismo y el 1).
EJERCICIO 3: Función damePrimos
Diseña una función que dados dos números enteros n1 y n2 siendo n1<=n2 calcule y muestre los números primos que hay entre esos dos números. Deberemos aprovechar la función anterior.
EJERCICIO 4: Función sumaPrimos
Diseña una función que dados dos números enteros n1 y n2 siendo n1<=n2 calcule la suma de los números primos que hay entre esas dos cifras. No se debe usar arrays. Deberemos aprovechar la función anterior. -->
<?php
function esPrimo($n1)
{
    $maximo = sqrt($n1); // Valor medio para el for
    if ($n1 < 2) return false; // 1 y 0    
    if ($n1 % 2 == 0) return false; //Sin esta linea el 4 me dice que es primo
    for ($i = 2; $i < $maximo; $i++) if ($n1 % $i == 0)
            return false; // En el momento que encontramos un divisor ya no es primo
    return true;
}

function damePrimos($n1, $n2)
{
    $numeros = "";
    for ($i = $n1; $i <= $n2; $i++) {
        if (esPrimo($i)) {
            if ($numeros != "") {
                $numeros .= ", ";
            }
            $numeros .= $i;
        }
    }
    return $numeros;
}

function sumaPrimos($n1, $n2)
{
    $cadena = damePrimos($n1, $n2);
    $suma = 0;

    $token = strtok($cadena, ", ");

    while ($token !== false) {
        $suma += (int) $token;
        $token = strtok(", ");
    }
    return $suma;
}
/**
 * Funcion que identifica si un numero es divisor de otro
 * @param mixed $n1 el número menor, el que quieres saber si es divisor
 * @param mixed $n2 el número mayor, el que vas a comprobar
 * @return bool true si es n2 es divisor de n1 y false en caso contrario
 */
function esDivisor($n1, $n2)
{
    return $n2 % $n1 == 0;
}
function dameDivisores($n1)
{
    $maximo = $n1 / 2;
    $numeros = "";
    for ($i = 1; $i <= $maximo; $i++) {
        if (esDivisor($i, $n1)) {
            if ($numeros != "") {
                $numeros .= ", ";
            }
            $numeros .= $i;
        }
    }
    return $numeros .= ", $n1";
}
function sumaMediaIndefinida(...$n1)
{
    $suma = sumaIndefinida(...$n1);
    $media = mediaIndefinida(...$n1);
    return $suma . ";" . $media;
}
function sumaIndefinida(...$n1): int
{
    $suma = 0;
    foreach ($n1 as $num) {
        $suma += (int) $num;
    }
    return $suma;
}
function mediaIndefinida(...$n1)
{
    return sumaIndefinida(...$n1) / count($n1);
}

/**
 * Funcion que devuelve $base elevado a $exponente
 * @param mixed $base La base
 * @param mixed $exponente El exponente
 * @return float|int La base elevada al exponente
 */
function elevadoRecursivo($base, $exponente)
{
    if ($exponente < 0)
        return -1;
    elseif ($exponente == 1)
        return $base;
    else
        return $base * elevadoRecursivo($base, $exponente - 1);
}
function divisoresPrimos($numero)
{
    $divisores = dameDivisores($numero);
    // $token = strtok($divisores, ", ");
    $cadena = "";
    // while ($token !== false) {
    //     if (esPrimo((int) $token)) {
    //         rellenaCadena((int)$token, $cadena);
    //     }
    //     $token = strtok(", ");
    // }
    $aux = "";
    for ($i = 0; $i < strlen($divisores); $i++) {
        if ($divisores[$i] != ", "){
            $aux .= $divisores[$i];
        } else {
            echo $aux;
            if (esPrimo((int) $aux)) {
                rellenaCadena((int)$aux, $cadena);
            }
        }
    }
    return $cadena;
}

function rellenaCadena($numero, &$cadena){
    if ($cadena != "") {
        $cadena .= ", ";
    }
    $cadena .= $numero;
    return $cadena;
}

function binarioRecursivo($numero){
    if ($numero == 1) return 1;
    elseif ($numero == 0) return 0;
    else return binarioRecursivo((int)($numero/2)).($numero%2);


            //\\            
           //  \\           
          //    \\          
         //      \\         
        //        \\        
       //__________\\       
      //| Case 12  |\\      
     // |__________| \\     
    //  | 6  .  0  |  \\    
   //   | 3  .  0  |   \\   
  //    | 1  .  1  |    \\  
 //     | 0  .  1  |     \\ 
//______|__________|______\\
}
?>
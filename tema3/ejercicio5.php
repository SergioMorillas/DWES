<!-- EJERCICIO 5: El juego de la ruleta rusa
Realizar un programa que simule el juego de la “ruleta rusa”. Para ello,  generaremos un número aleatorio entre [1,6] y le mostraremos al usuario mensajes del tipo: “¿Quieres dispararte el primer tiro?”, ¿Quieres dispararte el segundo tiro? …”. A medida que el usuario se vaya disparando doblaremos el dinero ganado por él, partiendo inicialmente de 1000€. Si coincide el tiro con el número aleatorio el usuario muere y lo pierde todo. Siempre podrá retirarse en cualquiera de las preguntas de disparo.
Restricciones:
En este ejercicio está prohibido el uso de bucles. -->

<?php
while (true) {
    $bala = rand(1, 6);
    $dinero = 1000;
    $contador = 1;

    $opcion = readline("Actualmente tienes 0€, ¿Quieres dispararte el primer tiro?\t");
    if (!strcasecmp($opcion, "si")) {
        if ($bala == $contador) {
            echo "Has muerto jaja, no has ganado nada\n";
        } else {
            $opcion = readline("Has sobrevivido, actualmente tienes $dinero €, ¿quieres continuar?");
            if (!strcasecmp($opcion, "si")) {
                $dinero *= 2;
                $contador++;
                if ($bala == $contador) {
                    echo "Has muerto jaja, no has ganado nada\n";
                } else {
                    $opcion = readline("Has sobrevivido, actualmente tienes $dinero €, ¿quieres continuar?");
                    if (!strcasecmp($opcion, "si")) {
                        $dinero *= 2;
                        $contador++;
                        if ($bala == $contador) {
                            echo "Has muerto jaja, no has ganado nada\n";
                        } else {
                            $opcion = readline("Has sobrevivido, actualmente tienes $dinero €, ¿quieres continuar?");
                            if (!strcasecmp($opcion, "si")) {
                                $dinero *= 2;
                                $contador++;
                                if ($bala == $contador) {
                                    echo "Has muerto jaja, no has ganado nada\n";
                                } else {
                                    $opcion = readline("Has sobrevivido, actualmente tienes $dinero €, ¿quieres continuar?");
                                    if (!strcasecmp($opcion, "si")) {
                                        $dinero *= 2;
                                        $contador++;
                                        if ($bala == $contador) {
                                            echo "Has muerto jaja, no has ganado nada\n";
                                        } else {
                                            $opcion = readline("Has sobrevivido, actualmente tienes $dinero €, ¿quieres continuar?");
                                            if (!strcasecmp($opcion, "si")) {
                                                $dinero *= 2;
                                                $contador++;
                                                if ($bala == $contador) {
                                                    echo "Has muerto jaja, no has ganado nada\n";
                                                } else {
                                                    $opcion = readline("Has sobrevivido, actualmente tienes $dinero €, ¿quieres continuar?");
                                                }
                                            } else
                                                echo "Eres un cobarde, pero has ganado $dinero €. Ibas a morir en el disparo $bala y te has quedado en el $contador\n";
                                        }
                                    } else
                                        echo "Eres un cobarde, pero has ganado $dinero €. Ibas a morir en el disparo $bala y te has quedado en el $contador\n";
                                }
                            } else
                                echo "Eres un cobarde, pero has ganado $dinero €. Ibas a morir en el disparo $bala y te has quedado en el $contador\n";
                        }
                    } else
                        echo "Eres un cobarde, pero has ganado $dinero €. Ibas a morir en el disparo $bala y te has quedado en el $contador\n";
                }
            } else
                echo "Eres un cobarde, pero has ganado $dinero €. Ibas a morir en el disparo $bala y te has quedado en el $contador\n";
        }
    } else {
        echo "Te puedes ir, no has ganado nada por cobarde\n";
    }
}
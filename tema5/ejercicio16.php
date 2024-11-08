<!-- EJERCICIO 16: Juego de cartas
Realizar un programa simule de forma aleatoria una mano de poker entre 2
jugadores. Se repartirán inicialmente 3 cartas por jugador y el crupier mostrará
dos más. Se deberá comprobar únicamente las parejas. Gana el jugador con la
jugada más alta. ¿Te atreves a comprobar tríos, poker y repoker? -->

<?php

class Jugador
{
    public array $cartas;

    public function __construct($cartas)
    {
        $this->cartas = $cartas;
    }
    public function addCrupierCards($crupier)
    {
        $this->cartas = array_merge($this->cartas, $crupier);
    }
    public function getMano(): array
    {
        $jugadas = [];
        $frecuencias = array_count_values($this->cartas);
        foreach ($frecuencias as $key => $value) {
            if ($value > 4) {
                $jugadas[] = "Repoker de $key";
            } else if ($value > 3) {
                $jugadas[] = "Poker de $key";
            } else if ($value > 2) {
                $jugadas[] = "Trio de $key";
            } else if ($value > 1) {
                $jugadas[] = "Pareja de $key";
            }
        }
        return $jugadas;
    }

    public function __toString(): string
    {
        print_r($this->cartas);
    }

    public function comparator($jugador2){
        $miMano = $this->getMano();
        $suMano = $jugador2->getMano();
    
        if (empty($miMano) && empty($suMano)) {
            return 'Ningun jugador tiene manos validas';
        }
    
        $prioridades = ['Repoker' => 4, 'Poker' => 3, 'Trio' => 2, 'Pareja' => 1];
        // Ordenar las manos por prioridad (repoker > poker > trio > pareja)
        usort($miMano, function ($a, $b) {
            return $prioridades[$b] <=> $prioridades[$a];
        });
        usort($suMano, function ($a, $b) {
            return $prioridades[$b] <=> $prioridades[$a];
        });
    
    }
}

$j1 = [];
$j2 = [];
$crupier = [rand(1, 10)];

for ($i = 0; $i < 2; $i++) {
    $j1[] = rand(1, 10);
    $j2[] = rand(1, 10);
    $crupier[] = rand(1, 10);
}

$jugador1 = new Jugador($j1);
$jugador2 = new Jugador($j2);

$jugador1->addCrupierCards($crupier);
$jugador2->addCrupierCards($crupier);

print_r($jugador1->getMano());
print_r($jugador2->getMano());

echo $jugador1->comparator($jugador2);
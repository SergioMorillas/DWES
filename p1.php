<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P1</title>
</head>

<body>
    <?php
    for ($i = 120; $i >= 0; $i--) {
        $r=$i*2;
        $g=$i*4;
        $b=$i*6;
        echo "<marquee style=\"background-color:rgb($r,$g,$b);\"> prueba " . $i . "</marquee>";
        if ($i % 2 == 0) {
            echo "<marquee style=\"background-color:rgb($r,$g,$b);\"> prueba " . "Numero par" . "</marquee>";

        }
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P1</title>
</head>

<body>
    <?php
    for ($i = 0; $i <1000; $i++) {
        $r=rand(0, 255);
        $g=rand(0, 255);
        $b=rand(0, 255);
        echo "<marquee style=\"background-color:rgb($r,$g,$b)\">.</marquee>";
    }  
    ?>
    
</body>

</html>
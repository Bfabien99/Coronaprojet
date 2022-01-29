<?php
   /* require 'class/covid19.php';
    $covid = new covid19();
    // $globals = $covid->globalCase();
    $countries = $covid->countryCase('Egypt');
    $countrie = $covid->countryVaccine('Egypt');
    var_dump($countries);
    echo ";
    var_dump($countrie);

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($globals as $global){
        echo "Victime totale : ".$global['population']." </br>";
    } ?>
</body>
</html> -->*/
header("location:view/home.php");
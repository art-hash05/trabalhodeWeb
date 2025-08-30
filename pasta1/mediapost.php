<?php

echo "Média Aritimética usando POST: : <br>"; 

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$num3 = $_POST["num3"];
$media = ($num1 + $num2 + $num3) / 3;

echo "Soma aritimética de: ". $num1 . " + ". $num2 . " + " . $num3 . " = " . $media;

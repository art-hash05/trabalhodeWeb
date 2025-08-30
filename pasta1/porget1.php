<?php

echo "Média Aritimética usando GET: : <br>"; 

$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$num3 = $_GET["num3"];
$media = ($num1 + $num2 + $num3) / 3;

echo "Media aritimética de: ". $num1 . " + ". $num2 . " + " . $num3 . " = " . $media;

//porget.php?num1=5&num2=10&num3=5
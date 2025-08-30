<?php

echo "Soma usando GET: : <br>"; 

$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$soma = $num1 + $num2;
echo $num1 . " + " . $num2 . " = " . $soma;

//porget.php?num1=7&num2=5  
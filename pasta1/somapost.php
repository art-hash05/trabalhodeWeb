<?php

echo "Soma usando Post: : <br>"; 

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$soma = $num1 + $num2;
echo $num1 . " + " . $num2 . " = " . $soma;


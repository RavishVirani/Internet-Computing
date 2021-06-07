<?php 
 $num1 = $_GET["num1"]; 
 $num2 = $_GET["num2"];
 if (is_numeric($num1) && is_numeric($num2) ) {
    $sum = $num1 + $num2;
    echo  $sum;
 } else {
    echo "invalid input";
 }
?>
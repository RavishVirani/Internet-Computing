<html>
<head>
<title>CGI sum by PHP</title>
</head>
<body>
<?php
$num1 = $_GET["num1"]; 
$num2 = $_GET["num2"];
if (is_numeric($num1) && is_numeric($num2) ) {
   $sum = $num1 + $num2;
   echo "<h2>$num1 + $num2 = $sum</h2>";
} else {
   echo "<h2>invalid input</h2>";
}
?>
</body>
</html>

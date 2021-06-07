<html>
<head>
<title>Process form </title>
</head>
<body>

<?php
// If any of the quantities are blank, set them to zero
$unpop = 0;
$caramel = 0;
$caramelnut = 0;
$toffeynut = 0;

if ($_GET["unpop"] != "")  $unpop = $_GET["unpop"];

if ($_GET["caramel"] != "")  $caramel = $_GET["caramel"];

if ($_GET["caramelnut"] != "") $caramelnut = $_GET["caramelnut"];

if ($_GET["toffeynut"] != "") $toffeynut = $_GET["toffeynut"];

// Compute the item costs and total cost
$unpop_cost = 3.0 * $unpop;
$caramel_cost = 3.5 * $caramel;
$caramelnut_cost = 4.5 * $caramelnut;
$toffeynut_cost = 5.0 * $toffeynut;
$total_price = $unpop_cost + $caramel_cost + $caramelnut_cost + $toffeynut_cost;
$total_items = $unpop + $caramel + $caramelnut + $toffeynut;

// Return the results to the browser in a table
?>

<h4> Customer: </h4>
<?php
print ("$_GET[name] <br /> $_GET[street] <br /> $_GET[city] <br />");
?>

<br>
<table border = "border">
<caption> Order Information </caption>
<tr>
<th> Product </th>
<th> Unit Price </th>
<th> Quantity Ordered </th>
<th> Item Cost </th>
</tr>
<tr align = "center">
<td> Unpopped Popcorn </td>
<td> $3.00 </td>
<td> <?php print ("$unpop"); ?> </td>
<td> <?php printf ("$ %4.2f", $unpop_cost); ?> </td>
 
</tr>
<tr align = "center">
<td> Caramel Popcorn </td>
<td> $3.50 </td>
<td> <?php print ("$caramel"); ?> </td>
<td> <?php printf ("$ %4.2f", $caramel_cost); ?> </td>

</tr>
<tr align = "center">
<td> Caramel Nut Popcorn </td>
<td> $4.50 </td>
<td> <?php print ("$caramelnut"); ?> </td>
<td> <?php printf ("$ %4.2f", $caramelnut_cost); ?> </td>

</tr>
<tr align = "center">
<td> Toffey Nut Popcorn </td>
<td> $5.00 </td>
<td> <?php print ("$toffeynut"); ?> </td>
<td> <?php printf ("$ %4.2f", $toffeynut_cost); ?> </td>

</tr>
</table>
<br>

<?php
print ("You ordered $total_items popcorn items <br />");
printf ("Your total bill is: $ %5.2f <br />", $total_price);
print ("Your chosen method of payment is: $_GET[payment] <br />");?>

</body>
</html>


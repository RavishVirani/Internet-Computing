#!C:/xampp/perl/bin/perl.exe
#!/usr/bin/perl -w
# popcorn.pl
# A CGI program, written using CGI.pm, to process 
# the popcorn sales form

use CGI ":standard";

# Initialize total price and total number of purchased items

$total_price = 0;
$total_items = 0;

# Set local variables to the parameter values

my($name, $street, $city, $payment, $comments, $delivery) = 
        (param("name"), param("street"),
        param("city"), param("payment"), param("comments"),param("delivery"));

my($unpop, $caramel, $caramelnut, $toffeynut) = 
        (param("unpop"), param("caramel"),
         param("caramelnut"), param("toffeynut"));


# Compute the number of items ordered and the total cost

if ($unpop > 0) {
    $cost = 3.0 * $unpop;
    $total_price += $cost;
    $total_items += $unpop;
} 

if ($caramel > 0) {
    $cost = 3.5 * $caramel;
    $total_price += $cost;
    $total_items += $caramel;
} 

if ($caramelnut > 0) {
    $cost = 4.5 * $caramelnut;
    $total_price += $cost;
    $total_items += $caramelnut;
} 

if ($toffeynut > 0) {
    $cost = 5.0 * $toffeynut;
    $total_price += $cost;
    $total_items += $toffeynut;
}

if ($delivery eq "Pick up (no charge)") {
	$deliverycost = 0.0*$total_items;
}
elsif ($delivery eq 'Regular mail ($1 per unit)'){
	$deliverycost = 1.0 * $total_items;
}
else {
	$deliverycost = 2.0 * $total_items;
}

$totalbill = $total_price+$deliverycost;

# save the a order to order.txt
$LOCK = 2;
$UNLOCK = 8;
$remoteip = $ENV{"REMOTE_ADDR"};
open(ORDER, ">>order.txt") or die "Sorry, your order can not be 
processed.";
flock(ORDER, $LOCK);
print ORDER "Name:$name,$remoteip,$comments";
flock(ORDER, $UNLOCK);
close(ORDER);

# Produce the result information to the browser and finish the page
print header();
print start_html("Order form using CGI.pm");

# To show all the environment variables and their values associated with 
# the current connection

print "<h3>Customer:</h3>\n",
      "$name <br/>\n", "$street <br/>\n", "$city <br/>\n",
      "Payment method: $payment <br/><br/>\n",
      "<h3>Items ordered:</h3> \n",
      "Unpopped popcorn: $unpop <br/> \n",
      "Caramel popcorn: $caramel <br/> \n",
      "Caramel nut popcorn: $caramelnut <br/> \n",
      "Toffey nut popcorn: $toffeynut <br/><br/> \n",
      "You ordered $total_items popcorn items <br/>\n",
       "The total price is: \$ $total_price <br> \n",
      "The delivery method is: $delivery <br/>\n",
      "The total delivery cost is: \$ $deliverycost <br> \n",
      "Your total bill is: \$ $totalbill <br/> <br/>\n",
      "Your comments is: $comments  <br/><br/>\n",  
      "Thank you for your ordering and comments<br/>\n"; 
  
print end_html();

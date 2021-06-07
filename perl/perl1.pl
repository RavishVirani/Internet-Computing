#!/usr/bin/perl -w
# Perl 1
# HBF 
# CP476 a2 task

# Scalar

$a = 25;
print $a;
print "\n";

$b =10.5;
print($b);
print("\n");

$c = "string scalar"; 
print $c;
print "\n";

$ref = \$c;
print $$ref;  

# Scalars are interpolated in string

$salary = 47500;
print "\nJack makes $salary dollars per year";

# Number operations

$a = 5;
$b = 2;

print "\na = $a, b = $b";

$c = $a + $b;
print "\na + b = $c";

$c = $b - $a;
print "\nb - a = $c";

$c = $a * $b;
print "\na * b = $c";

$c = $a / $b;
print "\na / b = $c";

$c = $a % $b;
print "\na % b = $c";

$c = ++$a;
print "\n ++a = $c";

print "\n a = $a";

$c = $a ** $b;
print "\n$a**$b = $c";

$c = 5**2;
print "\n5**2 = $c";

$a = 5.2;
$b = 2;
$c = $a / $b;
print "\n$a / $b = $c";

$c = $a**2;
print "\n$a**2 = $c";

# Spring operations

$fruit = "apple ";
print "\nfruit=\"$fruit\"";

print "\n";
print $fruit x 3;
print "\n";

$dessert = $fruit . "pie";

print "\ndessert=\"$dessert\"";

$s = "Hello\n";
print "\n".$s;
print "\n".length($s);
chomp($s); 
print "\n".length($s);
$ts = lc($s);
print "\n".$ts;
print "\n".$s;

$ts = uc($s);
print "\n".$ts;
 
$ts = join(" ", " a " , " bc ", "d");  
print "\n".$ts;

print "\n".join(" ", " a " , " bc ", "d");

print "\nrindex(\"abc\", \"b\")=".rindex("abc", "b");  

print "\n".'substr("abcd", 1, 2)='.substr("abcd", 1, 2);

# STD I/O

print "\nInput something:";
$new = <STDIN>; 
print $new;

print "\nInput something with chomp:";
chomp($new = <STDIN>); 
print $new;

print "\nInput the circle’s radius:";
$radius = <STDIN>;
$area = 3.14159265 * $radius * $radius;

print "\nThe area of the circle is $area";
printf("\narea=%.2f", $area);


# Flow control

for ($i=0; $i<10; $i++) {
   if ($i % 2 == 0) {
      print "\n$i is even.";
   } else {
      print "\n$i is odd.";
   }
}

while ($input=<STDIN>) {
print "Input a character, input q to break:\n";
    print $input;
    chomp $input;
    if ($input eq "a") {
       print "A\n";
    } elsif ($input eq "b") {
	   print "B\n";
	} elsif ($input eq "q") {
	   print "break\n";
	   last; 
	}
	else {
	   print "C\n"; 
	}
}

# Implicit variable $_

while (<STDIN>) {
print "Input anything, input quit to break:\n";
    print;
    chomp;
    if ($_ eq "quit") {
        print "quit\n";
		last;
    }
	else {
	   print $_; 
	}
}

# File I/O

open (OUT, ">test.txt");
print OUT "Output to file\n";
print OUT "Output to file again\n";
close(OUT);

print "\n";
$line_count = 0;
open (fi, "<test.txt");
while ($line = <fi>) {
  print $line;
  $line_count++;
}
close(fi);

print "\nline_count=".$line_count;


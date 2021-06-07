<?php 

print("\n-----Output-----");
echo ("\n");
echo ("hello PHP");
echo "hello PHP", "hello PHP<br>"; 
$a="PHP";
print $a;
echo "hello ", $a;

print "hello PHP\n"; 
print ("hello PHP<br>");
printf ("hell %s", $a);  

// Integer
print("\n\n-----Integer-----");
$a=10;
$b=2;
printf ("\n\$a=%d", $a);
printf ("\n\$b=%d", $b); 
printf ("\ngettype(\$a)=%s", gettype($a));
printf ("\nis_int(\$a)=%s", is_int($a));   
printf ("\n\$a + \$b = %d", $a + $b); 
printf ("\n\$a - \$b = %d", $a - $b); 
printf ("\n\$a * \$b = %d", $a * $b); 
printf ("\n\$a / \$b = %d", $a / $b);

printf ("\n\$c=\$a / 3;");
$c=$a / 3;
printf ("\ngettype(\$c)=%s", gettype($c));
printf ("\n\$c=%f", $c); 
printf ("\n\$c=%d", $c); 


// Double
print("\n\n-----Double-----");
$a=10.1;
$b = 2.2;
$c = $a + $b;
printf ("\n%f + %f = %f", $a, $b, $c); 
printf ("\n%.2f + %.2f = %.2f", $a, $b, $c); 
printf ("\ngettype(\$a)=%s", gettype($a)); 
printf ("\nis_double(\$a)=%s", is_double($a)); 
printf ("\n (int) \$a=%d", (int) $a); 


// Boolean
print("\n\n-----Boolean-----");
$a=true;
$b=false;
echo "\n", $b, " = ", $a;
printf ("\n%d, %d", $a, $b); 
printf ("\ngettype(\$a)=%s", gettype($a)); 
printf ("\nis_nan(\$a)=%s", is_nan($a)); 

// String
print("\n\n-----String-----");
$a="hello";
$b="world";
$c = $a.",".$b;
printf ("\n\$a=%s", $a);
printf ("\ngettype(\$a)=%s", gettype($a)); 
printf ("\n\$b=%s", $b);
printf ("\n\$c=\$a.\",\".\$b=%s", $c);
printf ("\n\$a[1]=%s", $a[1]);
printf ("\nstrlen(\$a)=%d", strlen($a));
printf ("\nstrtolower(\$a)=%s", strtolower($a));
printf ("\nstrtoupper(\$a)=%s", strtoupper($a));
printf ("\nsubstr(\$a, 2)=%s", substr($a, 2));
printf ("\nstrstr(\"Hello world!\",\"world\")=%s", strstr("Hello world!","world"));

$a="    hello,    world   \n";
printf ("\n\$a=%s", $a);
printf ("\ntrim(\$a)=%s", trim($a));
printf ("\ntrim(preg_replace('/[\\t\\n\\r\\s]+/', ' ', \$a))=%s", trim(preg_replace('/[\t\n\r\s]+/', ' ', $a)));

$a="123";
printf ("\n\$a=%s", $a);
printf ("\ngettype(\$a)=%s", gettype($a));
printf ("\n (int) \$a=%d", (int) $a);
printf ("\nintval(\$a)=%d", intval($a));

$a="3.14";
printf ("\n\$a=%s", $a);
printf ("\ngettype(\$a)=%s", gettype($a));
printf ("\n (double) \$a=%.2f", (double) $a);
printf ("\ndoubleval(\$a)=%.2f", doubleval($a));


// Flow control
printf("Print inters not divisable by 2 or 3");
for ($i = 0; $i<100; $i++) {
    if ($i > 20 ) 
       break;
    elseif ( $i % 2 == 0 ) 
       continue;
    else if ( $i % 3 == 0 ) 
       continue;
    else {
       print($i."\n");
     }
}

$a="123";
$b=123;

if ($a == $b) {
    printf("\n\$a==\$b");
} else {

    printf("\n\$a!=\$b");
}

if ($a === $b) {
    printf("\n\$a===\$b");
}
else {
    printf("\n\$a!==\$b");
}


// Array

$colors = array("blue", "red", "green", "yellow");
$color = current($colors);
$key = key($colors);
print ("\n".$key."=>".$color);

$color = next($colors);  
$key = key($colors);
print ("\n".$key."=>".$color);

$color = current($colors);
$key = key($colors);
print ("\n".$key."=>".$color);

prev($colors);
$color = current($colors);
$key = key($colors);
print ("\n===".$key."=>".$color);

print ("\n");
while (current($colors)) {
    print (key($colors)."=>".current($colors)." ");
    next($colors);
}


reset($colors);
print ("\n");
while (current($colors)) {
    print (key($colors)."=>".current($colors)." ");
    next($colors);
}

reset($colors);
print ("\nforeach: ");
foreach ($colors as $color) {
    print $color." ";
}

print ("\nforeach key=>value ");
foreach ($colors as $key=>$color) {
    print $key."=>".$color." ";
}


print ("\n");
$list = array("make"=>"Cessna", "model"=>"C210", "year"=>1960,3 =>"sold");
while (current($list) ) {
    print(key($list)."=>".current($list)."; ");
    next($list);
}

$salaries = array("Mike"=>42500, "Jerry"=>52100,"Fred"=>37900);
$name = key($salaries);
$salary = current($salaries);;
print("\nThe salary of $name is $salary");

$salary=next($salaries);
$name = key($salaries);
print("\nThe salary of $name is $salary");

reset($salaries);

/*  each() is deprecated
while ($employee=each($salaries)) {
    $name = $employee["key"];
    $salary = $employee["value"];
    print("\nThe salary of $name is $salary");
}
*/

print_r($salaries);

$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");

print_r($a);

$b = array_keys($a);

print_r($b);

print_r($a);

$b = array_values($a);

print_r($b);

print_r($a);

$b = rsort($a);

// sort
//rsort($a);
print_r($b);

$b = ksort($a);
//ksort($a);
print_r($b);

$b = krsort($a);
//ksort($a);
print_r($b);


?>
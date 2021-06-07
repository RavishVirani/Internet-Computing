#!C:/xampp/perl/bin/perl.exe
#!/usr/bin/perl -w
# sum_cgi.pl

use CGI ":standard";

# get the parameter value from the brower query
my ($num1, $num2) = (param("num1"), param("num2"));

# validate and compute sume
if ($num1 =~ /^[+-]?(\d+(?:\.\d+)?)$/ &&  $num2 =~ /^[+-]?(\d+(?:\.\d+)?)$/) {
    $sum = $num1+$num2;
    $result = "<h2>$num1 + $num2 = $sum</h2>";
} else {
    $result = "<h2>Invalid input</h2>";
}

# Produce html response to browser
print header();
print start_html("Sum Caculator");
print $result;
print end_html();

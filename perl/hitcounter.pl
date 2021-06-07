#!C:/xampp/perl/bin/perl.exe
#!/usr/bin/perl -w

# open and read from file
open(COUNT, "<counter.txt") or die "Error!";
flock(COUNT,2);
my $counter = <COUNT>;
flock(COUNT,8);
close(COUNT);

# increase the counter
chomp($counter);
$counter = $counter + 1;

# write to file
open(COUNT, ">counter.txt") or die "Error!";
flock(COUNT,2);
print COUNT $counter;
flock(COUNT,8);
close(COUNT);

# write html to client
print "Content-type: text/html

<html>
<head>
<title>Perl CGI counter</title> 
</head>
<body>
<h1>Hit count: $counter </h1>
</body>
</html>
";


#use CGI ":standard";=
#print header();
#print start_html("Perl CGI counter");
#print "<h1>Hit count: $counter </h1>";
#print end_html();


#!C:/xampp/perl/bin/perl.exe
#!/usr/bin/perl -w
# popcorn.pl
# A CGI program, written using CGI.pm, to process the popcorn sales form

use CGI ":standard";
print header();
print start_html("CGI-Perl Popcorn Sales Form, using CGI.pm");

print "<pre>";
foreach $var (sort(keys(%ENV))) {
    $val = $ENV{$var};
    $val =~ s|\n|\\n|g;
    $val =~ s|"|\\"|g;
    print "$var=\"$val\"\n";
}
print "</pre>";  
print end_html();

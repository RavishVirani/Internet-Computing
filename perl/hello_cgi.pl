#!C:/xampp/perl/bin/perl.exe
#!/usr/bin/perl -w
# Perl CGI using CGI :standard module

use CGI ":standard";
print header();
print start_html("Perl CGI");
print h1("Hello Perl CGI");
print end_html();


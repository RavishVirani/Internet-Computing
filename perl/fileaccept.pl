#!C:/xampp/perl/bin/perl.exe
#!/usr/bin/perl -w

use CGI ":standard";
use DBI;

$q = new CGI;

if($q->param("testfile")) 
{
   $filehandle = $q->param("testfile");
   open (OUTFILE, ">test1.txt");
   while ($line = <$filehandle>) 
   {
      print OUTFILE $line;
   }
   close OUTFILE;
}

print header();
print start_html("upload file");

print "File is uploaded";

print "<pre>",
`cat /home/hfan/public_html/cgi-bin/test1.txt`,
"</pre>";

print end_html();


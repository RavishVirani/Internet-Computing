#!/usr/bin/perl -w

# Perl 2
# HBF 
# CP476 a2 task

# Arrays

($x, $y) = (1, 2);

print "\n$x, $y";

@list = (2, 6, 1, 8);
$len = @list;
print "\nlist length=$len";
print "\n";
for ($i=0; $i<$len; $i++){
  print  $list[$i]." ";
}

print "\n";
foreach $x (@list){
    print "$x ";
}


print "\n";
@list2 = @list;
foreach $x (@list2){
    print "$x ";
}

for ($i=0; $i<@list2; $i++){
   $list2[$i] = $list2[$i]+1;
}

print "\n";
foreach $x (@list2){
    print "$x ";
}

# List functions

print "\nsort the list: \n";
@list3 = sort @list;  # sort the list
foreach $x (@list3){
    print "$x ";
}


# shift, unshift at beginning of the list
shift @list;  # shift _ pop off the left end
print "\n";
foreach $x (@list){
    print "$x ";
}

unshift @list, 47; 

print "\n";
foreach $x (@list){
    print "$x ";
}

# pop, push at the end of a list
$d = pop @list;
print "\n".$d;
print "\n";
foreach $x (@list){
    print "$x ";
}

push  @list, 48; 
print "\n";
foreach $x (@list){
    print "$x ";
}

# References for arrays

print "\nReference list"; 
$ref_list = [2, 6, 1, 8];  # using bracket
foreach $name (@$ref_list) {
  print "\n$name"; 
}

print "\nchange item";
$$ref_list[0] = 1;
foreach $name (@$ref_list) {
    print "$x ";
}


# split 
$stuff = "233:466:688";
@numbers = split /:/, $stuff; 

print "\n";
foreach $x (@numbers){
    print "$x ";
}


# Hash (associate array)

%hash1 = ("b", 98, "a", 97, "c", 99);  # using parenthesis

print "\nexist check";
if (exists $hash1{"a"}) {
  print "\n".$hash1{"a"}; 
}


print "\nTraversal";
foreach $name (keys %hash1) {
  print "\n($name, $hash1{$name})"; 
}


print "\nDelete";
delete $hash1{"c"};
foreach $name (keys %hash1) {
  print "\n($name, $hash1{$name})"; 
}

print "\nInsert";
$hash1{"d"} = 100;
foreach $name (keys %hash1) {
  print "\n($name, $hash1{$name})"; 
}

# Sort by keys

print "\nSort by keys";
foreach $name (sort keys %hash1){
   print "\n($name, $hash1{$name})"; 
}

print "\nSort by values";

foreach $name (sort {$hash1{$a} <=> $hash1{$b}} keys %hash1){
   print "\n($name, $hash1{$name})"; 
}


print "\nAlternative definition";
%hash2 = ("a" => 97, "b" => 98);
foreach $name (keys %hash2) {
  print "\n($name, $hash2{$name})"; 
}


print "\nSimplified definition";
%hash3 = (a=>97, b=>98);
foreach $name (keys %hash3) {
  print "\n($name, $hash3{$name})"; 
}


# References for hash

print "\nHash reference and dereference";
$ref_hash = {a=>96, b=>98};  # using braces
foreach $name (keys %$ref_hash) {
  print "\n($name, $$ref_hash{$name})"; 
}

print "\nHash change";
$$ref_hash{"c"}=99;
$ref_hash -> {"a"} = 97;

foreach $name (keys %$ref_hash) {
  print "\n($name, $$ref_hash{$name})"; 
}


# Functions

$a = 1;
$b = 2;
print "\nFunction pass by value and local variables";
sub sum {
  my $a = $_[0];
  my $b = $_[1];
  return $a + $b;
}
$c = sum(2, 4); 
print "\nsum(2, 4)=$c";
print "\n$a $b";


print "\nGlobal variables in function";
sub sum_global {
  $a = $_[0];
  $b = $_[1];
  return $a + $b;
}
print "\nsum_global(2, 4)=".sum_global(2, 4);
print "\n$a $b";


print "\nFunction pass by references";
sub fun {
    my($ref_len, $ref_list) = @_;
    my $count;
    for ($count = 0; $count < $$ref_len; 
	  $$ref_list[$count++]--){  
    }
}

@list = (1, 2, 3, 4);
$len = @list;
print "\nBefore function call\n";
foreach $a (@list){
  print "$a ";
}

fun(\$len, \@list);

print "\nAfter function call\n";
foreach $x (@list){
  print "$x ";
}


# Pattern Matching 

print "\nPattern matching by regular expression\n";
$s = "Perl is good";
if ($s =~ /good/) {
   print "\nPattern found";
}  
else {
  print "\nPattern not found";
} 

print "\nRemembering matches";
if ("John Fitzgerald Kennedy" =~/(\w+) (\w+) (\w+)/) {
  print "\n$1, $2, $3";
}

print "\nSubstitutions";
$s = "Darcy is her name, yes, it's Darcy";
print "\n$s";
$s =~ s/Darcy/Darcie/;
print "\n$s";

print "\nTransliterate Operator";
$s = "abc";
print "\n$s";
$s =~ tr/a-z/A-Z/;
print "\n$s";

print "\nIP address validation";
$s = "192.168.2.1";
if ( $s =~ /^([0-9]{1,3}\.){3}[0-9]{1,3}$/ ) {
  print "\n$s is a valide ip address";
} else {
 print "\n$s is not a valide ip address";
}

print "\nDomain name validation";
$s = "www.wlu.ca";
if ( $s =~ /^([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,}$/ ) {
  print "\n$s is a valide domain name";
} else {
 print "\n$s is not a valide domain name";
}

print "\nDomain name validation";
$s = "www.wlu.ca";
if ( $s =~ /^([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,}$/ ) {
  print "\n$s is a valide domain name";
} else {
 print "\n$s is not a valide domain name";
}

print "\nEmail address validation";
$s = "abc\@wlu.ca";
if ( $s =~ /^[A-Za-z0-9._-]+@[[A-Za-z0-9.-]+$/ ) {
  print "\n$s is a valide email address";
} else {
  print "\n$s is not a valide email address";
}

print "\nURL validation";
$s = "https://bohr.wlu.ca";
if ( $s =~ /^(https?:\/\/|mailto:|s?ftp:\/\/)([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,}$/) {
  print "\n$s is a valide URL";
} else {
  print "\n$s is not a valide URL";
}


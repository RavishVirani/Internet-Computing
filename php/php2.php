<?php 

/*
Hand-on PHP
2. PHP features
*/

// user defined function
// pass by value
function sum($a, $b) {
    return $a+$b;
 }

 $a=2;
 $b=3;
 print "\n$a + $b =".sum(2, 3);   

 // pass by value
function inc(&$param) {
   $param++;
}
inc($a);       
print("\n".$a);   

 // pass by value
 function inc_global() {
    global $a;
    $a++;
 }
 inc_global($a);      
 print("\ngloable: ".$a);      
 
function inc_static() {
    static $b = 0;
    $b++;
    print("\nstatic: ".$b); 
}

inc_static(); 
inc_static(); 
print("\n");

// pass array to a funciton
function average($array){
    $total = 0;
    foreach($array as $value){
      $total += $value;
    }
    return $total/count($array);
}
$scores = array(1,2,3,4,5);
print_r($scores);
print "\nAverage=".average($scores);

// pass array reference
function inca(&$array){
    foreach($array as $key=>$value){
       $array[$key] = $value + 1;
    }
}
inca($scores);
print_r($scores);

// return array
function get_array($n) {
    $r = array();
    for ($i=0; $i<$n; $i++) {
        $r[$i] = $i + 1; 
    }
    return $r;
}
$ar =  get_array(10); 
print_r($ar);




// file directory opreations
function FileTest($f) {
    if (!file_exists( $f)) {
        echo "\n$f does not exist";
        return;
    }
    echo "\n$f is ".(is_file($f)?"":"not ")."a file";
    echo "\n$f is ".(is_dir($f)?"":"not ")."a directory";
    echo "\n$f is ".(is_readable($f)?"":"not ")."readable";
    echo "\n$f is ".(is_writable($f)?"":"not ")."writable";
    echo "\n$f is ".(is_executable($f)?"":"not ")."executable";
    echo "\n$f is ".(filesize($f))." bytes";
    echo "\n$f was accessed on ".date( "D d M Y g:i A",fileatime($f))."";
    echo "\n$f was modified on ".date( "D d M Y g:i A",filemtime($f))."";
    echo "\n$f was changed on ".date( "D d M Y g:i A",filectime($f) )."";
 }
 
 $file = "test.txt";
 FileTest($file);
 
 touch("test1.txt");
 FileTest("test1.txt");
 unlink("test1.txt");
 FileTest("test1.txt");
 
 echo "\nRead file by gets()\n";
 $filename = "test.txt";
 $fp = fopen($filename, "r") or die("Couldn't open $filename");
 while (!feof($fp)) {
     $line = fgets($fp, 1024);
     echo "$line";
 }
 
 
 echo "\nRead files with fread()\n";
 
 $filename = "test.txt";
 $fp = fopen($filename, "r") or die("Couldn't open $filename");
 while (!feof($fp)) {
     $chunk = fread($fp, 16);
     echo "$chunk<br>";
 }
 
 echo "\nRead files with fgetc()\n";
 $filename = "test.txt";
 $fp = fopen($filename, "r") or die("Couldn't open $filename");
 while (!feof($fp)) {
     $char = fgetc($fp);
     echo $char;
 }
 
 echo "\nUse fseek() to move around a file\n";
 $filename = "test.txt";
 $fp = fopen($filename, "r") or die("Couldn't open $filename");
 $fsize = filesize($filename);
 $halfway = (int)($fsize / 2);
 echo "Halfway point: $halfway\n";
 fseek($fp, $halfway);
 $chunk = fread($fp, ($fsize - $halfway));
 echo $chunk;
 
 
 echo "\nWrite a file Use fwrite() and fput()\n";
 $filename = "test1.txt";
 echo "<p>Writing to $filename.</p>";
 $fp = fopen($filename, "w") or die("Couldn't open $filename");
 fwrite($fp, "Hello world\n");
 fclose($fp);
 echo "\nAppending to $filename \n";
 $fp = fopen($filename, "a") or die("Couldn't open $filename");
 flock($fp, LOCK_EX);
 fputs($fp, "And another thing\n");
 flock($fp,3);
 fclose($fp);
 
 
 echo "\nList the contents of a dirctory\n";
 $dirname = ".";
 $dh = opendir($dirname) or die("couldn't open directory");
 while (!(($file = readdir($dh)) === false ) ) {
     if (is_dir("$dirname/$file")) {
         echo "(D) ";
     }
     echo "$file\n";
 }
 closedir($dh);
 
 
 $dirname = "./upload";
 rmdir($dirname);  // delete a directory
 mkdir($dirname,0711); 
 chmod($dirname,0777);
 mkdir($dirname."/testdir",0711);
 chmod($dirname."/testdir",0777);
 touch($dirname."/testdir"."/test1.txt");
 chmod($dirname."/testdir"."/test1.txt",0777);
 exec("ls -al upload", $output, $return);
 echo $return;
 foreach ($output as $key=>$file) {
     echo "$key, $file \n";
 }
 


// read and process XML document
echo "=============XML============\n";
$xml_obj = simplexml_load_file("../xml/planes.xml");
//print_r($xml_obj);
foreach ($xml_obj->ad as $item) {
    foreach ($item as $key=>$value) {
       echo $key.":".$value."\n"; 
    }
}
echo "============XML=============\n";


// read and process JSON document
echo "===========JSON==========\n";
$json_ojb = json_decode(file_get_contents("../json/book.json"), true);
$book_array = $json_ojb['books']['book'];
foreach ($book_array as $value) {
    foreach ($value as $key=>$value1) 
       echo $key.":".$value1."\n"; 
}
echo "============JSON=============\n";


 
 // Pattern matching
 echo "\nPattern matching\n";
 
 $str = "PHP is the web scripting language of choice.";
 if (preg_match ("/php/i", $str)) {
     print "\nA match was found.";
 } else {
     print "\nA match was not found.";
 }
 
 if (preg_match ("/\bweb\b/i", "PHP is the web scripting language of choice.")) {
     print "\nA match was found.";
 } else {
     print "\nA match was not found.";
 }
 
 if (preg_match ("/\bweb\b/i", "PHP is the website scripting language of choice.")) {
     print "\nA match was found.";
 } else {
     print "\nA match was not found.";
 }
 
 echo "\nget host name from URL\n";
 
 preg_match("/^(http:\/\/)?([^\/]+)/i", "http://www.php.net/index.html", $matches);
 $host = $matches[2];
 // get last two segments of host name
 preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
 echo "\ndomain name is: {$matches[0]}\n";
 
 
 echo "\npreg_split() example : Get the parts of a search string\n";
 
 $str = "hypertext language, programming";
 $keywords = preg_split ("/[\s,]+/", $str);
 
 foreach ($keywords as $word) {
   echo "$word <br>";
 }
 
 $str = 'string';
 $chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
 print_r($chars);
 
 $str = 'hypertext language programming';
 $chars = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
 print_r($chars);
 
 
 // Time 
 
 echo "\nuse getdate()\n";
 
 $date_array = getdate();
 print_r($date_array);
 echo "\nToday's date: ".$date_array['mday']."/".$date_array['mon']."/".
     $date_array['year']."<p>";
 
 echo "\nUse time() and date()\n";
 $time = time();
 echo "\nThe current unix time is ".$time." seconds.";
 echo date("m/d/y G.i:s", $time);
 echo "\n";
 echo "Today is ";
 echo date("j of F Y, \a\\t g.i a", $time);
 echo "\n";
 echo date("j of F Y, \a\\t g.i a");
 echo "\n";
 
 
 echo "\nUse mktime()\n";
 $ts = mktime(4, 15, 0, 8, 23, 2003);
 echo date("m/d/y G.i:s<br>", $ts);
 echo "/n";
 echo "The date is ";
 echo date("j of F Y, \a\\t g.i a", $ts );
 

// OOP with PHP
class myCar {
    var $color = "silver";
    var $make = "Mazda";
    var $model = "Protege5";
    function getModel() {
        return $this->model;
     } 
 }
 $car = new myCar();

print "\n\$car is a ".gettype($car)." ";
print "\n".$car->color." ".$car->make." ".$car->model; 
print "\nmodel:".$car->getModel(); 

$car->color = "red";
$car->make = "Porsche";
$car->model = "Boxter";
print "\n".$car->color." ".$car->make." ".$car->model; 
print "\nmodel:".$car->getModel(); 


class myClass {
    var $name = "Matt";
    function myClass($n) {
         $this->name = $n;
    }
    function sayHello() {
         echo "\nHello, my name is ".$this->name;
    }
 }
 
 class childClass extends myClass {
      function sayHello() {
           echo "\nHello";
      }
 }

 $object1 = new myClass("Joe Matt");
 $object1->sayHello();
 $object2 = new childClass("Joe Matt");
 $object2->sayHello();

 
// Exception
// The basic structure of exception handling
print "\n";
try {
   throw new Exception("An error has occurred", 42);
}
catch (Exception $e) {
  echo "Exception".$e->getFile()." on line ".$e->getLine().'<br>';
}

// User-defined exception class
class myException extends Exception {
    function _toString(){
        return "<table boder><tr><td><strong> Exception ".$this->getMessage()."<br>
     in".$this->getFile()." on line ".$this->getLine()."</td></tr></table>";
    }
}
 
print "\n";
try {
    throw new myException("An error has happened", 42);
}
catch (myException $m) {
    echo $m;
}


?>
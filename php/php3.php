<?php 

// system call to execute programs
$handle = popen("ls", "r");
while (!feof($handle)){
     $line = fgets($handle, 1024);
     echo "$line /n";
 }
 pclose($handle);


 exec("ls", $output, $value);
 echo $value; 
 print_r($output);
 foreach($output as $f) {
    echo "$f /n";
 }
 
system("ls", $value);
echo $value;


// PHP MySQL basic operations
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";

$sql = "CREATE DATABASE cp476";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();

// create a table
$dbname = "cp476";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";

$sql = "CREATE TABLE phonebook (Name char(50), Phone char(15))";
if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// insert a record
$sql = "INSERT INTO phonebook values ('HBF', '884-0710')";
if ($conn->query($sql) === TRUE) {
  echo "Insert successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();

// retrieve data from DB table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";

$sql = "SELECT * FROM phonebook";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "name: " . $row["Name"]. ", phone: " . $row["Phone"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();


// PHP HTTP client

//create an HTTP request
$req = "GET /cp476/index.html HTTP/1.1\r\n";
$req .= "Host: localhost\r\n";
$req .= "Connection: Close\r\n\r\n";

// open TCP connection and make HTTP request
$http = fsockopen("localhost", 80);
fputs($http, $req);
while(!feof($http)) {
    echo fgets($http, 1024);
}
fclose($http); // Close the connection


// use fopen to open and read remote web document file
$page = "http://localhost/cp476/index.html";
$fp = fopen($page, "r" ) or die("couldn't open $page");
while (!feof($fp)){
  print fgets($fp, 1024);
}
fclose($fp);

// Check the status of a page
$to_check = array("localhost"=>"/cp476/index.html");
foreach ($to_check as $host=>$page ){
    $fp = fsockopen($host, 80, $errno, $errdesc, 20);
    print "Trying $host<BR>\n";
    if ( !$fp ) {
        print "Couldn't connect to $host:\n<br>Error: $errno\n<br>Desc:$errdesc\n";
        print "<br><hr><br>\n";
        continue;
    }
    print "Trying to get $page<br>\n";
    fputs( $fp, "HEAD $page HTTP/1.0\r\n\r\n" );
    print fgets( $fp, 1024);
    print "<br><br><br>\n";
    fclose( $fp );
}

// Retrieve a page using fsockopen

$host = "localhost";
$page = "/cp476/index.html";
$fp = fsockopen($host, 80, $errno, $errdesc);
if (!$fp) die ("Couldn't connect to $host:\nError: $errno\nDesc: $errdesc\n" );
$request = "GET $page HTTP/1.0\r\n";
$request .= "Host: $host\r\n";
$request .= "Referer: http://www.java2s.com/index.htm\r\n";
$request .= "User-Agent: PHP test client\r\n\r\n";
$page = array();
fputs ($fp, $request);
while (!feof($fp)) {
   $page[] = fgets($fp,1024);
}
fclose( $fp );
print "The server returned ".(count($page))." lines!\n";
for ($i = 0; $i<count($page); $i++) {
    echo $page[$i];
}


?>
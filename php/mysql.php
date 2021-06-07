<?php 

// PHP MySQL basic operations

// Default MySQL connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cp476";


// MySQL sever connection 

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$conn->close();


//  creare a database

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "CREATE DATABASE ".$dbname;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error: " . $conn->error;
}
$conn->close();


// create a table

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name char(50), 
    role TINYINT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error: " . $conn->error;
}
$conn->close();


// insert a record

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "INSERT INTO users values (1, 'admin', 1)";
if ($conn->query($sql) === TRUE) {
  echo "\nInsert successfully";
} else {
  echo "\nError: " . $conn->error;
}
$sql = "INSERT INTO users values ('', 'guest', 3)";
if ($conn->query($sql) === TRUE) {
  echo "\nInsert successfully";
} else {
  echo "\nError: " . $conn->error;
}
$conn->close();


// retrieve data from table

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "\nname:" . $row["name"].", role:". $row["role"];
  }
} else {
  echo "0 results";
}
$conn->close();


// Update data

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "UPDATE users SET role=4 WHERE name='guest'";
if ($conn->query($sql) === TRUE) {
    echo "\nUpdate successfully";
  } else {
    echo "\nError: " . $conn->error;
  }

$sql = "SELECT role FROM users WHERE name='guest'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "\nrole:". $row["role"];
  }
} else {
  echo "0 results";
}
$conn->close();


// Delete data

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "DELETE FROM users WHERE name='guest'";
if ($conn->query($sql) === TRUE) {
    echo "\nDelete successfully";
  } else {
    echo "\nError: " . $conn->error;
  }
$conn->close();



// prepared SQL 
// refer to https://www.w3schools.com/php/php_mysql_prepared_statements.asp

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$stmt = $conn->prepare("INSERT INTO users (name, role) VALUES (?, ?)");
$stmt->bind_param("si", $name, $role);
// About argument "si",  s - string, i - integer,  d - double, b - BLOB 

// set parameter and execute
$name = "john";
$role = "2";
$stmt->execute();

// set another parameter and execute
$name = "me";
$role = "2";
$stmt->execute();

$stmt->close();
$conn->close();


// select with prepared SQL

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$stmt = $conn->prepare("SELECT role FROM users WHERE name=?");
$stmt->bind_param("s", $name);

// set parameter and execute
$name = "john";
$stmt->execute();
$result = $stmt->get_result();  // get the mysqli result
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "\nrole:" . $row["role"];
    }
} else {
echo "0 results";
}
$stmt->close();
$conn->close();

 
// Drop a table 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "DROP TABLE if exists users";
if ($conn->query($sql) === TRUE) {
  echo "Drop table successfully";
} else {
  echo "Error: " . $conn->error;
}
$conn->close();


// Drop a database

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
else echo "Connected successfully";
$sql = "DROP DATABASE IF EXISTS cp476";
if ($conn->query($sql) === TRUE) {
  echo "Drop drop successfully";
} else {
  echo "Error: " . $conn->error;
}
$conn->close();




// Ctate

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE cp476";
$conn->query($sql);

$conn->select_db("cp476");
$sql = "CREATE TABLE guestbook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name char(50), 
    email char(50), 
    coomment char(160)
)";
$conn->query($sql);

$conn->close();

?>
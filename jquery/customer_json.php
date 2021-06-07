<?php

$cID = $_POST['cid'];
$sql = "Select * from Customers where CustomerId=".$cID;	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cp476";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$result = $conn->query($sql);
$conn->close();


$data = array();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data['name'] = $row['Name'];
}
echo json_encode($data);

?>
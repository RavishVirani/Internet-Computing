<?php

	$cID = $_GET['cid'];
	$sql = "Select * from Customers where CustomerId=".$cID;	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cp476";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$result = $conn->query($sql);
	$conn->close();

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		header('Content-type: text/xml');
		echo '<?xml version="1.0" encoding="utf-8"?>';
		echo "<customer>";
		echo "<name>".$row['Name']."</name>";
		echo "</customer>";

	}

?>

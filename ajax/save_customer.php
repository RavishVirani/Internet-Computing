<?php

    header("Content-Type: text/plain");

    //get information
    $sName = $_POST["txtName"];
    $sAddress = $_POST["txtAddress"];
    $sCity = $_POST["txtCity"];
    $sState = $_POST["txtState"];
    $sZipCode = $_POST["txtZipCode"];
    $sPhone = $_POST["txtPhone"];
    $sEmail = $_POST["txtEmail"];
    
    //create the SQL query string
    $sql = "Insert into Customers(Name,Address,City,State,Zip,Phone,`Email`) ".
              " values ('$sName','$sAddress','$sCity','$sState', '$sZipCode'".
              ", '$sPhone', '$sEmail')";

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cp476";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
  
    $result = $conn->query($sql);
    if ($result === TRUE) {
        $last_id = $conn->insert_id;
        echo "Insert successfully. Last inserted ID is: " . $last_id;
    } else {
    echo "Error creating database: " . $conn->error;
    }
    $conn->close();
?>
<?php

    header("Content-Type: text/plain");
    
    //customer ID
    $sID = $_GET["id"];
    
    //variable to hold customer info
    $sInfo = "";
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cp476";

    //create the SQL query string
    $sql = "Select * from Customers where CustomerId=".$sID;
              

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sInfo = $row['Name']."<br />".$row['Address']."<br />".
            $row['City']."<br />".$row['State']."<br />".
            $row['Zip']."<br /><br />Phone: ".$row['Phone']."<br />".
            "<a href=\"mailto:".$row['Email']."\">".$row['Email']."</a>";
        }
    } else {
        echo  "Customer with ID $sID doesn't exist.";
    }
    $conn->close();
    echo $sInfo;
?>


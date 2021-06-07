<?php

    header("Content-Type: text/plain");
    
    //customer ID
    $sID = 0; // $_GET["id"];
    

    //variable to hold customer info
    $sInfo = "";
    

    //database information
    $sDBServer = "10.10.86.124";
    $sDBName = "cp476";
    $sDBUsername = "cp476";
    $sDBPassword = "Cp476_2017";

    //create the SQL query string
    $sQuery = "Select * from Customers where CustomerId=".$sID;
              
    //make the database connection
    //$oLink = mysqli_connect($sDBServer,$sDBUsername,$sDBPassword);

    $oLink = mysqli_connect("localhost", "cp476", "Cp476_2017");

    mysqli_select_db($oLink, $sDBName) or $sInfo = "Unable to open database";
        
    if($sInfo == '') {
        if($oResult = mysqli_query($oLink, $sQuery) and mysqli_num_rows($oResult) > 0) {
            $aValues = mysqli_fetch_array($oResult);
            $sInfo = $aValues['Name']."<br />".$aValues['Address']."<br />".
                     $aValues['City']."<br />".$aValues['State']."<br />".
                     $aValues['Zip']."<br /><br />Phone: ".$aValues['Phone']."<br />".
                     "<a href=\"mailto:".$aValues['E-mail']."\">".$aValues['E-mail']."</a>";
        } else {
            $sInfo = "Customer with ID $sID doesn't exist.";
        }
    }
    

    mysqli_free_result($oResult);    
    mysqli_close($oLink);

    echo $sInfo;
?>


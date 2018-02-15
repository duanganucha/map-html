<?php   
     header('Content-Type:application/json');
     $objConnect = mysqli_connect("localhost","root","","google_maps") or die("Error Connect to Database");

    mysql_query("SET NAMES 'utf8'");
    
    
    
    $strSQL = "SELECT * FROM table_location";
    $objQuery = mysqli_query($objConnect,$strSQL);
    $resultArray = array();
    while($obResult = mysqli_fetch_assoc($objQuery)){
        array_push($resultArray,$obResult);
    }


    echo json_encode($resultArray);


?>
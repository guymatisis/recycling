<?php

require('db_connect.php');
$lat = $_POST['lat'];
$long = $_POST['long'];
$userID = $_POST['userID'];

 $insert_Query = "INSERT INTO `bin_location_suggestions`
(latitude,longitude,User_ID) 
VALUES 
('$lat','$long',$userID)";

try{
    $insert_Result = mysqli_query($conn, $insert_Query);
    
    if($insert_Result)
    {

        if(mysqli_affected_rows($conn) > 0)
        {
            echo 'Data Inserted';
        }else{
            echo 'Data Not Inserted';
        }
    }
} catch (Exception $ex) {
    echo 'Error Insert '.$ex->getMessage();
}


?>
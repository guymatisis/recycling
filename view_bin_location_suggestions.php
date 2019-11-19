<?php
require('db_connect.php');
 echo "<h1>Bin Location Suggestions</h1>";

 
$search_Query = "SELECT * FROM bin_location_suggestions";
$search_Result = mysqli_query($conn, $search_Query);
if($search_Result)
{
    if(mysqli_num_rows($search_Result))
    {
        $rows = $search_Result->num_rows;
        $user_id = array();
        $long = array();
        $lat = array();
        while($row = mysqli_fetch_array($search_Result))
        {

            $user_id[]= $row['User_ID'];
            $long[] = $row['longitude'];
            $lat[]= $row['latitude'];
        }
        $arr = array($user_id,$long,$lat);

        echo "<table>
        <tr>
        <th>User ID</th>
        <th>Longitude</th>
        <th>Latitude</th>
        </tr>";
        for ($i=0; $i<$rows; $i++)
        {
            echo '<tr>';
            for ($j=0; $j<3; $j++)
            {
                echo '<td>'.$arr[$j][$i].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';


        
    }else
    {
    echo 'Result Error';
    }
}else
{
    echo 'NO NOTIFICATIONS';
}



?>


<!DOCTYPE Html>
<html>
    <head>
    </head>
    <body>
        
       
        
    </body>
</html>


<?php
require('db_connect.php');
 echo "<h1>Full Bins</h1>";

 
$search_Query = "SELECT * FROM Bin_Notifications";
$search_Result = mysqli_query($conn, $search_Query);
if($search_Result)
{
    if(mysqli_num_rows($search_Result))
    {
        $rows = $search_Result->num_rows;
        $bins = array();
        $dates = array();
        $users = array();
        while($row = mysqli_fetch_array($search_Result))
        {
            $bins[]= $row['Bin_ID'];
            $dates[] = $row['Date'];
            $users[]= $row['User_ID'];
        }
        $arr = array($bins,$dates,$users);

        echo "<table>
        <tr>
        <th>User ID</th>
        <th>DATE</th>
        <th>Bin ID</th>
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


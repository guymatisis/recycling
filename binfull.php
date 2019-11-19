
<?php
require('db_connect.php');
$date =  date("Y-m-d");
$bin_ID = $_POST['bin_ID'];
$user_ID = $_POST['user_ID'];


#need to send bin ID and User ID
$sql = "Insert Into Bin_Notifications (Bin_ID,Date,User_ID) values($bin_ID,STR_TO_DATE('$date', '%Y-%m-%d'),$user_ID)";

if ($conn->query($sql) === TRUE) {
    echo "<p>New record created successfully</p>>";
}
echo "<p> hi there</p>";

?>

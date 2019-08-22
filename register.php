<?php
require('db_connect.php');
$user_name = $_GET['uname'];
$password = $_GET['psw'];
$password_repeat = $_GET['psw-repeat'];

if($password !== $password_repeat)
{
    echo "passwords dont match!";
}

echo $user_name;
echo $password;
$sql = "SELECT * FROM registered_users where user_name = '$user_name'";
$result = $conn->query($sql);
$count  = $result->num_rows;
if(count>0)
{
    echo "USER NAME ALREADY IN USE";
}
else{
    $sql = "Insert Into registered_users (user_name,password) values('$user_name','$password')";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}   else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT * FROM registered_users where user_name = '$user_name'";
    $result = $conn->query($sql);
    $count  = $result->num_rows;
    if($count==0) {
	    $message = "UNABLE TO REGISTER USER";
    } else {
	    $message = "USER REGISTERED!!!!";
    }
    echo $message;
}

?> 

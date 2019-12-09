<?php
require('db_connect.php');
$user_name = $password = $bad_entry = $password_repeat = "";
$count = 0;
$message = "";
if (isset($GET['value']))
{
  $user_name = $_GET['uname'];
  $password = $_GET['psw'];
  $password_repeat= $_GET['psw-repeat'];
  // Instructions if $_POST['value'] exist
}
if($password == $password_repeat)
{
  echo $user_name; 
if ($user_name != ""){ 
 
$sql = "SELECT * FROM registered_users where user_name = '$user_name'";
$result = $conn->query($sql);
$count  = (int)$result->num_rows;
echo "count";
echo $count;
if($count>0)
{
   $message=  "USER NAME ALREADY IN USE";
}
else{
    $sql = "Insert Into registered_users (user_name,password) values('$user_name','$password')";
    if ($conn->query($sql) === TRUE) {
     }   else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT * FROM registered_users where user_name = '$user_name'";
    $result = $conn->query($sql);
    $count  = $result->num_rows;
    if($count==0) {
	    $message = "UNABLE TO REGISTER USER";
    } else {
       header('location: user_main.php?current_user='.$user_name); 
    }
}
}
}else
{
    $message = "Passwords Do Not Match";
}
?> 


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}
* {
  box-sizing: border-box;
}
/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.registerbtn:hover {
  opacity: 1;
}
/* Add a blue text color to links */
a {
  color: dodgerblue;
}
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<p style ="text-align: center; color:red;font-size:25px; "><?php echo $message;?></p>
<form action="/recycling-master/index.html">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="uname"><b>User Name</b></label>
    <input type="text" placeholder="Enter User Name" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>
    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="containesignin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
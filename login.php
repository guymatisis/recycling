<?php

require('db_connect.php');

if (isset($_GET['uname'])) {
$user_name = $_GET['uname'];
$password = $_GET['psw'];
$bad_entry= $_GET['bad_entry'];

echo $user_name; 
echo $password;
echo $bad_entry;
$sql = "SELECT * FROM registered_users where user_name = '$user_name' and password = '$password'";
$result = $conn->query($sql);
$count  = $result->num_rows;

if($count==0) { // EMPLOYEES

	$sql = "SELECT * FROM Employees where user_name='$user_name' and Password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count  = $result->num_rows;
   
    if($count ==0)
    {
         $bad_entry = "true";
        $message = "***COULDNT FIND USERNAME OR PASSWORD***";
    }
    else
    { 
    
        $row = mysqli_fetch_array($result);
        if ($row['Admin'] == 1){
            header('Location: user_main.php?current_user=' .$user_name);
        }
        if ($row['Admin'] == 2){
            header('Location: super_user_main.php?current_user=' .$user_name);
        }
           if ($row['Admin'] == 3){
            header('Location: admin_main.php?current_user=' .$user_name);
        }
        if ($row['Admin'] == 4){
            header('Location: super_admin_main.php?current_user=' .$user_name);
        }
        $bad_entry = "false";
        
    }
  } else { // REGULAR USERS

        header('Location: user_main.php?current_user=' .$user_name);
        

	$userID = $result['User_ID'];
	}
  }


?> 





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<p id ="error_message" style = "color:red; font-weight:bold;text-align:center;" ><?php echo $message?></p>

<h2>Login Form</h2>

<form action="/gis/login.php">
  <div class="container">
    <label for="uname" ><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw" ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     <input type='hidden' name='bad_entry' value='true' />
    <button type="submit">Login</button>
    
  </div>
</form>

</body>
</html>

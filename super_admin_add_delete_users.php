<?php

require('db_connect.php');

$current_user = $_GET['current_user'];
$action_str = "super_admin_page.php?current_user=".$current_user;
// get values from the form
function getPosts()
{

    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['fname'];
    $posts[2] = $_POST['lname'];
    $posts[3] = $_POST['DOB'];
    $posts[4] = $_POST['password'];
    $posts[6] = $_POST['email']; 
    $posts[8] = $_POST['apt_num'];
    $posts[9] = $_POST['street_num'];
    $posts[10] = $_POST['street_name'];
    $posts[11] = $_POST['city'];
    $posts[12] = $_POST['phone'];
    $posts[13] = $_POST['current_user'];
    $posts[14] = $_POST['user_name'];
    $posts[15] = $_POST['admin'];
    return $posts;
}
  $data = getPosts();

// Search
if(isset($_POST['search']))
{
    
    if(empty($data[0]))
    {
        $IDErr = "*ID is required";
        $gen_err_message = "Please fill required fields";
    }
    else{

        $search_Query = "SELECT * FROM Employees WHERE Employee_ID = $data[0]";
        
        $search_Result = mysqli_query($conn, $search_Query);
        
        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
                while($row = mysqli_fetch_array($search_Result))
                {
                
                    $id = $row['Employee_ID'];
                    $fname = $row['First_Name'];
                    $lname = $row['Last_Name'];
                    $phone = $row['Phone_Number'];
                    $DOB = $row['DOB'];
                    $address = $row['Address_ID'];
                    $password = $row['Password'];
                    $email = $row['Email'];
                    $user_name = $row['user_name'];
                    $city = $row['Muni_ID'];
                    $admin = $row['Admin'];

                    
                    $search_Query = "SELECT * FROM Address WHERE Address_ID = $address";
                    $search_Result = mysqli_query($conn, $search_Query);
                        if($search_Result)
                        {
                            if(mysqli_num_rows($search_Result))
                            {
                                while($row = mysqli_fetch_array($search_Result))
                                {
                                    $street_name = $row['Street'];
                                    $street_num = $row['Number'];
                                    $apt_num = $row['Apt_Num'];
                                    
                                }
                            }
                        }
                      
                       }
            }else{
                echo 'No Data For This Id';
            }
        }else{
            echo 'Result Error';
        }
    }
}


// Insert
if(isset($_POST['insert']))
{

   
   $fields_incomplete = False;
    
   
   
    if(empty($data[1]))
    {
    $fnameErr = "*First name is required";
     $fields_incomplete = True;
    }
    if(empty($data[2]))
    {
    $lnameErr = "*Last Name is required";
    $fields_incomplete = True;

    }
     if(empty($data[3]))
    {
    $DOBErr = "*Date of birth is required";
    $fields_incomplete = True;

    }
     if(empty($data[4]))
    {
    $password_Err = "*Password is required";
    $fields_incomplete = True;

    }
   
     if(empty($data[6]))
    {
    $email_Err = "*Email is required";
    $fields_incomplete = True;

    }
    
      if(empty($data[8]))
    {
    $apt_num_Err = "*Apt number is required";
    $fields_incomplete = True;

    }
      if(empty($data[9]))
    {
    $street_num_Err = "*Street number is required";
    $fields_incomplete = True;

    }
      if(empty($data[10]))
    {
    $street_name_Err = "*Street name is required";
    $fields_incomplete = True;

    }
      if(empty($data[11]))
    {
        $phone_Err = "*Municipality ID is required";
        $fields_incomplete = True;
    }
     if(empty($data[12]))
    {
    $phone_Err = "*Phone number is required";
    $fields_incomplete = True;
    }
         if(empty($data[14]))
    {
    $user_name_Err = "*User name is required";
    $fields_incomplete = True;
    }
           if(empty($data[15]))
    {
    $user_name_Err = "*Admin status is required";
    $fields_incomplete = True;
    }
   
    if (!$fields_incomplete)
    {
        $insert_Query = "INSERT INTO Address (Street,Number,Apt_Num)  VALUES ('$data[10]',$data[9],$data[8])";
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
        
     
       $insert_Query = "INSERT INTO `Employees`
        (First_Name, Last_Name,Phone_Number,DOB,Address_ID,Password,Email,Admin,User_Name,Muni_ID,Admin) 
        VALUES 
        ('$data[1]','$data[2]','$data[12]',STR_TO_DATE('$data[3]', '%Y-%m-%d'),LAST_INSERT_ID(),'$data[4]','$data[6]',1,'$data[14]', $data[11], $data[15])";
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
    }
    else
    {
    $gen_err_message = "Please fill required fields";
    }
 //*/   
}
 
// Delete
if(isset($_POST['delete']))
{
     if(empty($data[0]))
    {
    $IDErr = "*ID is required";
    $gen_err_message = "Please fill required fields";
    }
    else
    {

        $delete_Query = "DELETE FROM Employees WHERE Employee_ID = $data[0]";
        try{
            $delete_Result = mysqli_query($conn, $delete_Query);
            
            if($delete_Result)
            {
                if(mysqli_affected_rows($conn) > 0)
                {
                    echo 'Data Deleted';
                }else{
                    echo 'Data Not Deleted';
                }
            }
        } catch (Exception $ex) {
            echo 'Error Delete '.$ex->getMessage();
        }
    }
}
?>


<!DOCTYPE Html>
<html>
    <head>
       <h1>EMPLOYEE DATABASE</h1>
        <p><?php echo $gen_err_message;?></p>
    </head>
    <body>
   
        <form action="<?=$action_str?>" method="post">
            
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>">
            <span class="error"> <?php echo $IDErr;?></span><br><br>
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>">
            <span class="error"> <?php echo $fnameErr;?></span><br><br>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>">
            <span class="error"> <?php echo $lnameErr;?></span><br><br>
            <input type="date" name="DOB" placeholder="Last Name" value="<?php echo $DOB;?>">
            <span class="error"> <?php echo $DOBErr;?></span><br><br>
            <input type="number" name="apt_num" placeholder="appartment number" value="<?php echo $apt_num;?>">
            <span class="error"> <?php echo $apt_num_Err;?></span><br><br>
            <input type="number" name="street_num" placeholder="street number" value="<?php echo $street_num;?>">
            <span class="error"> <?php echo $street_num_Err;?></span><br><br>
            <input type="text" name="street_name" placeholder="street name" value="<?php echo $street_name;?>">
            <span class="error"> <?php echo $street_name_Err;?></span><br><br>
            <input type="text" name="city" placeholder="Municipality ID" value="<?php echo $city;?>">
            <span class="error"> <?php echo $city_Err;?></span><br><br>
            <input type="text" name="password" placeholder="Password" value="<?php echo $password;?>">
            <span class="error"> <?php echo $password_Err;?></span><br><br>
            <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
            <span class="error"> <?php echo $email_Err;?></span><br><br>
            <input type="text" name="phone" placeholder="phone number" value="<?php echo $phone;?>">
            <span class="error"> <?php echo $phone_Err;?></span><br><br>
            <input type="text" name="user_name" placeholder="User Name" value="<?php echo $user_name;?>">
            <span class="error"> <?php echo $user_name_Err;?></span><br><br>
            <input type="number" name="admin" placeholder="Admin" value="<?php echo $admin;?>">
            <span class="error"> <?php echo $admin_Err;?></span><br><br>
            <input type="hidden" name="current_user" value="<?php echo $current_user;?>"  />
            <div>
            
               
                <input type="submit" name="insert" value="Add">
                <input type="submit" name="delete" value="Delete">
                <input type="submit" name="search" value="Find">
            </div>
        </form>
        
    </body>
</html>


<?php

require('db_connect.php');

$current_user = $_GET['current_user'];
$action_str = "super_admin_add_delete_muni.php?current_user=".$current_user;
// get values from the form
function getPosts()
{

    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['admin1'];
    $posts[2] = $_POST['admin2'];
    $posts[3] = $_POST['muni_name'];
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

        $search_Query = "SELECT * FROM Municipality WHERE Muni_ID = $data[0]";
        
        $search_Result = mysqli_query($conn, $search_Query);
        
        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
                while($row = mysqli_fetch_array($search_Result))
                {
                
                    $id = $row['Muni_ID'];
                    $admin1 = $row['Admin1_ID'];
                    $admin2 = $row['Admin2_ID'];
                    $muni_name = $row['Name'];
                      
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
    if(empty($data[0]))
    {
    $IDErr = "*Muni Id Required";
    $fields_incomplete = True;
    }
        if(empty($data[1]))
    {
    $admin1Err = "*Admin 1 ID Required";
    $fields_incomplete = True;
    }
        if(empty($data[2]))
    {
    $admin2Err = "*Admin 2 ID Required";
    $fields_incomplete = True;
    }

     if(empty($data[3]))
    {
    $muni_nameErr = "*Muni Name Required";
    $fields_incomplete = True;
    }
   
   
    if (!$fields_incomplete)
    {
        
       $insert_Query = "INSERT INTO `Municipality`
        (Muni_ID,Admin1_ID,Admin2_ID,Name) 
        VALUES 
        ($data[0],$data[1],$data[2],'$data[3]')";
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
    $IDErr = "*Muni ID is required";
    $gen_err_message = "Please fill required fields";
    }
    else
    {

        $delete_Query = "DELETE FROM Municipality WHERE Muni_ID = $data[0]";
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
       <h1>MUNICIPALITY DATABASE</h1>
        <p><?php echo $gen_err_message;?></p>
    </head>
    <body>
   
        <form action="<?=$action_str?>" method="post">
            
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>">
            <span class="error"> <?php echo $IDErr;?></span><br><br>
            <input type="text" name="admin1" placeholder="Admin 1" value="<?php echo $admin1;?>">
            <span class="error"> <?php echo $admin1Err;?></span><br><br>
            <input type="text" name="admin2" placeholder="Admin 2" value="<?php echo $admin2;?>">
            <span class="error"> <?php echo $admin2Err;?></span><br><br>
            <input type="text" name="muni_name" placeholder="Municipality Name" value="<?php echo $muni_name;?>">
            <span class="error"> <?php echo $muni_nameErr;?></span><br><br>
            <div>
            
               
                <input type="submit" name="insert" value="Add">
                <input type="submit" name="delete" value="Delete">
                <input type="submit" name="search" value="Find">
            </div>
        </form>
        
    </body>
</html>


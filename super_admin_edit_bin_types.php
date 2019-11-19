<?php

require('db_connect.php');

$current_user = $_GET['current_user'];
$action_str = "super_admin_edit_bin_types.php?current_user=".$current_user;
// get values from the form
function getPosts()
{

    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['color'];
    $posts[2] = $_POST['size'];
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

        $search_Query = "SELECT * FROM Bin_Type where Bin_ID = $data[0]";
        $search_Result = mysqli_query($conn, $search_Query);
        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
                while($row = mysqli_fetch_array($search_Result))
                {
                
                    $id = $row['Bin_ID'];
                    $size = $row['Size'];
                    $color = $row['Color'];
                    

                }
            }else
            {
            echo 'Result Error';
            }
        }
    }
}


// Insert
if(isset($_POST['insert']))
{
   $fields_incomplete = False;
    
    if(empty($data[1]))
    {
    $colorErr = "*Color is required";
     $fields_incomplete = True;
    }

    if(empty($data[2]))
    {
    $sizeErr = "*Size is required";
    $fields_incomplete = True;
    }
    
   
    if (!$fields_incomplete)
    {        
     
       $insert_Query = "INSERT INTO Bin_Type
        (Color,Size) 
        VALUES 
        ('$data[1]',$data[2])";
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

        $delete_Query = "DELETE FROM Bin_Type WHERE Bin_ID = $data[0]";
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
       <h1>BIN TYPES</h1>
        <p><?php echo $gen_err_message;?></p>
    </head>
    <body>
        <form action="<?=$action_str?>" method="post">
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>">
            <span class="error"> <?php echo $IDErr;?></span><br><br>
            <input type="text" name="color" placeholder="Color" value="<?php echo $color;?>">
            <span class="error"> <?php echo $colorErr;?></span><br><br>
            <input type="text" name="size" placeholder="Size" value="<?php echo $size;?>">
            <span class="error"> <?php echo $sizeErr;?></span><br><br>
            <input type="hidden" name="current_user" value="<?php echo $current_user;?>"  />
            <div>
                <input type="submit" name="insert" value="Add">
                <input type="submit" name="delete" value="Delete">
                <input type="submit" name="search" value="Find">
            </div>
        </form>
        
    </body>
</html>


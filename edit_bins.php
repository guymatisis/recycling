<?php

require('db_connect.php');

$current_user = $_GET['current_user'];
$action_str = "edit_bins.php?current_user=".$current_user;
// get values from the form
function getPosts()
{

    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['color'];
    $posts[2] = $_POST['size'];
    $posts[3] = $_POST['long'];
    $posts[4] = $_POST['lat'];
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

        $search_Query = "SELECT * FROM Bins where Bin_ID = $data[0]";
        $search_Result = mysqli_query($conn, $search_Query);
        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
                while($row = mysqli_fetch_array($search_Result))
                {
                
                    $id = $row['Bin_ID'];
                    $long = $row['Longitude'];
                    $lat = $row['Latitude'];
                    $bin_type = $row['Bin_Type'];
                    

                }

                if($bin_type)
                {
                    $search_Query = "SELECT * FROM Bin_Type where Bin_ID = $bin_type";
                    $search_Result = mysqli_query($conn, $search_Query);
                    if($search_Result)
                    {
                        if(mysqli_num_rows($search_Result))
                        {
                            while($row = mysqli_fetch_array($search_Result))
                            {
                            
                                $color = $row['Color'];
                                $size = $row['Size'];

                            }
                        }
                    } 
                
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
    $longErr = "*Color is required";
     $fields_incomplete = True;
    }

    if(empty($data[2]))
    {
    $latErr = "*Size is required";
    $fields_incomplete = True;
    }
    
    if(empty($data[3]))
    {
    $colorErr = "*Longitude is required";
     $fields_incomplete = True;
    }

    if(empty($data[4]))
    {
    $sizeErr = "*Latitude is required";
    $fields_incomplete = True;
    }
    
   
    if (!$fields_incomplete)
    {        
     
        $search_Query = "SELECT * FROM Bin_Type where Color = '$data[1]' and Size = $data[2]";
        $search_Result = mysqli_query($conn, $search_Query);
        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
                while($row = mysqli_fetch_array($search_Result))
                {
                
                    $bin_type_id = $row['Bin_ID'];                 
                }
            }else
            {
                echo 'BIN TYPE DOES NOT EXIST!';
            }
        }






       $insert_Query = "INSERT INTO Bins (Longitude,Latitude,Muni_ID,Bin_Type) VALUES ($data[3],$data[4],1,$bin_type_id)";
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

        $delete_Query = "DELETE FROM Bins WHERE Bin_ID = $data[0]";
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
       <h1>Bins</h1>
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

            <input type="text" name="long" placeholder="Longitude" value="<?php echo $long;?>">
            <span class="error"> <?php echo $longErr;?></span><br><br>

            <input type="text" name="lat" placeholder="Latitude" value="<?php echo $lat;?>">
            <span class="error"> <?php echo $latErr;?></span><br><br>

            <input type="hidden" name="current_user" value="<?php echo $current_user;?>"  />
            <div>
            
               
                <input type="submit" name="insert" value="Add">
                <input type="submit" name="delete" value="Delete">
                <input type="submit" name="search" value="Find">
            </div>
        </form>
        
    </body>
</html>


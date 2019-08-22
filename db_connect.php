<?php
// Create connection
$servername = "localhost";
$username = "root";
$password = "matisis";
$db_name = "recycling";
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
} 
?>

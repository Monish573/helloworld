<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['Id'];
$sql="DELETE FROM task WHERE Id=$id";
$result=mysqli_query($conn,$sql) or die(mysqli_query());
 header('location:welcome.php');
?>
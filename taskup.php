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

    if(isset($_POST['update']))
    {
        
        $title=$_POST['Title'];
        $desc=$_POST['Description'];
        $ace=$_POST['Assignned'];
        $sql="UPDATE task set Title='".$title."', Description='".$desc."',Assignned='".$ace."'WHERE Id='".$id."' ";
        if ($conn->query($sql) === TRUE) 
        {
           header('location:welcome.php');
        }
              else 
           {
               echo "Error: " . $sql . "<br>" . $conn->error;
           }
   }
   $sql="SELECT * from task where Id='".$id."'"; 
	$result=mysqli_query($conn, $sql) or die(mysqli_error());
    $row=mysqli_fetch_assoc($result);
?>
<html>
<head>
<title> Updating Tasks </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<form action ="" method="post" encytype="multipart/form-data">
  <h2 class="display-1 alert-primary">Update-Task</h2>
<button type="button" class="btn btn-dark btn-block" 
  data-toggle="modal" data-target="#myModal">Add task</button>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add task</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            Titel: <input type="text" name="Title" value="<?php echo $row['Title']; ?>"/><br />
		    Description: <textarea rows="2" cols="20" name="Description" value=""/><?php echo $row['Description']; ?></textarea><br />
            Assignned: <input type="text" name="Assignned" value="<?php echo $row['Assignned']; ?>"/>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="update" value="update">Update</button>
        </div>
</div>
</div>
</div>  
</form>
</body>
</html>
<?php
session_start();
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


$row=$_SESSION['Id'];

$sql="SELECT * FROM myguest2 WHERE `Id`=$row";
$result=mysqli_query($conn, $sql);
$new=mysqli_fetch_row($result);
?>
<html>
<head>
<title> WELCOME PAGE </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {
  }
.heading
{ 
    width:50%;
    margin: auto;
    font-size: 20px;
    font-family: arial;
    color: burlywood;
    background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));


}
input
{
    padding: 1%;
}
.main
{
    border: 2pxs solid blueviolet;
    width: 50%;
    font-size: 10px;
    margin: auto;
    padding: 1%;
    border-radius: 20px;
    
}

.image
{
    float: left;
    width: 50%;
    padding: 3%;
    padding-left: 10%;
    font-size: 17px;
}
.input
{
    padding: 3%;
}

.btn-group
{
    margin: auto;
    width: 75%;
    padding: 3%;
}

</style>
</head>
<body>
<form action="" method ="POST" enctype="multipart/form-data">
<div class="main">
<div class="heading">WELCOME TO THE PAGE</div>
<br>
<h1 class="display-1 alert-success"><marquee behaviour="scroll" direction="up">->ProfileView<-</marquee></h1>
<div class="row">
<div class=col-sm-6>
<?php if($new["7"] != ""):?>
<img src="upload/<?php echo $new['7'];?>" class="rounded-circle" alt="Cinque Terre" style="width:250px; height:225px;"/>
<?php else: ?>
<img src="upload/<?php echo $new['7'];?>" class="rounded-circle" alt="Cinque Terre" style="width:250px; height:250px;"/>
<?php endif; ?>
</div>
<div class=col-sm-6>
<table class="table table-dark table-hover">
    <tbody>
      <tr>
        <td>NAME</td>
        <td><?php echo $new['1'];?></td>
      </tr>
      <tr>
        <td>DOB</td>
        <td><?php echo $new['2'];?></td>
      </tr>
      <tr>
        <td>EMAIL</td>
        <td><?php echo $new['3'];?></td>
      </tr>
      <tr>
      <td>GENDER</td>
      <td><?php echo $new['5'];?></td>
      </tr>
      <tr>
      <td>SUBJECT</td>
      <td><?php echo $new['6'];?></td>
      </tr>
      </tbody>
      </table>
      <div class="btn-group">
    <button type="button" class="btn btn-success"><a href='edit.php?Id=<?php echo $new["0"];?>'>Edit-Profile</a></button>
    <button type="button" class="btn btn-danger"><a href='logout.php'>Log-Out</a></button>
  </div> 
  </div>
  </div>
  </form>
</body>
</html>







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

if(isset($_POST['subm']))
{
    $title=$_POST['Title'];
    $desc=$_POST['Description'];
    $ace=$_POST['Assignned'];
    $sql1="INSERT INTO task (Title , Description ,Assignned) VALUES('$title', '$desc', '$ace')";
    if($conn->query($sql1)===TRUE)
    {
        echo "Insert record successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }
}    
?>
<html>
<head>
<title> Displaying Tasks </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
h2
{
  background-image: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
}
}
</style>
</head>
<body>
<form action ="" method="post" encytype="multipart/form-data">
  <h2 class="display-1 alert-primary">Rquired-Task</h2>
  <?php
  $sql="SELECT * FROM task";
        $result=$conn->query($sql);
        if($result->num_rows > 1)
        {   echo "<table width='550' border='2' align='center' bgcolor='antiquewhite'>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Title</th>";
            echo "<th>Description</th>";
            echo "<th>Assignned</th>";
            echo "<th>Delete</th>";
            echo "<th>Update</th>";
            echo "</tr>";
        while($row=$result->fetch_assoc())
        {
          echo "<tr>";
               echo "<td>".$row['Id']. "</td>";
               echo "<td>".$row['Title']. "</td>";
               echo "<td>".$row['Description']. "</td>";
               echo "<td>".$row['Assignned']. "</td>";?>
              <td> <button type="button" class="btn btn-info"><a href="delete.php?Id=<?php echo $row['Id'] ?>" >Delete</button></td>
              <td> <button type="button" class="btn btn-light"><a href="taskup.php?Id=<?php echo $row['Id'] ?>">Update</button></td>
               <?php  echo "</tr>";

        }
        echo "</table>";
      }
    else
    {
        echo "0 results";
    }
?>
  <button type="button" class="btn btn-dark btn-block" 
  data-toggle="modal" data-target="#myModal" class="botn">Add task</button>
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
            Titel: <input type="text" name="Title"><br />
		    Description: <textarea rows="2" cols="20" name="Description"></textarea><br />
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
            
            $result=mysqli_query($conn, "SELECT * FROM myguest2 order by Name asc");
         
            
            ?>
            <select name="Assignned" id="Assignned" style="width:50%;">
            <option>--Select--</option>
            <?php
            while ($row=mysqli_fetch_array($result)) {
        
            ?>
            <option><?php echo $row['Name']; ?></option>
            <?php } ?>
            </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="subm" value="submit">Submit</button>
        </div>
</div>
</div>
</div>  
</form>
</body>
</html> 
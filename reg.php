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
if(isset($_POST['save']))
{
    $name=$_POST['Name'];
    $dob=$_POST['Dob'];
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $gender=$_POST['Gender'];
    $a=$_POST['Subject'];
    $Subject=implode("," , $a);
    move_uploaded_file($_FILES["Image"]["tmp_name"],"upload/".$_FILES["Image"]["name"]);
    $location=($_FILES["Image"]["name"]);

    $sql="INSERT INTO MyGuest2(Name,Dob,Email,Password,Gender,Subject,Image)
    VALUES('$name','$dob','$email','$password','$gender','$Subject','$location')";

    if($conn->query($sql)===TRUE)
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
<body>
<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
</div>

</body>
</html>











<html>
<head>
<title> Registration Form </title>
<style>
body
{
  height: 100%;
  margin: 0;

  /* The image used */
  background-image: url("C:\xampp\htdocs\mk\upload\images.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.heading
{ 
    width:30%;
    margin: auto;
    font-size: 20px;
    font-family: arial;
    color: burlywood;


}
input
{
    padding: 1%;
}
.main
{
    border: 2pxs solid blueviolet;
    width: 40%;
    margin: auto;
    padding: 2%;
    border-radius: 20px;
}
.titles
{
    float: left;
    width: 50%;
    padding: 3%;
    padding-left: 10%;
    font-size: 17px;
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
.btn
{
    width: 50%;
    padding-left: 23%;
}
.botn
{
    background-color: yellowgreen;
    padding: 6%;
    border: 2px solid;
    border-radius: 10px;
    font-weight: bold;
    color: blue;
    width: 80%;

}
</style>
</head>
<body>
<form action="" method ="POST" enctype="multipart/form-data">
<div class="main">
<div class="heading">Registration Form</div>
<div class="titles">Name</div>
<div class="input"><input type ="text" name="Name" placeholder="Name"></div>

<div class="titles">DOB</div>
<div class="input"><input type ="date" name="Dob" placeholder="Date Of Birth"></div>

<div class="titles">Email</div>
<div class="input"><input type="text" name ="Email" placeholder="Email"></div>

<div class="titles">Password</div>
<div class="input"><input type="password" name="Password" ></div>

<div class="titles">Gender</div>
<div class="input">Male<input type="radio" name="Gender" value="male"/>Female<input type="radio" name="Gender" value="female"/></div>

<div class="titles">Subject</div>
<div class="input"><input type="checkbox" name="Subject[]" value="maths">Maths
 <input type="checkbox" name="Subject[]" value="hindi">Hindi
 <input type="checkbox" name="Subject[]" value="english">English</div>

 <div class="image">Upload Image<input type="file" name="Image" id="image" value="Upload Image"></div>

<div class="btn"><input type="submit" name="save" value="submit" class="botn"/>
<input type="reset" value="reset" class="botn"></div>
</div>
</form>
</body>
</html>
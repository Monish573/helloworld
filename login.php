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
$email="";
$password="";
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM myguest2 WHERE Email='$email' and Password='$password'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_row($result);
    print_r($row);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['Id']= $row[0];
        $_SESSION['success']="you are now logged in";
        header('location:welcome.php');
    }
        else
        {
echo "wrong email and password";
        }
    }
?>
<html>
<head>
<title>Log In Page</title>
<style>
h2
{
    margin:auto;
    width: 250%;
    font-size: 50px;
    color: blue;
}
.input
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
.title
{
    float: left;
    width: 70%;
    padding: 1%;
    padding-left: 25%;
    font-size: 25px;
}
.btn
{
    margin: auto;
    width: 25%;
    padding-right: 35%;
}
.botn
{
    background-color: red;
    padding: 6%;
    border: 2px solid;
    border-radius: 10px;
    font-weight: bold;
    color: blue;
    width: 80%;

}
marquee 
{
        width: 100%;
        padding: 10px 0;
        background-color: lightblue;
        direction: up;
}
.reg
{
    width: 75%;
    padding: 3%;

}



</style>
</head>
<body bgcolor="antiquewhite">
<form action= "" method="POST" enctype="multipart/form-data">
<div class="main">
<marquee behaviour="alternate" direction="right"><h2>Login-Here</h2></marquee>
<div class="title">
<lable>Email</label>
<div class="input"><input type="text" name="email" placeholder="Email" value="" ></div>
<div class="title">
<label>Password</label>
<div class="input"> <input type="password" name="password" value=""></div>
<div class="btn"><input type="submit" name="login" value="login" class="botn"></div>
<div class="reg">Not a Member Yet?<button><a href='reg.php'>Register-Here</a></button></div>
</div>
</form>
</body>
</html> 
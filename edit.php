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
$row=$_GET['Id'];
if(isset($_POST['update']))
{
    $name=$_POST['Name'];
    $dob=$_POST['Dob'];
    $email=$_POST['Email'];
    $gender=$_POST['Gender'];
    $b=$_POST['Subject'];
    $Subject=implode("," , $b);
    move_uploaded_file($_FILES["Image"]["tmp_name"],"upload/".$_FILES["Image"]["name"]);
    $location1=($_FILES["Image"]["name"]);
    if($location1 != "")
    {
        $sql="UPDATE myguest2 SET Name='".$name."', Dob='".$dob."', 
    Email='".$email."', Gender='".$gender."', Subject='".$Subject."', Image='".$location1."' WHERE Id='".$row."'";
    }
    else
    {
        $sql="UPDATE myguest2 SET Name='".$name."', Dob='".$dob."', 
    Email='".$email."', Gender='".$gender."', Subject='".$Subject."' WHERE Id='".$row."'";
    }

if ($conn->query($sql) === TRUE) 
    {
       header('location: welcome.php');
    }
          else 
       {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }

    }
    
    $sql="SELECT * from myguest2 where Id='".$row."'"; 
	$result=mysqli_query($conn, $sql) or die(mysqli_error());
    $new=mysqli_fetch_assoc($result);
?>
<html>
<head>
<title> Update Form </title>
<style>
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
    margin: auto;
    width: 30%;
    padding-right: 55%;
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
.res
{
    margin: auto;
    width: 30%;
    padding-bottom: 5%;
    padding-left: 30%;
}
.rst
{
    background-color: yellowgreen;
    padding: 6%;
    border: 2px solid;
    border-radius: 10px;
    font-weight: bold;
    color: blue;
    width: 80%;
}
.log
{
    margin: auto;
    width: 75%;
    padding: 3%;
}
</style>
</head>
<body bgcolor="antiquewhite">
<form action="" method ="POST" enctype="multipart/form-data">
<div class="main">
<div class="heading">Update A Form</div>
<div class="titles">Name</div>
<div class="input"><input type ="text" name="Name" placeholder="Name" value="<?php echo $new['Name'];?>"></div>

<div class="titles">DOB</div>
<div class="input"><input type ="date" name="Dob" placeholder="Date Of Birth" value="<?php echo $new['Dob'];?>"></div>

<div class="titles">Email</div>
<div class="input"><input type="text" name ="Email" placeholder="Email" value="<?php echo $new['Email'];?>"></div>

<div class="titles">Gender</div>
<div class="input">Male<input type="radio" name="Gender" value="male" 
<?php if($new['Gender'] == "male") {echo "checked";}?>/>
Female<input type="radio" name="Gender" value="female" 
<?php if($new['Gender'] == "female") {echo "checked";}?>/>
</div>
<div class="titles">Subject</div>
<?php $checkbox_array = explode("," , $new['Subject']);?>
<div class="input"><input type="checkbox" name="Subject[]" value="maths"
 <?php if(in_array("maths",$checkbox_array)){echo "checked";}?>/>Maths
 <input type="checkbox" name="Subject[]" value="hindi" 
 <?php if(in_array("hindi",$checkbox_array)){echo "checked";}?>/>Hindi
 <input type="checkbox" name="Subject[]" value="english" 
 <?php if(in_array("english",$checkbox_array)){echo "checked";}?>/>English
 </div>

 <div class="image">Upload Image<input type="file" name="Image" id="image" value="Upload Image">
 <img src="upload/<?php echo $new['Image'];?>" style="width:100px; height:100px;"/></div>
 <div class="btn"><input type="submit" name="update" value="update" class="botn"/></div>
</div>
</form>
</body>
</html>  



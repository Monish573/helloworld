<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id=$_GET['id'];
    if(isset($_POST['update']))
    {
        $id=$_POST['id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mail=$_POST['mail'];
        $gen=$_POST['ma'];
        $b=$_POST['subject'];
        $subject=implode("," , $b);
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"]);
        $location1=$_FILES["image"]["name"];
         if($location1 != "")
         {
            $sql="UPDATE MyGuest1 SET firstname='".$fname."',lastname='".$lname."',
            email='".$mail."', Gender='".$gen."',Subject='".$subject."', Image='".$location1."' WHERE id='".$id."'";
         }
         else
         {
            $sql="UPDATE MyGuest1 SET firstname='".$fname."',lastname='".$lname."',
            email='".$mail."', Gender='".$gen."',Subject='".$subject."' WHERE id='".$id."'";
         }
        
		 if ($conn->query($sql) === TRUE) 
    {
       header('location:register.php');
    }
          else 
       {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
    }

    
    $sql="SELECT * from MyGuest1 where id='".$id."'"; 
	$result=mysqli_query($conn, $sql) or die(mysqli_error());
    $row=mysqli_fetch_assoc($result);
     ?>
<html>
<body>
<form action="" method ="POST" enctype="multipart/form-data">
<input type="hidden" name="new" value="1"/>
<input name="id" type="hidden" value="<?php echo $row['id'];?>"/>
<table width="350" height="250" border="2" align="center" bgcolor="red">
<tr>
<td colspan="2"><h1> UPDATE-FORM </h1></td>
</tr>
<tr>
<td>FirstName</td>
<td><input type ="text" name="fname" placeholder="Update name" value="<?php echo $row['firstname'];?>"/></td>
</tr> 
<tr>
<td>LastName</td>
<td><input type ="text" name="lname" placeholder="Update lastName" value="<?php echo $row['lastname'];?>"/></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name ="mail" placeholder="Update Email" value="<?php echo $row['email'];?>"/></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass" value="<?php echo $row['password'];?>"/></td>
</tr>
<tr>
<td>Gender</td><?php
var_dump($row['Subject']);?>
<td>Male<input type="radio" name="ma" required value="male" <?php if($row['Gender'] == "male") {echo "checked";}?>/>
    Female<input type="radio" name="ma" required value="female" <?php if($row['Gender'] == "female") {echo "checked";}?>/></td>
</tr>
<tr>
<?php $checkbox_array = explode(",",$row['Subject']);?>
<td>Subject</td>
<td><input type="checkbox" name="subject[]" value="maths" <?php if(in_array("maths",$checkbox_array)){echo "checked";}?>/>Maths
    <input type="checkbox" name="subject[]" value="hindi" <?php if(in_array("hindi",$checkbox_array)){echo "checked";}?>/>Hindi
    <input type="checkbox" name="subject[]" value="english" <?php if(in_array("english",$checkbox_array)){echo "checked";}?>/>English
</td>
</tr>
<tr>
<td>Upload Image<input type="file" name="image" id="image" value="Upload Image"></td>
<td><img src="uploads/<?php echo $row['Image'];?>" style="width:100px; height:100px;"/>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="update" value="update"/>
<input type="reset" value="reset">
</td>
</tr>
</table>
</form>
</body>
</html>
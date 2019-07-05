<html>
<head>
<title> Registration Form</title>
</head>
<body>
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
    if (isset($_POST['save']))
    {
        $name=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $mail=$_POST['email'];
        $passw=$_POST['pass'];
        $gen=$_POST['ma'];
        $a=$_POST['sub'];
        $sub=implode("," , $a);
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"]);
        $location=($_FILES["image"]["name"]);

       $sql = "INSERT INTO MyGuest1(firstname, lastname, email,password,Gender,Subject,Image)
       VALUES ('$name', '$lname', '$mail ','$passw','$gen','$sub','$location')";
      
       if ($conn->query($sql) === TRUE) 
       {
        header('location: register.php');
       } else 
       {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }   
    }
  ?>
  <form action="" method ="POST" width="450px" enctype="multipart/form-data">
<table width="350" border="2" align="center" bgcolor="red">
<tr>
<td colspan="2"><h1> RegistrationForm </h1></td>
</tr>
<tr>
<td>Fist Name</td>
<td><input type ="text" name="firstname" placeholder="Name"></td>
</tr> 
<tr>
<td>Last Name</td>
<td><input type ="text" name="lastname" placeholder="LastName"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name ="email" placeholder="Email"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass"></td>
</tr>
<tr>
<td>Gender</td>
<td>Male<input type="radio" name="ma" value="male"/>
Female<input type="radio" name="ma" value="female"/></td>
</tr>
<tr>
<td>Subject</td>
<td><input type="checkbox" name="sub[]" value="maths">Maths
 <input type="checkbox" name="sub[]" value="hindi">Hindi
 <input type="checkbox" name="sub[]" value="english">English</td>
 </tr>
 <tr>
 <td colspan="2">Upload Image<input type="file" name="image" id="image" value="Upload Image"></td>
 </tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="save" value="submit"/>
<input type="reset" value="reset">
<?php echo "<button><a href='register.php'>Show Table</button>";?></td>
</tr>
</table>
</form>
</body>
</html> 
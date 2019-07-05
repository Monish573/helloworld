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

    
    $sql="SELECT id, firstname,lastname,email,password,Gender,Subject,Image FROM MyGuest1";
        $result=$conn->query($sql);
        if($result->num_rows > 0)
        {   echo "<table width='250' border='2'>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>firstname</th>";
            echo "<th>lastname</th>";
            echo "<th>email</th>";
            echo "<th>password</th>";
            echo "<th>Gender</th>";
            echo "<th>Subject</th>";
            echo "<th>Image</th>";
            echo "<th>update</th>";
            echo "<th>delete</th>";
           echo "<th><button><a href='insert.php'>Add New</a></button></th>"; 
            echo "</tr>";
            while($row=$result->fetch_assoc())
            {
               echo "<tr>";
               echo "<td>".$row['id']. "</td>";
               echo "<td>".$row['firstname']. "</td>";
               echo "<td>".$row['lastname']. "</td>";
               echo "<td>".$row['email']. "</td>";
               echo "<td>".$row['password']. "</td>";
               echo "<td>".$row['Gender']."</td>";
               echo "<td>".$row['Subject']."</td>"; 
               echo '<td><img src="uploads/'.$row['Image'].'" style="width:50px; height:50px;"/></td>';?>
			   <td><a href="update.php?id=<?php echo $row['id']?>">update</a></td>
			   <?php
                    echo "<form method='post'>";
                    echo '<td><input type="submit" name="delete" value="Delete">
                              <input type="hidden" name="d_id" value="'.$row['id'].'"></td>';
                    echo "</form>";
                    echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "0 results";
        }

//delete button code start HEre
        if(isset($_POST['delete']))
    { 
        $id=$_POST['d_id'];
        $sql="DELETE FROM MyGuest1 WHERE id=$id";
        if($conn->query($sql) === TRUE)
         {
             echo "Record delete successfully";
         }
         else
         {
             echo "error deleting record";
         }
    }
  //delete button code End HEre
 
  ?>   
  
  
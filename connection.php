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

// sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
// sql to insert table
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('monish', 'kapoor', 'monish@exa.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
 $sql="DELETE FROM MyGuests WHERE id=2";
if($conn->query($sql)===TRUE)
{
    echo "record delete successfully";
}
else
{
    echo "error deleting record:".$conn->error;
}
$conn->close();
?>
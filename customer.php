<?php
include('db.php');
if(isset($_POST['save']))
{
    $id=$_POST['customer'];
    $name=$_POST['cname'];
    $con=$_POST['cont'];
    $sql="INSERT INTO china(customerid,contactname,country)
    VALUES('$id','$name','$con')";

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
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
.jumbotron{
	background-image: url('https://mdbootstrap.com/img/Photos/Others/architecture.jpg');
	background-size: cover;
	background-repeat: no-repeat;
} 

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.orderbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.orderbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

</style>
</head>
<body>
<form action="" method="POST">
  <div class="jumbotron text-center">
    <h1>Display Order Form</h1>
    <hr>
    <div class="container">
    <label for="cid"><b>Customer-Id</b></label>
    <input type="text" placeholder="Insert Customer id" name="customer" required>

    <label for="name"><b>Contact-Name</b></label>
    <input type="text" placeholder="Enter name" name="cname" required>

    <label for="con"><b>Country</b></label>
    <input type="text" placeholder="Enter Country" name="cont" required>
    <hr>
    <button type="submit" class="orderbtn" name="save">Submit</button>
    
  </div>
  </div>
  <div>
  <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link" href="order.php">Previous</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
    <li class="page-item"><a class="page-link" href="customer.php">Next</a></li>
  </ul>
</div>

</form>

</body>
</html>

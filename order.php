<?php
include('db.php');
// if(isset($_POST['save']))
// {
//     $id=$_POST['order'];
//     $name=$_POST['cname'];
//     $date=$_POST['date'];
//     $sql="INSERT INTO india(orderid,customername,orderdate)
//     VALUES('$id','$name','$date')";

//     if($conn->query($sql)===TRUE)
//     {
//         echo "Insert record successfully";
//     }
//     else
//     {
//         echo "Error: " . $sql . "<br>" . $conn->error;

//     }
  
// }
// INNER JOIN
   

  if(isset($_POST['update']))
  {
  $sql='UPDATE `order`   
  INNER JOIN `customer` ON order.orderid = customer.customerid SET order.customername = "lakshya choudhary" WHERE  order.orderid=104';
   $result=$conn->query($sql);
   if(!$result)
  {
    die ('could not update data;' . $conn->error);
  }
  }

  $sql1= 'SELECT order.orderid, order.customername, customer.country 
  FROM `order` INNER JOIN `customer` ON order.orderid = customer.customerid';
 $result1=$conn->query($sql1);

 if(!$result1)
 {
   die ('could not get data;' . $conn->error);
 }
  ?>
  <?php
  echo '<div class="jumbotron text-center">';
  echo '<h1>Display INNER JOIN  Table</h1>';
  echo '<form action="" method="POST"><button type="submit" class="btn btn-outline-success" name="update">Update</button></form> ' ;
  echo '<hr>'; 
  echo '<table class="table table-dark table-hover">';
  echo '<colgroup>';
  echo '<col class="col-xs-1">';
  echo '<col class="col-xs-7">';
  echo '</colgroup>';
  echo '<thead>';
  echo '<tr>';
  echo '<th class="table-primary">OrderID</th>';
  echo '<th class="table-warning">ContactName</th>';
  echo '<th class="table-danger">Country</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  while($row=$result1->fetch_assoc()) 
  { 
      echo '<tr>';
         echo '<td>'.$row['orderid'].'</td>';
         echo '<td>'.$row['customername'].'</td>'; 
         echo '<td>'.$row['country'].'</td>';
        echo '</tr>';
     
   }
   
   echo '</tbody>';
   echo '</table>';
   echo '</div>';
   
?>










<!-- CROSS JOIN TABLE -->
 <?php
  $sql= 'SELECT * FROM `order` CROSS JOIN `customer` ';
  $result=$conn->query($sql);
  if(!$result)
  {
    die ('could not get data;' . $conn->error);
  } 
  ?>
  <?php
  echo '<div class="jumbotron text-center">';
  echo '<h1>Display CROSS JOIN  Table</h1>';
  echo '<hr>'; 
  echo '<table class="table table-dark table-hover">';
  echo '<colgroup>';
  echo '<col class="col-xs-1">';
  echo '<col class="col-xs-7">';
  echo '</colgroup>';
  echo '<thead>';
  echo '<tr>';
  echo '<th class="table-primary">OrderID</th>';
  echo '<th class="table-warning">CustomerName</th>';
  echo '<th class="table-success">OrderDate</th>';
  echo '<th class="table-secondary">Product</th>';
  echo '<th class="table-danger">City</th>';
  echo '<th class="table-primary">CustomerId</th>';
  echo '<th class="table-warning">ContactName</th>';
  echo '<th class="table-success">Country</th>';
  echo '<th class="table-secondary">Colleges</th>';
  echo '<th class="table-danger">Sports</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  while($row=$result->fetch_assoc()) 
  { 
      echo '<tr>';
         echo '<td>'.$row['orderid'].'</td>';
         echo '<td>'.$row['customername'].'</td>';
         echo '<td>'.$row['orderdate'].'</td>';
         echo '<td>'.$row['product'].'</td>';
         echo '<td>'.$row['city'].'</td>';
         echo '<td>'.$row['customerid'].'</td>';
         echo '<td>'.$row['contactname'].'</td>';
         echo '<td>'.$row['country'].'</td>';
         echo '<td>'.$row['colleges'].'</td>'; 
         echo '<td>'.$row['sports'].'</td>';
         echo '</tr>';
     
   }
   
   echo '</tbody>';
   echo '</table>';
   echo '</div>';
?> 



<!-- RIGHT JOIN TABLE -->
<?php
if(isset($_POST['update']))
{
$sql='UPDATE `order`
RIGHT JOIN `customer` ON order.orderid = customer.customerid SET order.customername = "lakshya choudhary", customer.country = "iran"   WHERE  order.orderid=107';
 $result=$conn->query($sql);
 if(!$result)
{
  die ('could not update data;' . $conn->error);
}
}

$sql1= 'SELECT order.orderid, order.customername, customer.country, customer.sports 
   FROM `order` RIGHT JOIN `customer` ON order.orderid = customer.customerid';
  $result1=$conn->query($sql1);
  if(!$result1)
  {
    die ('could not get data;' . $conn->error);
  } 
  ?>
  <?php
  echo '<div class="jumbotron text-center">';
  echo '<h1>Display RIGHT JOIN  Table</h1>';
  echo '<form action="" method="POST"><button type="submit" class="btn btn-outline-success" name="update">Update</button></form> ' ;
  echo '<hr>'; 
  echo '<table class="table table-dark table-hover">';
  echo '<colgroup>';
  echo '<col class="col-xs-1">';
  echo '<col class="col-xs-7">';
  echo '</colgroup>';
  echo '<thead>';
  echo '<tr>';
  echo '<th class="table-primary">OrderID</th>';
  echo '<th class="table-warning">ContactName</th>';
  echo '<th class="table-danger">Country</th>';
  echo '<th class="table-success">Sports</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  while($row=$result1->fetch_assoc()) 
  { 
      echo '<tr>';
         echo '<td>'.$row['orderid'].'</td>';
         echo '<td>'.$row['customername'].'</td>'; 
         echo '<td>'.$row['country'].'</td>';
         echo '<td>'.$row['sports'].'</td>';
        echo '</tr>';
     
   }
   
   echo '</tbody>';
   echo '</table>';
   echo '</div>';
?>



<!-- LEFT JOIN TABLE -->
<?php
if(isset($_POST['update']))
{
$sql='UPDATE `order`
LEFT JOIN `customer` ON order.orderid = customer.customerid SET order.customername = "jugal mehra", customer.country = "japan"   WHERE  order.orderid=105';
 $result=$conn->query($sql);
 if(!$result)
{
  die ('could not update data;' . $conn->error);
}
}
$sql1= 'SELECT order.orderid, order.customername, customer.country, customer.sports 
   FROM `order` LEFT JOIN `customer` ON order.orderid = customer.customerid';
  $result1=$conn->query($sql1);
  if(!$result1)
  {
    die ('could not get data;' . $conn->error);
  } 
  ?>
  <?php
  echo '<div class="jumbotron text-center">';
  echo '<h1>Display LEFT JOIN  Table</h1>';
  echo '<form action="" method="POST"><button type="submit" class="btn btn-outline-success" name="update">Update</button></form> ' ;
  echo '<hr>'; 
  echo '<table class="table table-dark table-hover">';
  echo '<colgroup>';
  echo '<col class="col-xs-1">';
  echo '<col class="col-xs-7">';
  echo '</colgroup>';
  echo '<thead>';
  echo '<tr>';
  echo '<th class="table-primary">OrderID</th>';
  echo '<th class="table-warning">ContactName</th>';
  echo '<th class="table-danger">Country</th>';
  echo '<th class="table-success">Sports</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  while($row=$result1->fetch_assoc()) 
  { 
      echo '<tr>';
         echo '<td>'.$row['orderid'].'</td>';
         echo '<td>'.$row['customername'].'</td>'; 
         echo '<td>'.$row['country'].'</td>';
         echo '<td>'.$row['sports'].'</td>';
        echo '</tr>';
     
   }
   
   echo '</tbody>';
   echo '</table>';
   echo '</div>';

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
	background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(11).jpg');
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
<!-- <form action="" method="POST">
  <div class="jumbotron text-center">
    <h1>Display Order Form</h1>
    <hr>
    <div class="container">
    <label for="orderid"><b>Order-Id</b></label>
    <input type="text" placeholder="Insert order id" name="order" required>

    <label for="name"><b>Customer-Name</b></label>
    <input type="text" placeholder="Enter name" name="cname" required>

    <label for="date"><b>Order-Date</b></label>
    <input type="date" placeholder="Enter Date" name="date" required>
    <hr>
    <button type="submit" class="orderbtn" name="save">Submit</button>
    
  </div>
  </div>
  <div>
  <button type="button" class="btn btn-danger btn-block">Show-Table</button>
  <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link" href="order.php">Previous</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
    <li class="page-item"><a class="page-link" href="customer.php">Next</a></li>
  </ul>
</div>

</form> -->

</body>
</html>

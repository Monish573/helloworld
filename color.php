<html>
<head>
  <title>Color and Fruit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  body{
      background:-webkit-linear-gradient(right,#99bbff, #ffb3ff);
  }
.jumbotron
{
	background-image: url('images/download.jpg');
	background-size: cover;
    color:white;
    display:flex;
    text-align:center;
}
 h1 
{
    font-size: 4.5rem;
}

</style>
</head>
<body>
<div class="container-fluid mt-5 mb-5">
<form name= "dropdown" action="" method="POST">
  <div class="jumbotron text-center">
    <h1>Dependent color & fruit dropdown using ajax in PHP </h1>
    <hr>

    <?php
//Include the database configuration file
include ('db1.php');

//Fetch all the color data
$query = $db->query("SELECT * FROM color");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<div class="container" >
<div class="row" > 
<div class="col-sm-6">
<h4>Pick-Color</h4>
<select id="color" class="bg-success">
    <option value="">Select Color</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['color_id'].'">'.$row['color_name'].'</option>';
        }
    }else{
        echo '<option value="">Color not available</option>';
    }
    ?>
</select>
</div>
<div class="col-sm-6">
<h4>Pick-Fruit</h4>
<select id="fruit" class="bg-warning">
    <option value="">Select color first</option>
</select>
</div>
</div>
</div>
</form>
<script>
$(document).ready(function(){
    $('#color').on('change',function(){
        var colorID = $(this).val();
        if(colorID){
            $.ajax({
                type:'POST',
                url:'fruit.php',
                data:'color_id='+colorID,
                success:function(html){
                    $('#fruit').html(html); 
                }
            }); 
        }else{
            $('#fruit').html('<option value="">Select color first</option>');
             
        }
    });
});
</script>
</body>
</html>
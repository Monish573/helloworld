<?php
//Include the database configuration file
include ('db1.php');
if(isset($_POST["color_id"])){
    //Fetch all fruit data
    $query = $db->query("SELECT * FROM fruit WHERE color_id = ".$_POST['color_id']." ");
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Fruit option list
    if($rowCount > 0)
    {
        echo '<option value="">Select Fruit</option>';
        while($row = $query->fetch_assoc())
        { 
            echo '<option value="'.$row['fruit_id'].'">'.$row['fruit_name'].'</option>';
        }
    }else{
        echo '<option value="">fruit not available</option>';
    }
}
?>
<?php
//Include database configuration file
include("includes/db.php");


if(isset($_POST["id"]) && !empty($_POST["id"])){
    //Get all state data
   
    $id=$_POST["id"];
    
    $get_p_cats = "select * from product_categories where p_man_id= $id";

    $run_p_cats = mysqli_query($con,$get_p_cats);

    
    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

        $p_cat_id = $row_p_cats['p_cat_id'];

        $p_cat_title = $row_p_cats['p_cat_title'];

        echo "<option value='$p_cat_id'>$p_cat_title</option>";

    }
    //Count total number of rows
    
}
 

?>
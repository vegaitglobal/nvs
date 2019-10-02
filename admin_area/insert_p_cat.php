<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Unos programa

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Unos programa

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Naziv</label>

<div class="col-md-6" >

<input type="text" name="p_cat_title" class="form-control" >

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Opis </label>

<div class="col-md-6">

<textarea class="form-control" id="text1" rows="15" name="p_cat_opis"></textarea>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Organizacija </label>

<div class="col-md-6" >

<select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->

<option> izaberi organizaciju </option>

<?php

$get_manufacturer = "select * from organizations";
$run_manufacturer = mysqli_query($con,$get_manufacturer);
while($row_manufacturer= mysqli_fetch_array($run_manufacturer)){
$manufacturer_id = $row_manufacturer['manufacturer_id'];
$manufacturer_title = $row_manufacturer['manufacturer_title'];

echo "<option value='$manufacturer_id'>
$manufacturer_title
</option>";

}

?>

</select><!-- select manufacturer Ends -->

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Lokacija</label>

<div class="col-md-6" >

<input type="text" name="p_cat_lokacija" class="form-control" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Od</label>

<div class="col-md-3" >

<input type="date" name="p_cat_od" class="form-control" >

</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Do</label>

<div class="col-md-3" >

<input type="date" name="p_cat_do" class="form-control" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Hrana</label>

<div class="col-md-6" >

<input type="radio" name="p_cat_hrana" value="yes" >

<label> Da </label>

<input type="radio" name="p_cat_hrana" value="no" >

<label> Ne </label>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Smeštaj</label>

<div class="col-md-6" >

<input type="radio" name="p_cat_smestaj" value="yes" >

<label> Da </label>

<input type="radio" name="p_cat_smestaj" value="no" >

<label> Ne </label>

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Prikaži kao prvi</label>

<div class="col-md-6" >

<input type="radio" name="p_cat_top" value="yes" >

<label> Da </label>

<input type="radio" name="p_cat_top" value="no" >

<label> Ne </label>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Slika</label>

<div class="col-md-6" >

<input type="file" name="p_cat_image" class="form-control" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Unesi" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$p_cat_title = escape($_POST['p_cat_title']);
    
$p_cat_opis = $_POST['p_cat_opis'];

$p_cat_top = $_POST['p_cat_top'];

$p_cat_image = $_FILES['p_cat_image']['name'];

$temp_name = $_FILES['p_cat_image']['tmp_name'];

    
$p_cat_lokacija = escape($_POST['p_cat_lokacija']);
    
$p_cat_od = $_POST['p_cat_od'];
    
$p_cat_do = $_POST['p_cat_do'];
    
$p_cat_hrana = $_POST['p_cat_hrana'];

$p_cat_smestaj = $_POST['p_cat_smestaj'];
    
$p_man_id = $_POST['manufacturer'];
    
    
    
$insert_p_cat = "insert into product_categories (p_cat_title,p_cat_opis,p_cat_top,p_cat_image,p_cat_lokacija,p_cat_od,p_cat_do,p_cat_hrana,p_cat_smestaj,p_man_id) values ('$p_cat_title','$p_cat_opis','$p_cat_top','$p_cat_image','$p_cat_lokacija','$p_cat_od','$p_cat_do','$p_cat_hrana','$p_cat_smestaj','$p_man_id')";

$run_p_cat = mysqli_query($con,$insert_p_cat);

if($run_p_cat){
    
    move_uploaded_file($temp_name,"other_images/$p_cat_image");

    echo "<script>alert('Nov program je unet')</script>";

    echo "<script>window.open('index.php?view_p_cats','_self')</script>";

}



}



?>


<?php } ?>
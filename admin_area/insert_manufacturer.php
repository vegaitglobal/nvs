<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row"><!-- 1 row Starts -->

	<div class="col-lg-12"><!-- col-lg-12 Starts -->

		<ol class="breadcrumb"><!-- breadcrumb Starts -->

			<li class="active">

				<i class="fa fa-dashboard"></i> Dashboard / Unos organizations

			</li>

		</ol><!-- breadcrumb Ends -->

	</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

	<div class="col-lg-12"><!-- col-lg-12 Starts -->

	<div class="panel panel-default"><!-- panel panel-default Starts -->

		<div class="panel-heading"><!-- panel-heading Starts -->

			<h3 class="panel-title"><!-- panel-title Starts -->

				<i class="fa fa-money fa-fw"> </i> Unos organizacije

			</h3><!-- panel-title Ends -->

		</div><!-- panel-heading Ends -->

		<div class="panel-body"><!-- panel-body Starts -->

		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Skraćeno ime </label>

				<div class="col-md-6">

					<input type="text" name="manufacturer_name" class="form-control" >

				</div>

			</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Puno ime </label>

				<div class="col-md-6">

					<input type="text" name="manufacturer_name_full" class="form-control" >

				</div>

			</div><!-- form-group Ends -->


			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Mesto </label>

				<div class="col-md-6">

					<input type="text" name="manufacturer_mesto" class="form-control" >

				</div>

			</div><!-- form-group Ends -->


			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Adresa </label>

				<div class="col-md-6">

					<input type="text" name="manufacturer_adresa" class="form-control" >

				</div>

			</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Telefon </label>

				<div class="col-md-6">

					<input type="text" name="manufacturer_telefon" class="form-control" >

				</div>

			</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Email </label>

				<div class="col-md-6">

					<input type="email" name="manufacturer_email" class="form-control" >

				</div>

			</div><!-- form-group Ends -->
			
			<div class="form-group">

            <label class="col-md-3 control-label"> Lozinka </label>

                <div class="col-md-6">
                 
                    <input  type="password" class="form-control"  name="manufacturer_pass" >

                </div>

            </div>
            
			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Site </label>

				<div class="col-md-6">

					<input type="url" name="manufacturer_url" class="form-control" >

				</div>

			</div><!-- form-group Ends -->
			
			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Facebook </label>

				<div class="col-md-6">

					<input type="url" name="manufacturer_fb" class="form-control" >

				</div>

			</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Opis </label>

				<div class="col-md-6">

					<textarea id="text1" class="form-control" rows="15" name="manufacturer_opis"></textarea>

				</div>

			</div><!-- form-group Ends -->



			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Prikaži kao prvog </label>

				<div class="col-md-6">

					<input type="radio" name="manufacturer_top" value="yes" >

						<label> Da </label>

					<input type="radio" name="manufacturer_top" value="no" >

						<label> Ne </label>

				</div>

			</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> Logo Organizatora </label>

				<div class="col-md-6">

					<input type="file" name="manufacturer_image" class="form-control" >

				</div>

			</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"> </label>

				<div class="col-md-6">

					<input type="submit" name="submit" class="form-control btn btn-primary" value=" Unos podataka " >

				</div>

			</div><!-- form-group Ends -->

			</form><!-- form-horizontal Ends -->

		</div><!-- panel-body Ends -->

	</div><!-- panel panel-default Ends -->

	</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$manufacturer_name = escape($_POST['manufacturer_name']);
    
$manufacturer_name_full = escape($_POST['manufacturer_name_full']);
    
$manufacturer_mesto = escape($_POST['manufacturer_mesto']);

$manufacturer_adresa = escape($_POST['manufacturer_adresa']);
    
$manufacturer_telefon = escape($_POST['manufacturer_telefon']);
    
$manufacturer_email = filter_var($_POST['manufacturer_email'], FILTER_SANITIZE_EMAIL);
    
$manufacturer_pass = escape($_POST['manufacturer_pass']);
    
$manufacturer_url = filter_var($_POST['manufacturer_url'], FILTER_SANITIZE_URL);

$manufacturer_fb = filter_var($_POST['manufacturer_fb'], FILTER_SANITIZE_URL);
    
$manufacturer_opis = $_POST['manufacturer_opis'];

$manufacturer_top = $_POST['manufacturer_top'];

$manufacturer_image = $_FILES['manufacturer_image']['name'];

$tmp_name = $_FILES['manufacturer_image']['tmp_name'];

move_uploaded_file($tmp_name,"other_images/$manufacturer_image");

$insert_manufacturer = "insert into organizations (manufacturer_title,manufacturer_title_full,manufacturer_top,manufacturer_image,manufacturer_opis,manufacturer_mesto,manufacturer_adresa,manufacturer_tel,manufacturer_email,manufacturer_url,manufacturer_fb,manufacturer_pass,date) values ('$manufacturer_name','$manufacturer_name_full','$manufacturer_top','$manufacturer_image','$manufacturer_opis','$manufacturer_mesto','$manufacturer_adresa','$manufacturer_telefon','$manufacturer_email','$manufacturer_url','$manufacturer_fb','manufacturer_pass',NOW())";

$run_manufacturer = mysqli_query($con,$insert_manufacturer);

if($run_manufacturer){

echo "<script>alert('Nova organizacija je uneta')</script>";

echo "<script>window.open('index.php?view_organizations','_self')</script>";

}

}

?>

<?php } ?>
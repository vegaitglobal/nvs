<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert User

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert User

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_name" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Email: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_email" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Password: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="password" name="admin_pass" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Country: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_country" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Job: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_job" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Contact: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_contact" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User About: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<textarea name="admin_about" class="form-control" rows="3"> </textarea>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Image: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" accept="image/*"  name="admin_image" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {
        $admin_name = escape($_POST['admin_name']);

        $admin_email = filter_var($_POST['admin_email'], FILTER_SANITIZE_EMAIL);

        $admin_pass = escape($_POST['admin_pass']);

        $hashed_password = password_hash($admin_pass, PASSWORD_BCRYPT );

        $admin_country = escape($_POST['admin_country']);

        $admin_job = $_POST['admin_job'];

        $admin_contact = escape($_POST['admin_contact']);

        $admin_about = escape($_POST['admin_about']);

        $admin_image = $_FILES['admin_image']['name'];

        $temp_admin_image = $_FILES['admin_image']['tmp_name'];

        $get_email = "select * from admins where admin_email='$admin_email'";

        $run_email = mysqli_query($con, $get_email);

        $check_email = mysqli_num_rows($run_email);

        if ($check_email == 1) {
            echo "<script>alert('Ovaj email je već registrovan, pokušajte drugi')</script>";

            exit();
        }

        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

        $insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) values ('$admin_name','$admin_email','$hashed_password','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";

        $run_admin = mysqli_query($con, $insert_admin);


        if ($run_admin) {
            echo "<script>alert('One User Has Been Inserted successfully')</script>";

            echo "<script>window.open('index.php?path=view_users','_self')</script>";
        }
    }

    ?>

<?php }  ?>
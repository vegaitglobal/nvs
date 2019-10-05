<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Unos oblasti

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Unos oblasti interesovanja

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Naziv oblasti</label>

<div class="col-md-6">

<input type="text" name="cat_title" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Pokaži kao prvog</label>

<div class="col-md-6">

<input type="radio" name="cat_top" value="yes">

<label>Da</label>

<input type="radio" name="cat_top" value="no">

<label>Ne</label>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Slika oblasti</label>

<div class="col-md-6">

<input type="file" name="cat_image" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Unos oblasti" class="btn btn-primary form-control">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {
        $cat_title = escape($_POST['cat_title']);

        $cat_top = $_POST['cat_top'];

        $cat_image = $_FILES['cat_image']['name'];

        $temp_name = $_FILES['cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "other_images/$cat_image");

        $insert_cat = "insert into categories (cat_title,cat_top,cat_image) values ('$cat_title','$cat_top','$cat_image')";

        $run_cat = mysqli_query($con, $insert_cat);

        if ($run_cat) {
            echo "<script> alert('Nov oblast je dodat')</script>";

            echo "<script> window.open('index.php?view_cats','_self') </script>";
        }
    }



    ?>

<?php } ?>
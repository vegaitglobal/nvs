<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>


<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Unos Dokumenta

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Unos Dokumenta

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->


    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" >Naziv Dokumenta </label>

        <div class="col-md-6" >

            <input type="text" name="docs_title" class="form-control" required >

        </div>

    </div><!-- form-group Ends -->




    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" >Slika pozicije </label>

        <div class="col-md-6" >

            <input type="file" name="docs_doc" class="form-control" required >

        </div>

    </div><!-- form-group Ends -->



    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" ></label>

        <div class="col-md-6" >

            <input type="submit" name="submit" value="Unos pozicije" class="btn btn-primary form-control" >

        </div>

    </div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->



    <?php

    if (isset($_POST['submit'])) {
        $docs_title = escape($_POST['docs_title']);

        $docs_doc = $_FILES['docs_doc']['name'];

        $temp_name1 = $_FILES['docs_doc']['tmp_name'];



        $insert_doc = "insert into docs (docs_title,docs_doc) values ('$docs_title','$docs_doc')";

        $run_doc = mysqli_query($con, $insert_doc);


        if ($run_doc) {
            move_uploaded_file($temp_name1, "../docs/$docs_doc");

            echo "<script>alert('Dokumenat je unet')</script>";

            echo "<script>window.open('index.php?path=view_docs','_self')</script>";
        }
    }

    ?>

<?php } ?>



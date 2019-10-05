<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
    $man_email=$_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
    
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

            <div class="col-md-9" >

                <input type="text" name="p_cat_title" class="form-control" >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label class="control-label"> Opis </label>

             <div >

                <textarea id="text1" class="form-control" rows="10" name="p_cat_opis"></textarea>

            </div>

        </div><!-- form-group Ends -->

 
        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Lokacija</label>

            <div class="col-md-9" >

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

    if (isset($_POST['submit'])) {
        $p_cat_title = escape($_POST['p_cat_title']);

        $p_cat_opis = escape($_POST['p_cat_opis']);

        $p_cat_top = "no";

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $temp_name = $_FILES['p_cat_image']['tmp_name'];

        $p_cat_lokacija = escape($_POST['p_cat_lokacija']);

        $p_cat_od = $_POST['p_cat_od'];

        $p_cat_do = $_POST['p_cat_do'];

        $p_cat_hrana = $_POST['p_cat_hrana'];

        $p_cat_smestaj = $_POST['p_cat_smestaj'];

        $p_man_id = $man_id;


        $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_opis,p_cat_top,p_cat_image,p_cat_lokacija,p_cat_od,p_cat_do,p_cat_hrana,p_cat_smestaj,p_man_id) values ('$p_cat_title','$p_cat_opis','$p_cat_top','$p_cat_image','$p_cat_lokacija','$p_cat_od','$p_cat_do','$p_cat_hrana','$p_cat_smestaj','$p_man_id')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {
            move_uploaded_file($temp_name, "../admin_area/other_images/$p_cat_image");

            echo "<script>alert('Nov program je unet')</script>";

            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        }
    }

    ?>
<?php } ?>


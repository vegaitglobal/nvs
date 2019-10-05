<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
    $man_email=$_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
    
    ?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Početna</a>
</li>

<li>Rezultati pretrage</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->

<div class="col-md-12" ><!-- col-md-12 Starts --->

<div class="row" id="Products" ><!-- row Starts -->

    <?php

    if (isset($_GET['search'])) {
        $user_keyword = $_GET['user_query'];

        $get_products = "select * from products where product_title like '%$user_keyword%'";

        $run_products = mysqli_query($con, $get_products);

        $count = mysqli_num_rows($run_products);

        if ($count==0) {
            echo "

        <div class='box'>

        <h2>Nema resultata</h2>

        </div>

        ";
        } else {
            while ($row_products=mysqli_fetch_array($run_products)) {
                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_img1 = $row_products['product_img1'];

                $pro_label = $row_products['product_label'];

                $manufacturer_id = $row_products['manufacturer_id'];

                $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

                $run_manufacturer = mysqli_query($db, $get_manufacturer);

                $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                $manufacturer_name = $row_manufacturer['manufacturer_title'];

                $pro_url = $row_products['product_url'];

                $pro_kolicina = $row_products['product_kolicina'];




                if ($pro_label == "") {
                    $product_label = "";
                } else {
                    $product_label = "

        <a class='label sale' href='#' style='color:black;'>

        <div class='thelabel'>$pro_label</div>

        <div class='label-background'> </div>

        </a>

        ";
                }


                echo "

        <div class='col-md-3 col-sm-6 center-responsive' >

        <div class='product' >

        <a href='ponuda-$pro_url' >

        <img src='admin_area/product_images/$pro_img1' class='img-responsive' >

        </a>

        <div class='text' >

        <center>

        <p class='btn btn-primary'> $manufacturer_name </p>

        </center>

        <hr>

        <h3><a href='$pro_url' >$pro_title</a></h3>

        <p class='price' > $pro_kolicina volontera</p>

        <p class='buttons' >

        <a href='ponuda-$pro_url' class='btn btn-default' >Pogledaj</a>

        <a href='ponuda-$pro_url' class='btn btn-primary'>

        <i class='fa fa-shopping-cart'></i> Dodaj

        </a>


        </p>

        </div>

        $product_label


        </div>

        </div>

        ";
            }
        }
    }
    ?>

</div><!-- row Ends -->

</div><!-- col-md-9 Ends --->

</div><!-- container Ends -->

</div><!-- content Ends -->


    <?php
}
?>

<?php

$man_email=$_SESSION['manufacturer_email'];
$man_id=$_SESSION['manufacturer_id'];


$get_p_categories = "select * from product_categories where p_man_id= '$man_id'";
$run_p_categories = mysqli_query($con, $get_p_categories);
$count_p_categories = mysqli_num_rows($run_p_categories);

$get_products = "select * from products where manufacturer_id= '$man_id'";
$run_products = mysqli_query($con, $get_products);
$count_products = mysqli_num_rows($run_products);

?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Dashboard</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

    <div class="col-md-6"><!-- col-lg-3 col-md-6 Starts -->

    <div class="panel panel-primary"><!-- panel panel-primary Starts -->

        <div class="panel-heading"><!-- panel-heading Starts -->

            <div class="row"><!-- panel-heading row Starts -->

                <div class="col-xs-3"><!-- col-xs-3 Starts -->

                    <i class="fa fa-tasks fa-5x"> </i>

                </div><!-- col-xs-3 Ends -->

                <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                    <div class="huge"> <?php echo $count_products; ?> </div>

                    <div>Pozicije</div>

                </div><!-- col-xs-9 text-right Ends -->

            </div><!-- panel-heading row Ends -->

        </div><!-- panel-heading Ends -->

        <a href="index.php?view_products">

            <div class="panel-footer"><!-- panel-footer Starts -->

                <span class="pull-left"> Detaljno </span>

                <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                <div class="clearfix"></div>

            </div><!-- panel-footer Ends -->

        </a>

    </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->


    <div class="col-md-6"><!-- col-lg-3 col-md-6 Starts -->

    <div class="panel panel-success "><!-- panel panel-green Starts -->

        <div class="panel-heading"><!-- panel-heading Starts -->

            <div class="row"><!-- panel-heading row Starts -->

                <div class="col-xs-3"><!-- col-xs-3 Starts -->

                    <i class="fa fa-comments fa-5x"> </i>

                </div><!-- col-xs-3 Ends -->

                <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                    <div class="huge"> <?php echo $count_p_categories; ?> </div>

                    <div>Programi</div>

                </div><!-- col-xs-9 text-right Ends -->

            </div><!-- panel-heading row Ends -->

        </div><!-- panel-heading Ends -->

        <a href="index.php?view_p_cats">

            <div class="panel-footer"><!-- panel-footer Starts -->

                <span class="pull-left"> Detaljno </span>

                <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                <div class="clearfix"></div>

            </div><!-- panel-footer Ends -->

        </a>

        </div><!-- panel panel-green Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->



</div><!-- col-lg-3 col-md-6 Ends -->








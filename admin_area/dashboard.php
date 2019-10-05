<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
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

<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

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


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-green"><!-- panel panel-green Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-comments fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_volunteers; ?> </div>

<div>volunteers</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_volunteers">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> Detaljno </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-green Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-yellow"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-shopping-cart fa-5x"> </i>

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

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-red"><!-- panel panel-red Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-support fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_pending_orders; ?> </div>

<div>Prijave</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_orders">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> Detaljno </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-red Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


</div><!-- 2 row Ends -->

<div class="row" ><!-- 3 row Starts -->

<div class="col-lg-8" ><!-- col-lg-8 Starts -->

<div class="panel panel-primary" ><!-- panel panel-primary Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Nove prijave

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>Order No:</th>
<th>Customer Email:</th>
<th>Product ID:</th>
<th>Status:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

    <?php

    $i = 0;

    $get_wishlist = "select * from wishlist order by datum DESC LIMIT 0,5";

    $run_wishlist = mysqli_query($con, $get_wishlist);

    while ($row_wishlist = mysqli_fetch_array($run_wishlist)) {
        $wishlist_id = $row_wishlist['wishlist_id'];

        $status = $row_wishlist['status'];

        $product_id = $row_wishlist['product_id'];

        $get_products = "select * from products where product_id='$product_id'";

        $run_products = mysqli_query($con, $get_products);

        $row_products = mysqli_fetch_array($run_products);

        $product_title = $row_products['product_title'];

        $product_url = $row_products['product_url'];

        $product_img1 = $row_products['product_img1'];

        $c_id = $row_wishlist['customer_id'];

        $i++;

        ?>      


    <tr>

    <td><?php echo $i; ?></td>

    <td>
        <?php

        $get_customer = "select * from volunteers where customer_id='$c_id'";
        $run_customer = mysqli_query($con, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_email = $row_customer['customer_email'];
        ?>
    <a href="index.php?edit_volunteers=<?php echo $c_id; ?>" > <?php echo $customer_email;?> </a>
   
    
    </td>


    <td><?php echo $product_title; ?></td>

    <td><?php echo $status; ?>
    </td>

    </tr>

    <?php } ?>

</tbody><!-- tbody Ends -->


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

<div class="text-right" ><!-- text-right Starts -->

<a href="index.php?view_orders" >

Pogledaj i ostale <i class="fa fa-arrow-circle-right" ></i>

</a>

</div><!-- text-right Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-primary Ends -->


<div class="panel panel-primary" ><!-- panel panel-primary Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Nove organizacije

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>No</th>
<th>Naziv:</th>
<th>Mesto:</th>
<th>Slanje emaila:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

    <?php

    $i = 0;

    $get_list = "select * from organizations order by date DESC LIMIT 0,5";

    $run_list = mysqli_query($con, $get_list);

    while ($row_list = mysqli_fetch_array($run_list)) {
        $list_id = $row_list['manufacturer_id'];

        $list_title = $row_list['manufacturer_title_full'];
    
        $list_mesto = $row_list['manufacturer_mesto'];
    
        $list_email = $row_list['manufacturer_email'];
 

        $i++;

        ?>      


    <tr>

    <td><?php echo $i; ?></td>

    <td>
      <a href="index.php?edit_manufacturer=<?php echo $list_id; ?>" > <?php echo $list_title;?> </a>
    </td>

    <td><?php echo $list_mesto; ?></td>

    <td>
   <a href="mailto:<?php echo $list_email; ?>?body=<?php echo "Vaša lozinka je abc-123"; ?>"> <?php echo $list_email;?> </a>
    </td>

    </tr>

    <?php } ?>

</tbody><!-- tbody Ends -->


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

<div class="text-right" ><!-- text-right Starts -->

<a href="index.php?view_organizations" >

Pogledaj i ostale <i class="fa fa-arrow-circle-right" ></i>

</a>

</div><!-- text-right Ends -->


</div><!-- panel-body Ends -->



</div><!-- panel panel-primary Ends -->


</div><!-- col-lg-8 Ends -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="panel"><!-- panel Starts -->

<div class="panel-body"><!-- panel-body Starts -->

    <div class="thumb-info mb-md"><!-- thumb-info mb-md Starts -->

        <img src="admin_images/<?php if ($admin_image=="") {
                echo "slika.jpg";
                               } else {
                                   echo $admin_image;
                               }
                                ?>  " class="rounded img-responsive">
        <div class="thumb-info-title"><!-- thumb-info-title Starts -->

            <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>

            <span class="thumb-info-type"> <?php echo $admin_job; ?> </span>

        </div><!-- thumb-info-title Ends -->

    </div><!-- thumb-info mb-md Ends -->

    <div class="mb-md"><!-- mb-md Starts -->

        <div class="widget-content-expanded"><!-- widget-content-expanded Starts -->

            <i class="fa fa-user"></i> <span>Email: </span> <?php echo $admin_email; ?>  <br>
            <i class="fa fa-user"></i> <span>Country: </span> <?php echo $admin_country; ?>   <br>
            <i class="fa fa-user"></i> <span>Contact: </span> <?php echo $admin_contact; ?>   <br>

        </div><!-- widget-content-expanded Ends -->

        <hr class="dotted short">

        
    </div><!-- mb-md Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- 3 row Ends -->

<?php } ?>
<?php

if(!isset($_SESSION['manufacturer_email'])){

    echo "<script>window.open('../org.php','_self')</script>";
}

else {

$man_email=$_SESSION['manufacturer_email'];
$man_id=$_SESSION['manufacturer_id'];
    
?>

<div class="row"><!--  1 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <ol class="breadcrumb" ><!-- breadcrumb Starts -->

            <li class="active" >

                <i class="fa fa-dashboard"></i> Dashboard / Pozicije

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

    <div class="panel-heading" ><!-- panel-heading Starts -->

        <h3 class="panel-title" ><!-- panel-title Starts -->

            <i class="fa fa-money fa-fw" ></i> Pregled pozicije

        </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->
    

    <div class="panel-body" ><!-- panel-body Starts -->

    <div class="table-responsive" ><!-- table-responsive Starts -->

    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

        <thead>

            <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Kol.</th>
            <th>Od</th>
            <th>Do</th>
            <th>Briši</th>
            <th>Menjaj</th>

        </tr>

        </thead>

        <tbody>

        <?php

        $i = 0;

        $get_pro = "select * from products where manufacturer_id='$man_id'";

        $run_pro = mysqli_query($con,$get_pro);

        while($row_pro=mysqli_fetch_array($run_pro)){

            $pro_id = $row_pro['product_id'];

            $pro_org = $row_pro['manufacturer_id'];    

            $pro_image = $row_pro['product_img1'];

            $pro_title = $row_pro['product_title'];

            $pro_image = $row_pro['product_img1'];

            $pro_kolicina = $row_pro['product_kolicina'];

            $pro_od = $row_pro['product_od'];

            $pro_do = $row_pro['product_do'];

            $i++;

        ?>

        <tr>

        <td><?php echo $i; ?></td>

        <td><?php echo $pro_title; ?></td>

        <!--<td><img src="../admin_area/product_images/<?php //echo $pro_image; ?>" width="60" height="60"></td> -->



        <td> <?php echo $pro_kolicina; ?></td>
        <td><?php echo $pro_od; ?></td>
        <td><?php echo $pro_do; ?></td>
        <td>

        <a href="index.php?delete_product=<?php echo $pro_id; ?>">

        <i class="fa fa-trash-o"> </i> 

        </a>

        </td>

        <td>

        <a href="index.php?edit_product=<?php echo $pro_id; ?>">

        <i class="fa fa-pencil"> </i> 
        </a>

        </td>

        </tr>

        <?php } ?>


        </tbody>


    </table><!-- table table-bordered table-hover table-striped Ends -->

    </div><!-- table-responsive Ends -->

    </div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>

<center><!-- center Starts -->

    <h1> Lista želja </h1>

    <p class="lead"> Sve vaše želje na jednom mestu. </p>

</center><!-- center Ends -->

<hr>

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->

<thead>

    <tr>

        <th> Broj: </th>

        <th> Pozicija </th>
        
        <th> Status </th>

        <th> Izbriši želju </th>

    </tr>

</thead>

<tbody>

    <?php


    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from volunteers where customer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];

    $i = 0;


    $get_wishlist = "select * from wishlist where customer_id='$customer_id'";

    $run_wishlist = mysqli_query($con,$get_wishlist);

    while($row_wishlist = mysqli_fetch_array($run_wishlist)){

        $wishlist_id = $row_wishlist['wishlist_id'];

        $product_id = $row_wishlist['product_id'];
        
        $status= $row_wishlist['status'];

        $get_products = "select * from products where product_id='$product_id'";

        $run_products = mysqli_query($con,$get_products);

        $row_products = mysqli_fetch_array($run_products);

            $product_title = $row_products['product_title'];

            $product_url = $row_products['product_url'];

            $product_img1 = $row_products['product_img1'];

        $i++;

        ?>

        <tr>

        <td width="100" style="vertical-align:middle" > <?php echo $i; ?> </td>

        <td style="vertical-align:middle" >

            <img src="../admin_area/product_images/<?php echo $product_img1; ?>" width="60" height="60">

            &nbsp;&nbsp;&nbsp; 

            <a href="../pozicija-<?php echo $product_url; ?>">

                <?php echo $product_title; ?>

            </a>

        </td>
        
        <td style="vertical-align:middle" >
            <?php  if ($status==""){
                echo "Na obradi";
            }else{
                echo $status; }?>
        </td>

        <td style="vertical-align:middle" >

            <a href="index.php?delete_wishlist=<?php echo $wishlist_id; ?>" class="btn btn-primary">

                <i class="fa fa-trash-o"> </i> Izbriši

            </a>

        </td>

        </tr>

    <?php } ?>

    </tbody>

</table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->
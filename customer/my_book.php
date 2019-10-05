<div class="panel-heading">
    <h1> MOJA VOLONTERSKA KNJIŽICA </h1>
</div>
<div class="panel-body">
<div class="table-responsive"><!-- table-responsive Starts -->

    <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->

        <thead>

        <tr>

            <th> Broj: </th>

            <th> Pozicija </th>

            <th> Sati </th>

            <th> Status </th>

            <th>&nbsp;</th>

        </tr>

        </thead>

        <tbody>

        <?php


        $customer_session = $_SESSION['customer_email'];

        $get_customer = "select * from volunteers where customer_email='$customer_session'";

        $run_customer = mysqli_query($con, $get_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];

        $i = 0;


        $get_wishlist = "select * from wishlist where customer_id='$customer_id' AND status='Prihvaćen'";

        $run_wishlist = mysqli_query($con, $get_wishlist);

        while ($row_wishlist = mysqli_fetch_array($run_wishlist)) {
            $wishlist_id = $row_wishlist['wishlist_id'];

            $product_id = $row_wishlist['product_id'];

            $hours = $row_wishlist['hours'];

            $hours_approved = $row_wishlist['hours_approved'];

            $get_products = "select * from products where product_id='$product_id'";

            $run_products = mysqli_query($con, $get_products);

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
                    <?php  if ($hours==0) : ?>
                        <a href="index.php?my_book_manage&wishlist_id=<?php echo $wishlist_id ?>">
                            <i class="fa fa-plus"></i>
                            Unesi
                        </a>
                    <?php else : ?>
                        <?php echo $hours;?>
                    <?php endif ?>
                </td>

                <td style="vertical-align:middle" >
                    <?php if ($hours) : ?>
                        <?php  if (is_null($hours_approved)) {
                            echo "U obradi";
                        } else {
                            echo $hours_approved ? 'Prihvaćen' : 'Odbijeno';
                        }?>
                    <?php endif ?>
                </td>

                <td style="vertical-align:middle" >
                    <?php if ($hours_approved) : ?>
                        <a class="btn btn-sm btn-default">
                            <i class="fa fa-download"></i>
                            PDF
                        </a>
                    <?php else : ?>
                        <a href="index.php?my_book_manage&wishlist_id=<?php echo $wishlist_id ?>">
                            <i class="fa fa-pencil"></i>
                            Izmeni
                        </a>
                    <?php endif ?>
                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->
</div>
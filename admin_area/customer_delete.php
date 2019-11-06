<?php


if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $delete_customer = "delete from volunteers where customer_id='$delete_id'";

         $select_customer = "select * from volunteers where customer_id='$delete_id'";
         $run_select = mysqli_query($con, $select_customer);
         $row = mysqli_fetch_array($run_select);
        $image1= $row["customer_image"];
        $file="../customer/customer_images" ."/". $image1;


        $delete_wishlist = "delete from wishlist where wishlist_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_customer);

        if ($run_delete) {
            $run_delete_wishlist = mysqli_query($con, $delete_wishlist);

            if (file_exists($file)) {
                unlink($file);
            }

            echo "<script>alert('Customer Has Been Deleted')</script>";

            echo "<script>window.open('index.php?path=view_customers','_self')</script>";
        }
    }


    ?>




<?php }

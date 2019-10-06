<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $delete_order = "delete from wishlist where wishlist_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_order);

        if ($run_delete) {
            echo "<script>alert('Order Has Been Deleted')</script>";

            echo "<script>window.open('index.php?path=view_orders','_self')</script>";
        }
    }
}
?>
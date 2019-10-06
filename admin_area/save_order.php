<?php

session_start();

include('includes/db.php');

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_POST)) {
        $wishlist = $_POST; 
        $query = "UPDATE wishlist SET hours = ".intval($wishlist['hours']).", hours_approved = ".intval(boolval($wishlist['hours_approved']))." WHERE wishlist_id = ".$wishlist['id']; 
        $run = mysqli_query($con, $query);

        if ($run) {
            echo "<script>window.open('index.php?path=view_orders_hours','_self')</script>";
        } else {
            echo "Upit nije prosao";
        }
    }
}
?>
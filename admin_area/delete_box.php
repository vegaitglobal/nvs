<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $delete_box = "delete from boxes_section where box_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_box);

        if ($run_delete) {
            echo "<script>alert('One Box Has Been Deleted')</script>";

            echo "<script>window.open('index.php?path=view_boxes','_self')</script>";
        }
    }


    ?>


<?php }

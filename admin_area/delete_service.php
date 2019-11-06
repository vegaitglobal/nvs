<?php


if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $delete_service = "delete from services where service_id='$delete_id'";

        $select_ser = "select * from services where service_id='$delete_id'";

        $run_select_ser = mysqli_query($con, $select_ser);

        while ($row = mysqli_fetch_array($run_select_ser)) {
            $image= $row["service_image"];
            $file="../admin_area/services_images" ."/". $image;

            if (file_exists($file)) {
                 unlink($file);
            }
        }


        $run_delete = mysqli_query($con, $delete_service);

        if ($run_delete) {
            echo "<script>alert('One Service column Has Been Deleted')</script>";

            echo "<script>window.open('index.php?path=view_services','_self')</script>";
        }
    }

    ?>


<?php }

<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $delete_slide = "delete from slider where slide_id='$delete_id'";

         $select = "select * from slider where slide_id='$delete_id'";

        $run_select = mysqli_query($con, $select);

        while ($row = mysqli_fetch_array($run_select)) {
            $image= $row["slide_image"];
            $file="../admin_area/slides_images" ."/". $image;

            if (file_exists($file)) {
                 unlink($file);
            }
        }


        $run_delete = mysqli_query($con, $delete_slide);

        if ($run_delete) {
            echo "<script>alert('Slajd je izbrisan')</script>";

            echo "<script>window.open('index.php?path=view_slides','_self')</script>";
        }
    }




    ?>



<?php }

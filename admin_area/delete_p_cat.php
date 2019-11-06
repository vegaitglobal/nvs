<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_p_cat_id = $_GET['id'];

        $delete_p_cat = "delete from product_categories where p_cat_id='$delete_p_cat_id'";

        $select_p_cat = "select * from product_categories where p_cat_id='$delete_p_cat_id'";

        $select_pro = "select * from products where p_cat_id='$delete_p_cat_id'";

        $delete_pro = "delete from products where p_cat_id='$delete_p_cat_id'";

        $run_select_pro = mysqli_query($con, $select_pro);

        while ($row = mysqli_fetch_array($run_select_pro)) {
            $wish=  $row["product_id"];
            $select_wish = "delete from wishlist where product_id='$wish'";
            $run_delete_wish = mysqli_query($con, $select_wish);


            $image1= $row["product_img1"];
            $image2= $row["product_img2"];
            $image3= $row["product_img3"];


             $file="../admin_area/product_images" ."/". $image1;

            if (file_exists($file)) {
                 unlink($file);
            } else {
            }


             $file2="../admin_area/product_images" ."/". $image2;

            if (file_exists($file2)) {
                 unlink($file2);
            } else {
            }


            $file3="../admin_area/product_images" ."/". $image3;


            if (file_exists($file3)) {
                 unlink($file3);
            } else {
            }
        }


        $run_delete_pro = mysqli_query($con, $delete_pro);


        $run_select = mysqli_query($con, $select_p_cat);

        while ($row = mysqli_fetch_array($run_select)) {
            $image1= $row["p_cat_image"];
                $file="../admin_area/other_images" ."/". $image1;

            if (file_exists($file)) {
                 unlink($file);
            }
        }


        $run_delete = mysqli_query($con, $delete_p_cat);

        if ($run_delete) {
            echo "<script>alert('Program je izbrisan')</script>";

            echo "<script>window.open('index.php?path=view_p_cats','_self')</script>";
        }
    }



    ?>



<?php }

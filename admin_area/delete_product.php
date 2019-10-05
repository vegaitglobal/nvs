<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['delete_product'])) {
        $delete_id = $_GET['delete_product'];

        $delete_pro = "delete from products where product_id='$delete_id'";
    
        $select_pro = "select * from products where product_id='$delete_id'";
    
    
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
                   
            if (!empty($image2)) {
                  $file2="../admin_area/product_images" ."/". $image2;
           
                if (file_exists($file2)) {
                    unlink($file2);
                } else {
                }
            }
    
            $file3="../admin_area/product_images" ."/". $image3;
            
            
            if (!empty($image3)) {
                if (file_exists($file3)) {
                    unlink($file3);
                } else {
                }
            }
        }
 

        $run_delete = mysqli_query($con, $delete_pro);

        if ($run_delete) {
            echo "<script>alert('Pozicija je izbrisana')</script>";

            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }

    ?>

<?php }

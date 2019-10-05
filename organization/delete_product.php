<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
    $man_email=$_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
    ?>
   <center>

    <h1>Da li stvarno želite izbrisati poziciju?!</h1>

    <form action="" method="post">

        <input class="btn btn-danger" type="submit" name="yes" value="Da, hoću">

        <input class="btn btn-primary" type="submit" name="no" value="Ne, neću">

    </form>

    </center>
    

    <?php
    if (isset($_POST['yes'])) {
        if (isset($_GET['delete_product'])) {
            $delete_id = $_GET['delete_product'];
    
            $select_cat = "select * from products where product_id='$delete_id'";

            $delete_pro = "delete from products where product_id='$delete_id'";
    
            $select_wish = "delete from wishlist where product_id='$delete_id'";
        
            $run_delete = mysqli_query($con, $select_wish);
            
        
            $run_select1 = mysqli_query($con, $select_cat);
    
            while ($row = mysqli_fetch_array($run_select1)) {
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
            $run_delete = mysqli_query($con, $delete_pro);

            if ($run_delete) {
                   echo "<script>window.open('index.php?view_products','_self')</script>";
            }
        }
    }
    
    if (isset($_POST['no'])) {
          echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
} ?>
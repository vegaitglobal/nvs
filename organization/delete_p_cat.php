<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
    $man_email=$_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
    ?>
   <center>

    <h1>Da li stvarno želite izbrisati program?!</h1>
    <h2>S tim ćete izbrisati i sve pozicije povezane sa programom!</h> 
    <form action="" method="post">

        <input class="btn btn-danger" type="submit" name="yes" value="Da, hoću">

        <input class="btn btn-primary" type="submit" name="no" value="Ne, neću">

    </form>

    </center>
    
    <?php
    if (isset($_POST['yes'])) {
        if (isset($_GET['delete_p_cat'])) {
            $delete_p_cat_id = $_GET['delete_p_cat'];

       
            $select_cat = "select * from products where p_cat_id='$delete_p_cat_id'";
            $delete_cat = "delete from products where p_cat_id='$delete_p_cat_id'";
        
            $select_wish = "delete from wishlist where product_id='$delete_p_cat_id'";
        
            $run_delete = mysqli_query($con, $select_wish);
        
            $run_select1 = mysqli_query($con, $select_cat);
    
            while ($row = mysqli_fetch_array($run_select1)) {
                $image1= $row["product_img1"];
                $image2= $row["product_img2"];
                $image3= $row["product_img3"];
              
        
                 $file="../admin_area/product_images" ."/". $image1;
                 
                if (file_exists($file)) {
                     unlink($file);
                }
            
                 $file2="../admin_area/product_images" ."/". $image2;
           
                if (file_exists($file2)) {
                     unlink($file2);
                }
            
    
                $file3="../admin_area/product_images" ."/". $image3;
            
            
                if (file_exists($file3)) {
                    unlink($file3);
                }
            }


            $run_delete1 = mysqli_query($con, $delete_cat);

   
            $delete_p_cat = "delete from product_categories where p_cat_id='$delete_p_cat_id'";
            $select_p_cat = "select * from product_categories where p_cat_id='$delete_p_cat_id'";
            $run_select = mysqli_query($con, $select_p_cat);
        
      
            while ($row = mysqli_fetch_array($run_select)) {
                $image1= $row["p_cat_image"];
                $file="../admin_area/other_images" ."/". $image1;
            
                if (file_exists($file)) {
                     unlink($file);
                }
            }

            $run_delete2 = mysqli_query($con, $delete_p_cat);

            if ($run_delete2) {
                echo "<script>window.open('index.php?view_p_cats','_self')</script>";
            }
        }
    }
    
    if (isset($_POST['no'])) {
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
} ?>
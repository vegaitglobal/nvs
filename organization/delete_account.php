<?php

if(!isset($_SESSION['manufacturer_email'])){

    echo "<script>window.open('../org.php','_self')</script>";

}

else {
    
    $c_email = $_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
?>
<center>

    <h1>Do You Reaaly Want To Delete Your Account!</h1>

    <form action="" method="post">

        <input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">

        <input class="btn btn-primary" type="submit" name="no" value="No, I Don,t want to delete">

    </form>

</center>

<?php

$c_email = $_SESSION['manufacturer_email'];

if(isset($_POST['yes'])){


   if($man_id==""){
        $select_man = "select * from organizations where manufacturer_email='$c_email'";
        $run_select_man = mysqli_query($con,$select_man);
        $row_man = mysqli_fetch_array($run_select_man);
        $man_id = $row_man['p_man_id'];
       }
       
        $select_cat = "select * from products where manufacturer_id='$man_id'";
        $delete_cat = "delete from products where manufacturer_id='$man_id'";
        
        $run_select1 = mysqli_query($con,$select_cat);
    
        while($row = mysqli_fetch_array($run_select1)){         
            
         $wish=  $row["product_id"];
         $select_wish = "delete from wishlist where product_id='$wish'";
         $run_delete_wish = mysqli_query($con,$select_wish);   
             
            
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


        $run_delete1 = mysqli_query($con,$delete_cat);

            
        $delete_p_cat = "delete from product_categories where p_man_id='$man_id'";
        $select_p_cat = "select * from product_categories where p_man_id='$man_id'";
        $run_select = mysqli_query($con,$select_p_cat);
        
      
        while($row = mysqli_fetch_array($run_select)){         
            
            $image1= $row["p_cat_image"];
                $file="../admin_area/other_images" ."/". $image1;
            
            if (file_exists($file)) {
                 unlink($file);
            } 
       
        }

        $run_delete2 = mysqli_query($con,$delete_p_cat);

    
    $delete_org = "delete from organizations where manufacturer_email='$c_email'";
    $select_org = "select * from organizations where manufacturer_id='$man_id'";
    $row_man = mysqli_fetch_array($con,$select_org);
            $image= $row["manufacturer_image"];
            $file="../admin_area/other_images" ."/". $image;
            
            if (file_exists($file)) {
                 unlink($file);
            } 
    
    $run_delete = mysqli_query($con,$delete_org);

    if($run_delete){

        session_destroy();

        echo "<script>alert('Your Account Has Been Deleted! Good By')</script>";

        echo "<script>window.open('../index.php','_self')</script>";

    }

}

if(isset($_POST['no'])){

echo "<script>window.open('index.php?dashboard','_self')</script>";

}

}
?>
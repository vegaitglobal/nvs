<?php

session_start();

include("includes/db.php");                       

include("functions/functions.php");                

$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

    echo "<script> window.open('index.php','_self') </script>";

}
else{


$row_product = mysqli_fetch_array($run_product);


$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_kolicina = $row_product['product_kolicina'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3']; 

$pro_label = $row_product['product_label'];


$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];

$pro_od = $row_product['product_od'];
    
$pro_do = $row_product['product_do'];
    
$pro_lokacija = $row_product['product_lokacija'];

if($pro_label == ""){

    $product_label = "";
}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}


?>

<!DOCTYPE html>
<html lang="sr-SP">

<head>
<title>NVS </title>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content=" Novosadski volonterski Servis" />
<meta name="keywords" content="nvs, volontiranje"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
 
   <link rel="stylesheet" title="" type="text/css" href="styles/dropmenu.css" media="all" />  
   <link rel="stylesheet" title="" type="text/css" href="styles/header.css" media="all" /> 
   
      
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    
<link rel="stylesheet" title="" type="text/css" href="styles/footer.css" media="all" />

<script src="js/jquery-3.3.1.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</head>

<body>

<?php include("nav.php");?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->


<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="row" id="productMain"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

    <div id="mainImage"><!-- mainImage Starts -->

          <div class="item active">
            <center>
                <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
            </center>
        </div>

    </div><!-- mainImage Ends -->

    <?php echo $product_label; ?>

</div><!-- col-sm-6 Ends -->


<div class="col-sm-6" ><!-- col-sm-6 Starts -->

<div class="box" ><!-- box Starts -->

    <h1 class="text-center" > <?php echo $pro_title; ?> </h1>

    

    <form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->


    <center><!-- center Starts -->

    <?php

    $get_icons = "select * from icons where icon_product='$pro_id'";

    $run_icons = mysqli_query($con,$get_icons);

    while($row_icons = mysqli_fetch_array($run_icons)){

        $icon_image = $row_icons['icon_image'];

        echo "<img src='admin_area/icon_images/$icon_image' width='45' height='45' > &nbsp;&nbsp;&nbsp; ";

    }

    ?>

    </center><!-- center Ends -->

    <?php

    echo "<p class='price'> Ukupno potrebno volontera : $pro_kolicina </p>";
    ?>

    <p class="text-center buttons" ><!-- text-center buttons Starts -->


    <button class="btn btn-primary" type="submit" name="add_wishlist">Prijavi se</button>


    <?php

    if(isset($_POST['add_wishlist'])){

        if(!isset($_SESSION['customer_email'])){

            echo "<script>alert('Morate biti prijavljeni da bi ste konkurisali za volontersku poziciju')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";

        }
        else{

            $customer_session = $_SESSION['customer_email'];

            $get_customer = "select * from volunteers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con,$get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id']; 
            $customer_name = $row_customer['customer_name']; 
            $customer_city = $row_customer['customer_city']; 
            $c_email = $row_customer['customer_email']; 

            $select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

            $run_wishlist = mysqli_query($con,$select_wishlist);

            $check_wishlist = mysqli_num_rows($run_wishlist);

                if($check_wishlist == 1){

                    echo "<script>alert('Već ste se jednom prijavili')</script>";

                    echo "<script>window.open('ponuda-$pro_url','_self')</script>";

                }
                else{

                   $get_status = "select status from products where product_url='$product_id'";

                    $run_status = mysqli_query($con,$get_status);

                    $check_status = mysqli_num_rows($run_status);

                    $row_status = mysqli_fetch_array($run_status);

                    $active = $row_status['status'];

                        if($active=="active"){

                            $ip_add = getRealUserIp();
                            $insert_wishlist = "insert into wishlist (customer_id,product_id,ip_add) values ('$customer_id','$pro_id','$ip_add')";

                            $run_wishlist = mysqli_query($con,$insert_wishlist);

                            if($run_wishlist){
                                
                                    $subject = "Hvala što ste se prijavili na  $pro_title";

                                    $from = "office@nvs.rs";

                                    $message = "

                                    <h2> Hvala vam što ste se prijavili na  $pro_title, svi prijavljeni će biti kontaktirani putem elektronske pošte nakon isteka roka za prijavu. </h2> 
                                    
                                    ";

                                    $headers = "From: $from \r\n";
                                    $headers .= "Reply-To: $from \r\n";
                                    $headers .= "Return-Path: $from \r\n";
                                    $headers .= "Content-type: text/html \r\n";

                                    mail($c_email,$subject,$message,$headers);
                                
                                    $from = "office@nvs.rs";
                                    $nvs_email = "office@nvs.rs";
                                    $nvs_subject = "NOVA PRIJAVA";
                                    $nvs_message= "  <h2>Prijavio/la se : $customer_name, iz $customer_city na  $pro_title </h2> 
                                    <br>
                                    <br>
                                     <h3><a href='https://www.nvs.rs/admin_area'>Administriranje</a> </h3>
                                    ";
                                    $nvs_headers = "From: $from \r\n";
                                    $nvs_headers .= "Reply-To: $from \r\n";
                                    $nvs_headers .= "Return-Path: $from \r\n";
                                    $nvs_headers .= "Content-type: text/html \r\n";
                                    
                                    mail($nvs_email,$nvs_subject,$nvs_message,$nvs_headers);

                                echo "<script> alert('Dodato') </script>";

                                echo "<script>window.open('ponuda-$pro_url','_self')</script>";

                            }
                        }
                        else {
                            echo "<script> alert('Nazalost na ova pozicija vise nije aktuelna') </script>";

                            echo "<script>window.open('shop.php','_self')</script>";
                        }
                }

            }

    }

    ?>

    </p><!-- text-center buttons Ends -->

    </form><!-- form-horizontal Ends -->

</div><!-- box Ends -->


<div class="row" id="thumbs" ><!-- row Starts -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

     <a class="btn btn-primary" href="<?php if (!empty($pro_img1)) {echo "admin_area/product_images/".$pro_img1;} ?>">
   Slika
    </a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

    <a class="btn btn-primary" href="<?php if (!empty($pro_img2)) {echo "admin_area/product_images/".$pro_img2;} ?>">
   Prilog 1 
    </a>


</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

    <a class="btn btn-primary" href="<?php if (!empty($pro_img3)) {echo "admin_area/product_images/".$pro_img3;} ?>">
   Prilog 2
    </a>

</div><!-- col-xs-4 Ends -->


</div><!-- row Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

<div class="box" id="details"><!-- box Starts -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#description" data-toggle="tab"><!-- btn btn-primary tab Starts -->

<?php

if($status == "product"){

    echo "Opis pozicije";

}
else{

    echo "Pozicija";

}

?>

</a><!-- btn btn-primary tab Ends -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#features" data-toggle="tab"><!-- btn btn-primary tab Starts -->

Karakteristike

</a><!-- btn btn-primary tab Ends -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#video" data-toggle="tab"><!-- btn btn-primary tab Starts -->

Video

</a><!-- btn btn-primary tab Ends -->

<hr style='border-top: 1px solid #F78715;box-shadow: 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(247, 135, 21, 1);'>

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active" style="margin-top:7px;" ><!-- description tab-pane fade in active Starts -->

<?php echo $pro_desc; ?>

</div><!-- description tab-pane fade in active Ends -->

<div id="features" class="tab-pane fade in" style="margin-top:7px;" ><!-- features tab-pane fade in  Starts -->

<?php echo $pro_features; ?>

</div><!-- features tab-pane fade in  Ends -->

<div id="video" class="tab-pane fade in" style="margin-top:7px;" ><!-- video tab-pane fade in Starts -->

<?php echo $pro_video; ?>

</div><!-- video tab-pane fade in  Ends -->


</div><!-- tab-content Ends -->

</div><!-- box Ends -->

<div id="row same-height-row"><!-- row same-height-row Starts -->

<?php

if($status == "active"){



?>

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<div class="box same-height headline"><!-- box same-height headline Starts -->

<h3 class="text-center"> Pogledajte i ove volonterske pozicije </h3>

</div><!-- box same-height headline Ends -->

</div><!-- col-md-3 col-sm-6 Ends -->

<?php

$get_products = "select * from products where status='active' order by rand() LIMIT 0,3";

$run_products = mysqli_query($con,$get_products); 

while($row_products = mysqli_fetch_array($run_products)) {

    $pro_id = $row_products['product_id'];

    $pro_title = $row_products['product_title'];

    $pro_kolicina = $row_products['product_kolicina'];

    $pro_img1 = $row_products['product_img1'];

    $pro_label = $row_products['product_label'];

    $manufacturer_id = $row_products['manufacturer_id'];

    $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

    $run_manufacturer = mysqli_query($db,$get_manufacturer);

    $row_manufacturer = mysqli_fetch_array($run_manufacturer);

    $manufacturer_name = $row_manufacturer['manufacturer_title'];


    $pro_url = $row_products['product_url'];

    if($pro_label == ""){
        $product_label = "";

    }
    else{

    $product_label = "

    <a class='label sale' href='#' style='color:black;'>

    <div class='thelabel'>$pro_label</div>

    <div class='label-background'> </div>

    </a>

    ";

    }


    echo "

    <div class='col-md-3 col-sm-6 center-responsive' >

    <div class='product' >

    <a href='ponuda-$pro_url' >

    <img src='admin_area/product_images/$pro_img1' class='img-responsive' >

    </a>

    <div class='text' >

    <center>

    <p class='btn btn-primary'> $manufacturer_name </p>

    </center>

    <hr>

    <h3><a href='ponuda-$pro_url' >$pro_title</a></h3>

    <!-- <p class='price' > $pro_kolicina </p> -->

    <p class='buttons' >

    <a href='ponuda-$pro_url' class='btn btn-default' >Detalji</a>

    <a href='ponuda-$pro_url' class='btn btn-primary'>

    </i> Prijavi se

    </a>


    </p>

    </div>

    $product_label


    </div>

    </div>

    ";


}


?>

<?php } ?>

</div><!-- row same-height-row Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

</body>
</html>

<?php } ?>

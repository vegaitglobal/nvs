<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

if ($check_product == 0) {
    echo "<script> window.open('index.php','_self') </script>";
} else {
    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

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

    if ($pro_label == "") {
        $product_label = "";
    } else {
        $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
    }

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];




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


    <?php

    echo "<p class='price'> Ukupno potrebno volontera : $pro_kolicina </p>";
    ?>

    <br>
    


</div><!-- box Ends -->


<div class="row" id="thumbs" ><!-- row Starts -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

     <a class="btn btn-primary" href="<?php if (!empty($pro_img1)) {
            echo "admin_area/product_images/".$pro_img1;
                                      } ?>">
   Slika
    </a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

    <a class="btn btn-primary" href="<?php if (!empty($pro_img2)) {
        echo "admin_area/product_images/".$pro_img2;
                                     } ?>">
   Prilog 1 
    </a>


</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

    <a class="btn btn-primary" href="<?php if (!empty($pro_img3)) {
        echo "admin_area/product_images/".$pro_img3;
                                     } ?>">
   Prilog 2
    </a>

</div><!-- col-xs-4 Ends -->


</div><!-- row Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

<div class="box" id="details"><!-- box Starts -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#description" data-toggle="tab"><!-- btn btn-primary tab Starts -->

    <?php

    if ($status == "product") {
        echo "Opis pozicije";
    } else {
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



</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



    <?php

    include("includes/footer.php");

    ?>


</body>
</html>

<?php } ?>

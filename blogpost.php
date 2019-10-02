<?php

session_start();

include("includes/db.php");                       

include("functions/functions.php");                

$product_id = @$_GET['pro_id'];

$get_product = "select * from posts where post_url='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

    echo "<script> window.open('index.php','_self') </script>";

}
else{


$row_product = mysqli_fetch_array($run_product);

$pro_cat_id = $row_product['post_cat_id'];

$pro_id = $row_product['post_id'];

$pro_title = $row_product['post_title'];

$pro_content = $row_product['post_content'];

$pro_img1 = $row_product['post_image'];

$pro_date = $row_product['post_date'];

$pro_user = $row_product['post_user']; 

$pro_label = $row_product['post_tags'];

$status = $row_product['post_status'];

$pro_url = $row_product['post_url'];


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

$get_cat = "select * from categories where cat_id='$pro_cat_id'";

$run_cat = mysqli_query($con,$get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_title = $row_cat['cat_title'];

?>

<!DOCTYPE html>

<html lang="sr-SP">

<head>

<title>NVS</title>

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
<!-- <script id="dsq-count-scr" src="//nvs-rs.disqus.com/count.js" async></script> -->
<body>

<?php
include("nav.php");
?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

        <div class="col-md-12" ><!--- col-md-12 Starts -->

        <ul class="breadcrumb" ><!-- breadcrumb Starts -->

            <li><a href="index.php">Početna</a></li>
            
            <li><a href="blog.php">Blogovi</a></li>

            <li> <?php echo $pro_title; ?> </li>


        </ul><!-- breadcrumb Ends -->

    </div><!--- col-md-12 Ends -->


    <div class="col-md-12" ><!-- col-md-12 Starts -->

    <div class="post" ><!-- box Starts -->

    
    <h1> <?php echo $pro_title; ?> </h1>
<br>
    <div class="image tocentar">
              <img style="display: block; margin-left: auto; margin-right: auto;" src="admin_area/blogs_images/<?php echo $pro_img1; ?>"  alt='Slika' class='img-responsive'>
    </div>
<br>
   <div class="post-content biggertext">
        <p> <?php echo $pro_content; ?> </p>
    </div>
   <br> 
    <!--  <div class="box" style="padding:50px;">
    <!-- disqus 
          <div id="disqus_thread"></div>
            <script>

                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://nvs-rs.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>  
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
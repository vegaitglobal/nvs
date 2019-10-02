<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

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

<body>
<?php
include("nav.php");
?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box-beli" ><!-- box Starts -->

<?php

$get_about_us = "select * from about_us";

$run_about_us = mysqli_query($con,$get_about_us);

$row_about_us = mysqli_fetch_array($run_about_us);

$about_heading = $row_about_us['about_heading'];

$about_short_desc = $row_about_us['about_short_desc'];

$about_desc = $row_about_us['about_desc'];

?>

<h1> <?php echo $about_heading; ?> </h1>

<p class="lead"> <?php echo $about_short_desc; ?> </p>

<p> <?php echo $about_desc; ?> </p>

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

</body>
</html>
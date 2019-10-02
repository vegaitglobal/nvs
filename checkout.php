<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

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

<div class="col-md-12" ><!-- col-md-12 Starts -->


<?php



if(!isset($_SESSION['customer_email'])){

    include("customer/customer_login.php");


}else{

    echo "<script> window.open('index.php','_self') </script>";

 }



?>


</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>


</body>
</html>
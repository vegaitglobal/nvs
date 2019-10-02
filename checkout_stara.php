<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>NVS </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>


<?php include("nav.php");?> 

    <div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

    <ul class="breadcrumb" ><!-- breadcrumb Starts -->

        <li>
            <a href="index.php">Početna</a>
        </li>

        <li>Registruj se</li>

    </ul><!-- breadcrumb Ends -->

</div><!--- col-md-12 Ends -->


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

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
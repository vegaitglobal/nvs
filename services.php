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

    include("nav.php")

?>



<div id="content" ><!-- content Starts -->

<div class="container-fluid" ><!-- container Starts -->

<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="services row"><!-- services row Starts -->

<?php

$get_services = "select * from services";

$run_services = mysqli_query($con,$get_services);

while($row_services = mysqli_fetch_array($run_services)){

$service_id = $row_services['service_id'];

$service_title = $row_services['service_title'];

$service_image = $row_services['service_image'];

$service_desc = $row_services['service_desc'];

$service_button = $row_services['service_button'];

$service_url = $row_services['service_url'];

?>

<div class="col-md-4 col-sm-6 box-beli"><!-- col-md-4 col-sm-6 box Starts -->

<img src="admin_area/services_images/<?php echo $service_image; ?>" class="img-responsive">

<h2 align="center"> <?php echo $service_title; ?> </h2>

<p>
<?php echo $service_desc; ?>
</p>

<center>

<a href="<?php echo $service_url; ?>" class="btn btn-primary">

<?php echo $service_button; ?>

</a>

</center>

</div><!-- col-md-4 col-sm-6 box Ends -->

<?php } ?>

</div><!-- services row Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>


</body>
</html>
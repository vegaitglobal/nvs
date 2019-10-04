<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from volunteers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_image = $row_customer['customer_image'];

$customer_name = $row_customer['customer_name'];

if(!isset($_SESSION['customer_email'])){


}
else {

echo "

<center>

<img src='customer_images/$customer_image' class='img-responsive'>

</center>

<br>

<h3 align='center' class='panel-title'> Prezime i ime : $customer_name </h3>

";

}

?>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->


<li class="<?php if(isset($_GET['my_wishlist'])){ echo "active"; } ?>">

<a href="index.php?my_wishlist"> <i class="fa fa-heart text-yelow py-2"></i> Moja lista želja </a>

</li>

<li class="<?php if(isset($_GET['hours'])){ echo "active"; } ?>">

<a href="index.php?hours"> <i class="fa fa-clock-o text-yelow"></i> Unos sati </a>

</li>

<li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">

<a href="index.php?edit_account"> <i class="fa fa-pencil text-yelow"></i> Ažuriraj nalog </a>

</li>

<li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">

<a href="index.php?change_pass"> <i class="fa fa-user text-yelow"></i> Promeni lozinku </a>

</li>



<li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">

<a href="index.php?delete_account"> <i class="fa fa-trash-o text-yelow"></i> Izbriši nalog </a>

</li>

<li>

<a href="logout.php"> <i class="fa fa-sign-out text-yelow"></i> Odjava </a>

</li>


</ul><!-- nav nav-pills nav-stacked Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default sidebar-menu Ends -->
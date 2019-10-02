<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / Pozicije

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Pregled pozicije

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>ID</th>
<th>Naziv</th>
<th>Slika</th>
<th>Organizacija</th>
<th>Količina</th>
<th>Od</th>
<th>Do</th>
<th>Briši</th>
<th>Menjaj</th>
<th>Arhiviraj</th>


</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_pro = "select * from products where status='active'";

$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

$pro_id = $row_pro['product_id'];
    
$pro_org = $row_pro['manufacturer_id'];    
    
$pro_image = $row_pro['product_img1'];

$pro_title = $row_pro['product_title'];

$pro_image = $row_pro['product_img1'];

$pro_kolicina = $row_pro['product_kolicina'];

$pro_od = $row_pro['product_od'];
    
$pro_do = $row_pro['product_do'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $pro_title; ?></td>

<td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>


<td>
    <?php
        $get_manufacturer = "select * from organizations where manufacturer_id='$pro_org'";

        $run_manufacturer = mysqli_query($con,$get_manufacturer);

        $row_manfacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_id = $row_manfacturer['manufacturer_id'];

        $manufacturer_title = $row_manfacturer['manufacturer_title'];

        echo $manufacturer_title;
    ?>
</td>
 
<td> <?php echo $pro_kolicina; ?></td>
<td><?php echo $pro_od; ?></td>
<td><?php echo $pro_do; ?></td>
<td>

<a href="index.php?delete_product=<?php echo $pro_id; ?>"><i class="fa fa-trash-o"></i> Brisi</a>

</td>

<td>

<a href="index.php?edit_product=<?php echo $pro_id; ?>"><i class="fa fa-pencil"> </i> Edit</a>

</td>

<td>

<a href="index.php?view_products&archive=<?php echo $pro_id; ?>"><i class="fa fa-thumb-tack"> </i> Arhiviraj</a>
 
</td>

</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Pregled arhiviranih pozicija

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>ID</th>
<th>Naziv</th>
<th>Slika</th>
<th>Organizacija</th>
<th>Količina</th>
<th>Od</th>
<th>Do</th>
<th>Briši</th>
<th>Menjaj</th>
<th>Aktiviraj</th>

</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_pro = "select * from products where status != 'active'";

$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

$pro_id = $row_pro['product_id'];
    
$pro_org = $row_pro['manufacturer_id'];    
    
$pro_image = $row_pro['product_img1'];

$pro_title = $row_pro['product_title'];

$pro_image = $row_pro['product_img1'];

$pro_kolicina = $row_pro['product_kolicina'];

$pro_od = $row_pro['product_od'];
    
$pro_do = $row_pro['product_do'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $pro_title; ?></td>

<td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>


<td>
    <?php
        $get_manufacturer = "select * from organizations where manufacturer_id='$pro_org'";

        $run_manufacturer = mysqli_query($con,$get_manufacturer);

        $row_manfacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_id = $row_manfacturer['manufacturer_id'];

        $manufacturer_title = $row_manfacturer['manufacturer_title'];

        echo $manufacturer_title;
    ?>
</td>

<td> <?php echo $pro_kolicina; ?></td>
<td><?php echo $pro_od; ?></td>
<td><?php echo $pro_do; ?></td>
<td>

<a href="index.php?delete_product=<?php echo $pro_id; ?>"><i class="fa fa-trash-o"></i> Brisi</a>

</td>

<td>

<a href="index.php?edit_product=<?php echo $pro_id; ?>"><i class="fa fa-pencil"> </i> Edit</a>

</td>

<td>

<a href="index.php?view_products&active=<?php echo $pro_id; ?>"><i class="fa fa-thumb-tack"> </i> Aktiviraj</a>
 
</td>

</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->




</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } 



if(isset($_GET['archive'])){
    
    $the_id = $_GET['archive'];
    

    $query = "UPDATE products SET status = 'archive' WHERE product_id = $the_id   ";
    $approve_query = mysqli_query($con, $query);
    echo "<script>window.open('index.php?view_products','_self')</script>";
    
    
}



if(isset($_GET['active'])){
    
    $the_id = $_GET['active'];
    
    $query = "UPDATE products SET status = 'active' WHERE product_id = $the_id   ";
    $unapprove_query = mysqli_query($con, $query);
   echo "<script>window.open('index.php?view_products','_self')</script>";
    
    
}



?>
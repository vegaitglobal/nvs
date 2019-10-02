<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard /volunteers

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Pogledaj volontere

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<button class="btn btn-success" >Export u Excel</button>
<br>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table id="table2excel" class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>No:</th>
<th>Ime:</th>
<th>Email:</th>
<th class="noExl" >Slika:</th>
<th>Država:</th>
<th>Grad:</th>
<th>Telefon:</th>
<th class="noExl" >Pogledaj:</th>
<th class="noExl" >Reset lozinke:</th>
<th class="noExl" >Briši:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i=0;

$get_c = "select * from volunteers";

$run_c = mysqli_query($con,$get_c);

while($row_c=mysqli_fetch_array($run_c)){

$c_id = $row_c['customer_id'];

$c_name = $row_c['customer_name'];

$c_email = $row_c['customer_email'];

$c_image = $row_c['customer_image'];

$c_country = $row_c['customer_country'];

$c_city = $row_c['customer_city'];

$c_contact = $row_c['customer_contact'];

$i++;




?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $c_name; ?></td>

<td><a href="mailto:<?php echo  $c_email; ?>"><?php echo  $c_email; ?></a></td>

<td class="noExl" ><img src="../customer/customer_images/<?php echo $c_image; ?>" width="60" height="60" ></td>

<td><?php echo $c_country; ?></td>

<td><?php echo $c_city; ?></td>

<td><?php echo $c_contact; ?></td>

<td class="noExl">

    <a href="index.php?edit_volunteers=<?php echo $c_id; ?>" >

        <i class="fa fa-pencil" ></i> Pogledaj

    </a>

</td>

<td class="noExl">

    <a href="index.php?customer_reset=<?php echo $c_id; ?>" >

        <i class="fa fa-pencil" ></i> Reset na 123

    </a>

</td>

<td class="noExl">

    <a href="index.php?customer_delete=<?php echo $c_id; ?>" >

        <i class="fa fa-trash-o" ></i> Delete

    </a>

</td>


</tr>

<?php } ?>


</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

 <!-- <a href="#"><button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Exportuj u Excel</button></a> 
 <button id='DLtoExcel-2'  class="btn btn-danger">Export Html Table to Excel</button>-->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 

<script>
    $("button").click(function(){
			$(function() {
				$("#table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "volonteri",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
    });
		</script>

<?php } ?>
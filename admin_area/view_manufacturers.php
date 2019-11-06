<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / organizations

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> organizations

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts --->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th> Id:</th>
<th>Organizacija:</th>
<th>Mesto</th>
<th>Adresa</th>
<th>Briši:</th>
<th>Ažuriraj:</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

    <?php

    $i = 0;

    $get_organizations = "select * from organizations";

    $run_organizations = mysqli_query($con, $get_organizations);

    while ($row_organizations = mysqli_fetch_array($run_organizations)) {
        $manufacturer_id = $row_organizations['manufacturer_id'];

        $manufacturer_title_full = $row_organizations['manufacturer_title_full'];

        $manufacturer_mesto = $row_organizations['manufacturer_mesto'];

        $manufacturer_adresa = $row_organizations['manufacturer_adresa'];

        $i++;

        ?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $manufacturer_title_full; ?></td>
<td><?php echo $manufacturer_mesto; ?></td>
<td><?php echo $manufacturer_adresa; ?></td>

<td>

<a href="index.php?path=delete_manufacturer&id=<?php echo $manufacturer_id; ?>">

<i class="fa fa-trash-o"></i> Briši

</a>

</td>

<td>

<a href="index.php?path=edit_manufacturer&id=<?php echo $manufacturer_id; ?>">

<i class="fa fa-pencil"></i> Promeni

</a>

</td>

</tr>

    <?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends --->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php } ?>
<?php



if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Pogled oblasti interesovanja

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> Oblasti

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>ID:</th>
<th>Naziv oblasti:</th>
<th>Brisanje:</th>
<th>Ažuriranje:</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

    <?php

    $i=0;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];

        $cat_title = $row_cats['cat_title'];


        $i++;



        ?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $cat_title; ?></td>


<td>

<a href="index.php?delete_cat=<?php echo $cat_id; ?>" >

<i class="fa fa-trash-o" ></i> Briši

</a>

</td>

<td>

<a href="index.php?edit_cat=<?php echo $cat_id; ?>" >

<i class="fa fa-pencil" ></i> Promeni

</a>

</td>

</tr>


    <?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table-bordered table-hover table-striped Ends -->


</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>
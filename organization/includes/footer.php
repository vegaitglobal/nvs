
<div id="footer"><!-- footer Starts -->
<div class="container"><!-- container Starts -->

<div class="row" ><!-- row Starts -->

<div class="col-md-3 col-sm-6" ><!-- col-md-3 col-sm-6 Starts -->

<h4>Stranice</h4>

<ul><!-- ul Starts -->



<li><a href="../contact.php">Contact Us</a></li>

<li><a href="../shop.php">Shop</a></li>

<li>
<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<a href='../org.php' >My Account</a>";
} else {
    echo "<a href='index.php?my_wishlist'>My Account</a>";
}


?>
</li>


</ul><!-- ul Ends -->

<hr>

<h4>Korisnički kutak</h4>

<ul><!-- ul Starts -->

<li>
<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<a href='../org.php' >Login</a>";
} else {
    echo "<a href='index.php?my_wishlist'>My Account</a>";
}


?>

</li>

<li><a href="../org_register.php">Register</a></li>

<li><a href="../terms.php"> Terms And Conditions </a></li>

</ul><!-- ul Ends -->

<hr class="hidden-md hidden-lg hidden-sm" >

</div><!-- col-md-3 col-sm-6 Ends -->

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<h4> Programi </h4>

<ul><!-- ul Starts -->

<?php

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con, $get_p_cats);

while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
    $p_cat_id = $row_p_cats['p_cat_id'];

    $p_cat_title = $row_p_cats['p_cat_title'];

    echo "<li> <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a> </li>";
}

?>


</ul><!-- ul Ends -->

<hr class="hidden-md hidden-lg">

</div><!-- col-md-3 col-sm-6 Ends -->


<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<h4>O NAMA</h4>

<p><!-- p Starts -->
<strong>NVS</strong>
<br>Katolička porta 5
<br>21101 Novi Sad
<br>0923334566931
<br>info@ns2021.rs
<br>
<strong>Novi Sad 2021-Evropska prestonica kulture</strong>

</p><!-- p Ends -->

<a href="../contact.php">Go to Contact us page</a>

<hr class="hidden-md hidden-lg">

</div><!-- col-md-3 col-sm-6 Ends -->

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<h4>Get the news</h4>

<p class="text-muted">
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
</p>

<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=computerfever', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form Starts -->

<div class="input-group"><!-- input-group Starts -->

<input type="text" class="form-control" name="email">

<input type="hidden" value="NVS" name="uri"/>
<input type="hidden" name="loc" value="en_US"/>

<span class="input-group-btn"><!-- input-group-btn Starts -->

<input type="submit" value="subscribe" class="btn btn-default">

</span><!-- input-group-btn Ends -->

</div><!-- input-group Ends -->

</form><!-- form Ends -->

<hr>

<h4> Stay in touch </h4>

<p class="social"><!-- social Starts --->

<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
<a href="#"><i class="fa fa-envelope"></i></a>

</p><!-- social Ends --->

</div><!-- col-md-3 col-sm-6 Ends -->

</div><!-- row Ends -->

</div><!-- container Ends -->
</div><!-- footer Ends -->

<div id="copyright"><!-- copyright Starts -->

<div class="container" ><!-- container Starts -->

<div class="col-md-6" ><!-- col-md-6 Starts -->

<p class="pull-left"> &copy; NVS </p>

</div><!-- col-md-6 Ends -->

<div class="col-md-6" ><!-- col-md-6 Starts -->


</div><!-- col-md-6 Ends -->

</div><!-- container Ends -->

</div><!-- copyright Ends -->








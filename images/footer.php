
<div id="footer"><!-- footer Starts -->
<div class="container"><!-- container Starts -->

<div class="row" ><!-- row Starts -->

<div class="col-md-3 col-sm-6" ><!-- col-md-3 col-sm-6 Starts -->

<h4>Novosadski volonterski servis</h4>

<ul><!-- ul Starts -->


<li><a href="contact.php">Kontakt</a></li>


</ul><!-- ul Ends -->

<hr>

<h4>Korisnički kutak</h4>

<ul><!-- ul Starts -->

<li>

<?php

if (!isset($_SESSION['customer_email'])) {
    echo "<a href='checkout.php' >Prijava</a>";
} else {
    echo "<a href='customer/index.php?my_wishlist'>Moj nalog</a>";
}


?>

</li>

<li><a href="customer_register.php">Registracija</a></li>

<li><a href="terms.php">Uslovi i pravila </a></li>



</ul><!-- ul Ends -->

<hr class="hidden-md hidden-lg hidden-sm" >

</div><!-- col-md-3 col-sm-6 Ends -->

<div class="col-md-3 col-sm-6" ><!-- col-md-3 col-sm-6 Starts -->

<div class="container" ><!-- container Starts -->
<h4>Novi Sad</h4>

                
                    <img src="images/GradNS.png" class="img-responsive" alt="">
     
</div>
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

<a href="contact.php">Kontakt</a>

<hr class="hidden-md hidden-lg">

</div><!-- col-md-3 col-sm-6 Ends -->

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<h4>Pogledajte vesti</h4>

<p class="text-muted">
Najnovije vesti za sve koje zanima volontiranje.</p>

<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=computerfever', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form Starts -->

<div class="input-group"><!-- input-group Starts -->

<input type="text" class="form-control" name="email">

<input type="hidden" value="computerfever" name="uri"/>
<input type="hidden" name="loc" value="en_US"/>

<span class="input-group-btn"><!-- input-group-btn Starts -->

<input type="submit" value="subscribe" class="btn btn-default">

</span><!-- input-group-btn Ends -->

</div><!-- input-group Ends -->

</form><!-- form Ends -->

<hr>

<h4> Budite u kontaktu </h4>

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

<p class="pull-left"> &copy; 2018 Novosadski volonterski servis </p>

</div><!-- col-md-6 Ends -->

<div class="col-md-6" ><!-- col-md-6 Starts -->

<p class="pull-right" >

<!--Template by <a href="http://www.novisad2021.rs" >novisad2021.rs</a>--->

</p>


</div><!-- col-md-6 Ends -->

</div><!-- container Ends -->

</div><!-- copyright Ends -->








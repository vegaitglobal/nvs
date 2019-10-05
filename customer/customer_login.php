
<?php

$login_failure = false;
$login_success = false;

if(isset($_POST['login'])){

    $customer_email = filter_var($_POST['c_email'], FILTER_SANITIZE_EMAIL);

    $customer_pass = escape($_POST['c_pass']);

    $select_customer = "select * from volunteers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

    $run_customer = mysqli_query($con,$select_customer);

    $check_customer = mysqli_num_rows($run_customer);


    if ($check_customer === 0) {
        $login_failure = true;
    }

    if ($check_customer === 1) {
        $_SESSION['customer_email']=$customer_email;
        $login_success = true;
    }
}

?>

<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

    <center>

        <h1>Prijava</h1>

        <p class="lead" >Registrovan korisnik</p>

    </center>

    <p class="text-muted" >
    Hvala vam što ste odlučili da se registrujete na naš sajt. Nadamo se da ćemo ispuniti vaša očekivanja. Vaše mišljenje nam je dragoceno i važnio pa nam pišite i tako nam pomozite da budemo bolji.

    </p>

</div><!-- box-header Ends -->



<form action="checkout.php" method="post" ><!--form Starts -->

    <?php if ($login_failure) : ?>
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Neuspešna prijava!</strong> Molimo, proverite email i lozinku.
        </div>
    <?php endif; ?>
    <?php if ($login_success) : ?>
        <div class="alert alert-success fade in">
            <strong>Uspešna prijava!</strong> Molimo sačekajte, učitavanje...
        </div>
        <script>setTimeout(() => window.open('customer/index.php?my_wishlist','_self'), 1200)</script>
    <?php endif; ?>


    <div class="form-group" ><!-- form-group Starts -->

        <label>Email</label>

        <input type="text" class="form-control" name="c_email" required >

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label>Lozinka</label>

        <input type="password" class="form-control" name="c_pass" required >

        <h4 align="center">

            <a href="forgot_pass.php"> Zaboravljena lozinka </a>

        </h4>

    </div><!-- form-group Ends -->

    <div class="text-center" ><!-- text-center Starts -->

        <button name="login" value="Login" class="btn btn-primary" >

            <i class="fa fa-sign-in" ></i> Prijava

        </button>

    </div><!-- text-center Ends -->


</form><!--form Ends -->

<center><!-- center Starts -->

    <a href="customer_register.php" >

        <h3>Novi korisnik? Registrujte se ovde </h3>

    </a>

</center><!-- center Ends -->


</div><!-- box Ends -->

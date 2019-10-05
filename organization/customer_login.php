<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Prijava</h1>

</center>


</div><!-- box-header Ends -->

<form action="org.php" method="post" ><!--form Starts -->

    <div class="form-group" ><!-- form-group Starts -->

        <label>Email</label>

        <input type="text" class="form-control" name="c_email" required >

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label>Lozinka</label>

        <input type="password" class="form-control" name="c_pass" required >

        <!-- <h4 align="center"> <a href="forgot_pass_org.php"> Zaboravljena lozinka </a> </h4> -->

    </div><!-- form-group Ends -->

    <div class="text-center" ><!-- text-center Starts -->

        <button name="login" value="Login" class="btn btn-primary" >

            <i class="fa fa-sign-in" ></i> Prijava

        </button>

    </div><!-- text-center Ends -->

</form><!--form Ends -->

<center><!-- center Starts -->

    <a href="contact.php" >

        <h4 align="center">Novi korisnik? Kontaktirajte nas!</h4>

    </a>

</center><!-- center Ends -->


</div><!-- box Ends -->

<?php

if (isset($_POST['login'])) {
    $manufacturer_email = escape($_POST['c_email']);

    $manufacturer_pass = escape($_POST['c_pass']);

    $select_customer = "select * from organizations where manufacturer_email='$manufacturer_email' AND manufacturer_pass='$manufacturer_pass'";

    $run_customer = mysqli_query($con, $select_customer);
    $row_man = mysqli_fetch_array($run_customer);
    $m_id = $row_man['manufacturer_id'];

    $check_customer = mysqli_num_rows($run_customer);

    
    if ($check_customer==0) {
        echo "<script>alert('Nalog ili lozinka su neispravni')</script>";

        exit();
    }

    if ($check_customer==1) {
            $_SESSION['manufacturer_email']=$manufacturer_email;
            $_SESSION['manufacturer_id']=$m_id;

        echo "<script>alert('Prijavljeni ste')</script>";

        echo "<script>window.open('organization/index.php?dashboard','_self')</script>";
    }
}

?>

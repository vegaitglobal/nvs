<div class="panel-heading">
<h1>Promena lozinke </h1>
</div>
<div class="panel-body">
    <div class="container-fluid">
<form action="" method="post"><!-- form Starts -->

    <div class="form-group"><!-- form-group Starts -->

        <label>Unesite važeću lozinku</label>

        <input type="text" name="old_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Unesite novu lozinku</label>

        <input type="text" name="new_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Unesite novu lozinku ponovo</label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div><!-- form-group Ends -->

    <div class="text-center"><!-- text-center Starts -->

        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"> </i> PROMENA LOZINKE

        </button>

    </div><!-- text-center Ends -->

</form><!-- form Ends -->
</div>
</div>
<?php

if (isset($_POST['submit'])) {
    $c_email = $_SESSION['customer_email'];

    $old_pass = escape($_POST['old_pass']);

    $new_pass = escape($_POST['new_pass']);

    $new_pass_again = escape($_POST['new_pass_again']);

    $get_customer = "select * from volunteers where customer_email='$c_email'";

    $run_customer = mysqli_query($con, $get_customer);

    $check_customer = mysqli_num_rows($run_customer);

    if ($check_customer != 0) {
        $row_customer = mysqli_fetch_array($run_customer);

        $is_correct = password_verify($old_pass, $row_customer['customer_pass']);

        if (!$is_correct && $row_customer['customer_pass'] != $old_pass) {
            echo "<script>alert('Vaša lozinka nije ispravna, pokušajte ponovo')</script>";

            exit();
        }
    }else{
        echo "<script>alert('Vaša lozinka nije ispravna, pokušajte ponovo')</script>";

        exit();
    }

    if ($new_pass!=$new_pass_again) {
        echo "<script>alert('Nova lozinka se ne poklapa')</script>";

        exit();
    }

    $hashed_password = password_hash($new_pass, PASSWORD_BCRYPT );

    $update_pass = "update volunteers set customer_pass='$hashed_password' where customer_email='$c_email'";

    $run_pass = mysqli_query($con, $update_pass);

    if ($run_pass) {
        echo "<script>alert('Uspešno ste promenili lozinku')</script>";

        echo "<script>window.open('index.php?my_wishlist','_self')</script>";
    }
}

?>

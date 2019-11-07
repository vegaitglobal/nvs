<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
    $man_email=$_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
    ?>
<h1 align="center">Promeni lozinku </h1>

<form action="" method="post"><!-- form Starts -->

    <div class="form-group"><!-- form-group Starts -->

        <label>Unesi trenutnu lozinku</label>

        <input type="text" name="old_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Unesi novu lozinku</label>

        <input type="text" name="new_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Unesi novu lozinku ponovo</label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div><!-- form-group Ends -->

    <div class="text-center"><!-- text-center Starts -->

        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"> </i> Promeni lozinku

        </button>

    </div><!-- text-center Ends -->

</form><!-- form Ends -->
    <?php

    if (isset($_POST['submit'])) {
        $c_email = $_SESSION['manufacturer_email'];

        $old_pass = escape($_POST['old_pass']);

        $new_pass = escape($_POST['new_pass']);

        $new_pass_again = escape($_POST['new_pass_again']);

        $sel_email = "select * from organizations where manufacturer_email='$c_email'";

        $run_email = mysqli_query($con, $sel_email);

        $check_email = mysqli_num_rows($run_email);

        if ($check_email !== 0) {
            $row_customer = mysqli_fetch_array($run_email);

            $is_correct = password_verify($old_pass, $row_email['manufacturer_pass']);

            if (!$is_correct && $row_email['manufacturer_pass'] != $old_pass) {
                echo "<script>alert('Niste uneli ispravnu lozinku')</script>";

                exit();
            }
        }else{
            echo "<script>alert('Niste uneli ispravnu lozinku')</script>";

            exit();
        }

        if ($new_pass!=$new_pass_again) {
            echo "<script>alert('Nova lozinka se ne poklapa')</script>";

            exit();
        }

        $hashed_password = password_hash($new_pass, PASSWORD_BCRYPT );

        $update_pass = "update organizations set manufacturer_pass='$hashed_password' where manufacturer_email='$c_email'";

        $run_pass = mysqli_query($con, $update_pass);

        if ($run_pass) {
            echo "<script>alert('Uspešno ste promenili lozinku')</script>";

            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }

    }
}
?>


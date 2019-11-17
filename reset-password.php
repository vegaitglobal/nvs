<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

require_once __DIR__.'/app/bootstrap.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>NVS</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="description" content=" Novosadski volonterski Servis" />
    <meta name="keywords" content="nvs, volontiranje"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" title="" type="text/css" href="styles/dropmenu.css" media="all" />
    <link rel="stylesheet" title="" type="text/css" href="styles/header.css" media="all" />


    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">

    <link rel="stylesheet" title="" type="text/css" href="styles/footer.css" media="all" />

    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</head>

<body>
<?php
include("nav.php");
?>

<div id="content"><!-- content Starts -->
    <div class="container"><!-- container Starts -->

        <div class="col-md-12"><!-- col-md-12 Starts -->

            <div class="box"><!-- box Starts -->

                <div align="center"><!-- center div Starts -->
                    <?php if (isset($_GET["token"]) && isset($_GET["email"]) && !isset($_POST['submit'])) {
                        $token = $_GET["token"];
                        $email = $_GET["email"];
                        $cur_date = date("Y-m-d H:i:s");

                        $get_temp_pass = "select * from password_reset_temp where token='$token' and email='$email'";

                        $run_temp_pass = mysqli_query($con, $get_temp_pass);

                        $row = mysqli_num_rows($run_temp_pass);

                        $row_temp_pass = mysqli_fetch_array($run_temp_pass);

                        if (!$row){
                            echo '<div class="alert alert-danger alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Neispravan link.</strong> Link je neispravan ili više ne važi.
                                 </div>';
                        } else {
                            $exp_date = $row_temp_pass['expDate'];
                            if($exp_date >= $cur_date){

                                $delete_temp_pass = "delete from password_reset_temp where email='$email'";

                                $run_delete = mysqli_query($con, $delete_temp_pass);

                                ?>
                                <form action="" method="post" ><!-- form Starts -->

                                    <div class="form-group"><!-- form-group Starts -->

                                        <label class="form-group-label" style="float: left;">Unesite novu lozinku</label>

                                        <input type="text" name="new_pass" class="form-control" required="">

                                    </div><!-- form-group Ends -->

                                    <div class="text-center"><!-- text-center Starts -->

                                        <button name="submit" class="btn btn-primary">

                                            PROMENA LOZINKE

                                        </button>

                                    </div><!-- text-center Ends -->

                                </form>
                            <?php
                            }
                            else{
                                echo '<div class="alert alert-danger alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        Link je istekao i više ne važi. Molimo vas da opet zatražite promenu lozinke.
                                 </div>';
                            }
                        }
                    }


                    if (isset($_POST['submit'])) {

                        $email = $_GET["email"];

                        $new_pass = escape($_POST['new_pass']);

                        $hashed_password = password_hash($new_pass, PASSWORD_BCRYPT );

                        $update_pass = "update volunteers set customer_pass='$hashed_password' where customer_email='$email'";

                        $run_pass = mysqli_query($con, $update_pass);

                        if ($run_pass) {

                            $delete_temp_pass = "delete from password_reset_temp where email='$email'";

                            $run_delete = mysqli_query($con, $delete_temp_pass);

                            echo "<script>alert('Uspešno ste promenili lozinku')</script>";

                            echo "<script>window.open('checkout.php','_self')</script>";
                        }
                    }
                    ?>
                </div><!-- center div Ends -->

            </div><!-- box Ends -->

        </div><!-- col-md-12 Ends -->

    </div><!-- container Ends -->
</div>

<?php

include("includes/footer.php");

?>

</body>
</html>

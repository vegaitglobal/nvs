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

<?php
$success = false;
if (isset($_POST['forgot_pass'])) {
    $c_email = escape($_POST['c_email']);

    $sel_c = "select * from volunteers where customer_email='$c_email'";

    $run_c = mysqli_query($con, $sel_c);

    $count_c = mysqli_num_rows($run_c);

    $row_c = mysqli_fetch_array($run_c);

    $c_name = $row_c['customer_name'];

    $c_id = $row_c['customer_id'];

    $c_pass = $row_c['customer_pass'];

    if ($count_c == 0) {
        echo "<script> alert('Žao nam je, vaš email nije u našoj evidenciji') </script>";

       // exit();
    } else {
        $token = uniqid(rand(5,15),1);

        $hours = time() + (1 * 24 * 60 * 60);
        $expDate = date("Y-m-d H:i:s", $hours);

        $insert_temp_pass = "insert into password_reset_temp (email,token,expDate) values ('$c_email','$token','$expDate')";

        $run_temp_pass = mysqli_query($con, $insert_temp_pass);
        if($run_temp_pass) {
            $from = "vojislavp@gmail.com";

            $subject = "Promena lozinke";

            $mailer->sendEmail($c_email, $subject, [
                "Zdravo $c_name, ",
                'Kliknite <a href="' . config('app_url') . '/reset-password.php?token=' . $token . '&email=' . $c_email . '">ovde</a> da biste promenili lozinku ili na link ispod:',
                '<a href="' . config('app_url') . '/reset-password.php?token=' . $token . '&email=' . $c_email . '">' . config('app_url') . '/reset-password?token=' . $token . '&email=' . $c_email . '</a>',
                '<br>Pozdrav,'
            ], $from);

            $success = true;

        }

    }
}

?>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Početna</a>
</li>

<li>Registracija</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->


<div class="col-md-12" ><!-- col-md-12 Starts -->


<?php if($success){
    echo '<div class="alert alert-success fade in">
          Poslali smo link za kreiranje nove lozinke na vaš email.
          </div>';
    } else{ ?>
<div class="box"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<center>

<h3> Unesite vašu Email adresu, mi ćemo vam poslati link za kreiranje nove lozinke</h3>

</center>

</div><!-- box-header Ends -->

<div align="center"><!-- center div Starts -->

<form action="" method="post"><!-- form Starts -->

<input type="text" class="form-control" name="c_email" placeholder="Unesite vaš Email">

<br>

<input type="submit" name="forgot_pass" class="btn btn-primary" value="Send My Password">

</form><!-- form Ends -->

</div><!-- center div Ends -->

</div><!-- box Ends -->
    <?php } ?>
</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>



</body>
</html>


<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

require_once __DIR__.'/app/bootstrap.php';

?>
<!DOCTYPE html>

<html lang="sr-SP">

<head>

<title>NVS</title>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content=" Novosadski volonterski Servis" />
<meta name="keywords" content="nvs, volontiranje, kontakt"/>
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

    include("nav.php")

?>




<div id="content" ><!-- content Starts -->

<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

    <center><!-- center Starts -->

        <?php

        $get_contact_us = "select * from contact_us";

        $run_conatct_us = mysqli_query($con, $get_contact_us);

        $row_conatct_us = mysqli_fetch_array($run_conatct_us);

        $contact_heading = $row_conatct_us['contact_heading'];

        $contact_desc = $row_conatct_us['contact_desc'];

        $contact_email = $row_conatct_us['contact_email'];

        ?>

        <h2> <?php echo $contact_heading; ?> </h2>

        <p class="text-muted" >
            <?php echo $contact_desc; ?>
        </p>

    </center><!-- center Ends -->

</div><!-- box-header Ends -->

<form action="contact.php" method="post" ><!-- form Starts -->

    <div class="form-group" ><!-- form-group Starts -->

        <label>Ime i prezime</label>

        <input type="text" class="form-control" name="name" required>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label>Email</label>

        <input type="text" class="form-control" name="email" required>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label> Tema </label>

        <input type="text" class="form-control" name="subject" required>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label> Poruka </label>

        <textarea class="form-control" name="message"> </textarea>

    </div><!-- form-group Ends -->



    <div class="text-center"><!-- text-center Starts -->

        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Pošalji poruku

        </button>

    </div><!-- text-center Ends -->

</form><!-- form Ends -->

<?php

if (isset($_POST['submit'])) {
// Admin receives email through this code

    $sender_name = escape($_POST['name']);

    $sender_email = escape($_POST['email']);

    $sender_subject = escape($_POST['subject']);

    $sender_message = escape($_POST['message']);

    $new_message = "

    <h1> Ovu poruku vam je poslao $sender_name </h1>

    <p> <b> Email :  </b> <br> $sender_email </p>

    <p> <b> Naslov :  </b> <br> $sender_subject </p>



    <p> <b> Poruka :  </b> <br> $sender_message </p>

    ";

    $mailer->sendEmail($contact_email, $sender_subject, [$new_message]);

    // Send email to sender through this code

    $email = $_POST['email'];

    $subject = "Dobrodošli na naš website";

    $msg = "Uskoro ćemo vam se javiti, hvala što ste nam pisali";

    $from = "vojislavp@gmail.com";

    $mailer->sendEmail($email, $subject, [$msg], $from);

    echo "<h2 align='center'>Vaša poruka je uspešno poslata</h2>";
}


?>

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>


</body>
</html>
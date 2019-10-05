<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

require_once __DIR__.'/app/bootstrap.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>NVS </title>

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

    <script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body>

<?php include("nav.php");?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

    <div class="col-md-8 col-md-offset-2  col-sm-12 col-sm-offset-0" ><!-- col-md-12 Starts -->

    <div class="box" ><!-- box Starts -->

        <div class="box-header" ><!-- box-header Starts -->

            <center><!-- center Starts -->

            <h2> Otvori novi nalog </h2>


            </center><!-- center Ends -->

        </div><!-- box-header Ends -->


    <form action="customer_register.php" method="post" enctype="multipart/form-data" ><!-- form Starts -->

        <div class="form-group" ><!-- form-group Starts -->

            <label>Prezime i ime</label>

            <input type="text" class="form-control" name="c_name" required>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label> Email</label>

            <input type="text" class="form-control" name="c_email" required>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

        <label> Lozinka </label>

            <div class="input-group"><!-- input-group Starts -->

                <span class="input-group-addon"><!-- input-group-addon Starts -->

                    <i class="fa fa-check tick1"> </i>

                    <i class="fa fa-times cross1"> </i>

                </span><!-- input-group-addon Ends -->

                <input type="password" class="form-control" id="pass" name="c_pass" required>

                <span class="input-group-addon"><!-- input-group-addon Starts -->

                    <div id="meter_wrapper"><!-- meter_wrapper Starts -->

                        <span id="pass_type"> </span>

                        <div id="meter"> </div>

                    </div><!-- meter_wrapper Ends -->

                </span><!-- input-group-addon Ends -->

            </div><!-- input-group Ends -->

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

        <label> Potvrdi lozinku </label>

            <div class="input-group"><!-- input-group Starts -->

                <span class="input-group-addon"><!-- input-group-addon Starts -->

                    <i class="fa fa-check tick2"> </i>

                    <i class="fa fa-times cross2"> </i>

                </span><!-- input-group-addon Ends -->

                <input type="password" class="form-control confirm" id="con_pass" required>

            </div><!-- input-group Ends -->

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label> Država </label>

            <input type="text" class="form-control" name="c_country" required>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label> Grad </label>

            <input type="text" class="form-control" name="c_city" required>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label> Adresa </label>

            <input type="text" class="form-control" name="c_address" required>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label> Telefon </label>

            <input type="text" class="form-control" name="c_contact" required>

        </div><!-- form-group Ends -->


         <div class="form-group"><!-- form-group Starts -->

            <label> Datum rođenja</label>

            <input type="date" class="form-control" name="datum" required>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label>Koja je tvoja omiljena izreka? </label>

            <textarea  class="form-control" name="c_desc" id="c_desc" rows="5" required></textarea>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <label>Najznačajnija znanja i veštine: </label>

            <textarea  class="form-control" name="c_vestina" id="c_vestina" rows="5" required></textarea>

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Slika (nije obavezna)</label>

            <input type="file" class="form-control" name="c_image">

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> CV (nije obavezna)</label>

            <input type="file" class="form-control" name="c_cv">

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Motivaciono pismo (nije obavezna)</label>

            <input type="file" class="form-control" name="c_motiv">

        </div><!-- form-group Ends -->

        <div class="row" style="margin-bottom:5px;">

            <div class="col-md-3">
                <label  class="control-label"> Pol </label>
            </div>
            <div class="col-md-9">
                    <select  name="pol" class="form-control" required >
                        <option value="" selected hidden > izaberi pol </option>
                        <option value="Muško">Muško</option>
                        <option value="Žensko">Žensko</option>
                    </select>

            </div>

        </div><!-- form-group Ends -->


        <div class="row" style="margin-bottom:5px;">

            <div class="col-md-3" >
                <label class="control-label" >Oblast interesovanja</label>
             </div>
            <div class="col-md-3" >
                <select name="oblast" class="form-control" style="opacity:0.5;" >

                    <option selected hidden> izaberi </option>

                    <?php

                    $get_cat = "select * from categories ";

                    $run_cat = mysqli_query($con, $get_cat);

                    while ($row_cat=mysqli_fetch_array($run_cat)) {
                        $cat_id = $row_cat['cat_id'];

                        $cat_title = $row_cat['cat_title'];

                        echo "<option value='$cat_title'>$cat_title</option>";
                    }
                    echo "<option value='Sve'>Sve</option>";
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="ili upiši ovde ako nije navedeno" name="profil" required>
            </div>

        </div>

         <div class="row" style="margin-bottom:25px;"><!-- form-group Starts -->
            <div class="col-md-3">
                <label class="control-label" > Školska sprema </label>
            </div>
            <div class="col-md-9">

            <select  name="sprema" class="form-control" required>
                <option value="" selected hidden> izaberi spremu </option>
                <option value="Osnovno">Osnovno</option>
                <option value="Srednje">Srednje</option>
                <option value="Viša">Viša</option>
                <option value="Visoka">Visoka</option>

            </select>

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group"><!-- form-group Starts -->

            <center>

                <label> Nisam robot </label>

                 <div class="g-recaptcha" data-sitekey="6LciB1EUAAAAAAjwWqhEa2LxXgu-ATt10OcD_pMO" ></div>


            </center>

        </div><!-- form-group Ends -->


        <div class="text-center"><!-- text-center Starts -->

            <button type="submit" name="register" class="btn btn-primary">

             <i class="fa fa-user-md"></i> Registruj se

            </button>

        </div><!-- text-center Ends -->

    </form><!-- form Ends -->


    </div><!-- box Ends -->

</div><!-- col-md-12 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->


<?php

include("includes/footer.php");

?>



<script>

    $(document).ready(function(){

        $('.tick1').hide();
        $('.cross1').hide();

        $('.tick2').hide();
        $('.cross2').hide();


        $('.confirm').focusout(function(){

        var password = $('#pass').val();

        var confirmPassword = $('#con_pass').val();

        if(password == confirmPassword){

        $('.tick1').show();
        $('.cross1').hide();

        $('.tick2').show();
        $('.cross2').hide();

        }
    else{

        $('.tick1').hide();
        $('.cross1').show();

        $('.tick2').hide();
        $('.cross2').show();


        }


     });


    });

</script>

<script>

    $(document).ready(function(){

        $("#pass").keyup(function(){

        check_pass();

        });

    });

    function check_pass() {
         var val=document.getElementById("pass").value;
         var meter=document.getElementById("meter");
         var no=0;
         if(val!="")
         {
        // If the password length is less than or equal to 6
        if(val.length<=6)no=1;

         // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
          if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

          // If the password length is greater than 6 and contain alphabet,number,special character respectively
          if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

          // If the password length is greater than 6 and must contain alphabets,numbers and special characters
          if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

          if(no==1)
          {
           $("#meter").animate({width:'20px'},150);
           meter.style.backgroundColor="red";
           document.getElementById("pass_type").innerHTML="Very Weak";
          }

          if(no==2)
          {
           $("#meter").animate({width:'40px'},150);
           meter.style.backgroundColor="#F5BCA9";
           document.getElementById("pass_type").innerHTML="Weak";
          }

          if(no==3)
          {
           $("#meter").animate({width:'60px'},150);
           meter.style.backgroundColor="#FF8000";
           document.getElementById("pass_type").innerHTML="Good";
          }

          if(no==4)
          {
           $("#meter").animate({width:'80px'},150);
           meter.style.backgroundColor="#00FF40";
           document.getElementById("pass_type").innerHTML="Strong";
          }
         }

         else
         {
          meter.style.backgroundColor="";
          document.getElementById("pass_type").innerHTML="";
         }
    }

</script>

<script>
    $(document).ready(function () {   // Help for the HTML4 version.
    $('select[name=oblast]').change(function () {
        $('input[name=profil]').val($(this).val());
    });
});
</script>
</body>

</html>

<?php

if (isset($_POST['register'])) {
    $secret = "6LciB1EUAAAAALJ29tYzKq7nnlOgK2lrXbFADieF";

    $response = $_POST['g-recaptcha-response'];

    $remoteip = $_SERVER['REMOTE_ADDR'];

    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

    $result = json_decode($url, true);

    if ($result['success'] == 1) {
        $c_name = escape($_POST['c_name']);

        $c_email = filter_var($_POST['c_email'], FILTER_SANITIZE_EMAIL);

        $c_pass = escape($_POST['c_pass']);

        $c_country = escape($_POST['c_country']);

        $c_city = escape($_POST['c_city']);

        $c_contact = escape($_POST['c_contact']);

        $c_address = escape($_POST['c_address']);

        $c_desc = escape($_POST['c_desc']);

        $c_vestina = escape($_POST['c_vestina']);

        $c_image = $_FILES['c_image']['name'];

        $c_image_tmp = $_FILES['c_image']['tmp_name'];

        $c_cv = $_FILES['c_cv']['name'];

        $c_cv_tmp = $_FILES['c_cv']['tmp_name'];

        $c_motiv = $_FILES['c_motiv']['name'];

        $c_motiv_tmp = $_FILES['c_motiv']['tmp_name'];

        $c_status ="";

        $customer_datum =$_POST['datum'];

        $c_pol=escape($_POST['pol']);

        $c_profil=escape($_POST['profil']);

        $c_sprema=escape($_POST['sprema']);

        $get_email = "select * from volunteers where customer_email='$c_email'";

        $run_email = mysqli_query($con, $get_email);

        $check_email = mysqli_num_rows($run_email);

        if ($check_email == 1) {
            echo "<script>alert('Ovaj email je već registrovan, pokušajte drugi')</script>";

            exit();
        }

        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
        move_uploaded_file($c_cv_tmp, "customer/customer_images/$c_cv");
        move_uploaded_file($c_motiv_tmp, "customer/customer_images/$c_motiv");

            $customer_confirm_code = mt_rand();

            $subject = "Hvala što ste se prijavili";

            $mailer->sendEmail($c_email, $subject, [
                "Hvala vam što ste se registrovali na platformu Novosadskog volonterskog servisa, ovim ste ušli u našu bazu volontera i volonterki.",
                "Povremeno ćemo vam slati informacije o ponudama za volontiranje. Pratite aktuelnosti na našoj stranici."
            ]);

            $nvs_email = "office@nvs.rs";
            $nvs_subject = "NOVA REGISTRACIJA";

            $mailer->sendEmail($nvs_email, $nvs_subject, [
                "Registrovao/la se : $c_name, iz $c_city",
                "<a href='https://www.nvs.rs/admin_area'>Administriranje</a>"
            ]);


        $insert_customer = "insert into volunteers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_status,customer_confirm_code,customer_datum,customer_pol,customer_profil,customer_sprema,customer_desc,customer_cv,customer_motiv,customer_vestina) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_status','$customer_confirm_code','$customer_datum','$c_pol','$c_profil','$c_sprema','$c_desc','$c_cv','$c_motiv','$c_vestina')";


        $run_customer = mysqli_query($con, $insert_customer);

        $sel_cart = "select * from wishlist where ip_add='$c_ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        $c_id=$customer_id;

        if ($check_cart>0) {
            $_SESSION['customer_email']=$c_email;
            $_SESSION['customer_id']=$c_id;

            echo "<script>alert('Uspešno ste se registrovali')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            $_SESSION['customer_email']=$c_email;
            $_SESSION['customer_id']=$c_id;

            echo "<script>alert('Uspešno ste se registrovali')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Please Select Captcha, Try Again')</script>";
    }
}

?>
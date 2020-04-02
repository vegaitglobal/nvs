<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

require_once __DIR__.'/app/bootstrap.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Novosadski Volonterski Servis </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="description" content=" Novosadski volonterski Servis" />
    <meta name="keywords" content="nvs, volontiranje, organizacije"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

    <link rel="stylesheet" title="" type="text/css" href="styles/dropmenu.css" media="all" />
    <link rel="stylesheet" title="" type="text/css" href="styles/header.css" media="all" />
    <link rel="stylesheet" title="" type="text/css" href="styles/footer.css" media="all" />

    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">

    <link rel="stylesheet" title="" type="text/css" href="styles/footer.css" media="all" />

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"> </script>

    <script src="js/bootstrap.min.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

<?php include("nav.php");?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

    <div class="col-md-8 col-md-offset-2" ><!-- col-md-12 Starts -->

    <div class="box" ><!-- box Starts -->

        <div class="box-header" ><!-- box-header Starts -->

            <center><!-- center Starts -->

                <h2> Prosledite zahtev za otvaranje naloga</h2>
                <p> Administrator će Vas kontaktirati i dati Vama lozinku za pristup Sajtu!</p>

            </center><!-- center Ends -->

        </div><!-- box-header Ends -->


    <form  class="form-horizontal" action="org_register.php" method="post" enctype="multipart/form-data" ><!-- form Starts -->

            <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Skraćeno ime </label>

                <div class="col-md-9">

                    <input type="text" name="manufacturer_name" class="form-control" required >

                </div>

            </div><!-- form-group Ends -->


            <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Puno ime </label>

                <div class="col-md-9">

                    <input type="text" name="manufacturer_name_full" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->

            <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Mesto </label>

                <div class="col-md-9">

                    <input type="text" name="manufacturer_mesto" class="form-control" required >

                </div>

            </div><!-- form-group Ends -->

            <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Adresa </label>

                <div class="col-md-9">

                    <input type="text" name="manufacturer_adresa" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->

            <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Telefon </label>

                <div class="col-md-9">

                    <input type="text" name="manufacturer_telefon" class="form-control" required >

                </div>

            </div><!-- form-group Ends -->


            <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Email </label>

                <div class="col-md-9">

                    <input type="email" name="manufacturer_email" class="form-control" required>

                </div>

            </div><!-- form-group Ends -->


     <!--    <div class="form-group">

            <label class="col-md-3"> Lozinka </label>

                <div class="input-group col-md-9">

                    <span class="input-group-addon">

                        <i class="fa fa-check tick1"> </i>

                        <i class="fa fa-times cross1"> </i>

                    </span>
                    <input  type="password" class="form-control" id="pass" name="c_pass" required>

                    <span class="input-group-addon">

                        <div  id="meter_wrapper">

                            <span id="pass_type"> </span>

                            <div id="meter"> </div>

                        </div>

                    </span>

                </div>

        </div><!-- form-group Ends -->


      <!--   <div class="form-group">

        <label class="col-md-3 "> Potvrdi lozinku </label>

            <div class="input-group col-md-9">

                <span class="input-group-addon">

                    <i class="fa fa-check tick2"> </i>

                    <i class="fa fa-times cross2"> </i>

                </span>
                <input type="password" class="form-control confirm" id="con_pass" required>

            </div>

        </div>  -->

        <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Web strana </label>

                <div class="col-md-9">

                    <input type="url" name="manufacturer_url" class="form-control" >

                </div>

        </div><!-- form-group Ends -->
        <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Facebook </label>

                <div class="col-md-9">

                    <input type="url" name="manufacturer_fb" class="form-control" >

                </div>

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

                <label class="control-label col-md-3"> Opis </label>

                <div class="col-md-9">

                    <textarea class="form-control" rows="10" name="manufacturer_opis"></textarea>

                </div>

            </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

                <label class="control-label col-md-3 "> Logo organizacije </label>

                <div class="col-md-9">

                    <input type="file" accept="image/*" name="manufacturer_image" class="form-control" >

                </div>

        </div><!-- form-group Ends -->


 <!--        <div class="form-group"><!-- form-group Starts

            <label> Država </label>

            <input type="text" class="form-control" name="c_country" required>

        </div><!-- form-group Ends



        <div class="form-group" ><!-- form-group Starts

        <label class="col-md-3 control-label" > Oblast </label>

            <div class="col-md-9" >

            <select name="profil" class="form-control" >

                <option> izaberi oblast interesovanja</option>

                <?php

                //$get_cat = "select * from categories ";

                //$run_cat = mysqli_query($con,$get_cat);

                //while ($row_cat=mysqli_fetch_array($run_cat)) {

                //    $cat_id = $row_cat['cat_id'];

                //    $cat_title = $row_cat['cat_title'];

                //    echo "<option value='$cat_id'>$cat_title</option>";

                //}
                ?>
            </select>

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group text-center"><!-- form-group Starts -->

            <center>

                <label> Nisam robot </label>

                <div class="g-recaptcha" data-sitekey="6LciB1EUAAAAAAjwWqhEa2LxXgu-ATt10OcD_pMO"></div>

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
           $("#meter").animate({width:'50px'},300);
           meter.style.backgroundColor="red";
           document.getElementById("pass_type").innerHTML="Very Weak";
          }

          if(no==2)
          {
           $("#meter").animate({width:'100px'},300);
           meter.style.backgroundColor="#F5BCA9";
           document.getElementById("pass_type").innerHTML="Weak";
          }

          if(no==3)
          {
           $("#meter").animate({width:'150px'},300);
           meter.style.backgroundColor="#FF8000";
           document.getElementById("pass_type").innerHTML="Good";
          }

          if(no==4)
          {
           $("#meter").animate({width:'200px'},300);
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
        $manufacturer_name = escape($_POST['manufacturer_name']);

        $manufacturer_name_full = escape($_POST['manufacturer_name_full']);

        $manufacturer_mesto = escape($_POST['manufacturer_mesto']);

        $manufacturer_adresa = escape($_POST['manufacturer_adresa']);

        $manufacturer_telefon = escape($_POST['manufacturer_telefon']);

        $manufacturer_email = filter_var($_POST['manufacturer_email'], FILTER_SANITIZE_EMAIL);

       // $manufacturer_pass = escape($_POST['c_pass']);//
        $manufacturer_pass = "abc-123";

        $manufacturer_url = filter_var($_POST['manufacturer_url'], FILTER_SANITIZE_URL);

        $manufacturer_opis = escape($_POST['manufacturer_opis']);

        $manufacturer_top = "no";

        $manufacturer_image = $_FILES['manufacturer_image']['name'];

        $tmp_name = $_FILES['manufacturer_image']['tmp_name'];


        $get_email = "select * from organizations where manufacturer_email='$manufacturer_email'";

        $run_email = mysqli_query($con, $get_email);

        $check_email = mysqli_num_rows($run_email);

        if ($check_email == 1) {
            echo "<script>alert('Email je već registrovan!')</script>";

            exit();
        }



        $insert_manufacturer = "insert into organizations (manufacturer_title,manufacturer_title_full,manufacturer_top,manufacturer_image,manufacturer_opis,manufacturer_mesto,manufacturer_adresa,manufacturer_tel,manufacturer_email,manufacturer_pass,manufacturer_url,date) values ('$manufacturer_name','$manufacturer_name_full','$manufacturer_top','$manufacturer_image','$manufacturer_opis','$manufacturer_mesto','$manufacturer_adresa','$manufacturer_telefon','$manufacturer_email','$manufacturer_pass','$manufacturer_url',NOW())";


        $run_manufacturer = mysqli_query($con, $insert_manufacturer);

        if ($run_manufacturer) {
            move_uploaded_file($tmp_name, "admin_area/other_images/$manufacturer_image");


            $subject = "Hvala što ste se prijavili";

            $mailer->sendEmail($c_email, $subject, [
                "Hvala što ste se prijavili $manufacturer_name!",
                "Naknadno ćete dobiti lozinku za pristup sajtu."
            ]);

            echo "<script>alert('Hvala što ste se prijavili. Od Administratora ćete dobiti lozinku za pristup. Budite strpljivi!')</script>";

            echo "<script>window.open('checkorg.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Please Select Captcha, Try Again')</script>";
    }
}

?>
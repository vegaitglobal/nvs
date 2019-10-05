<?php

session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";


}else {




include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html>

<head>
<title>NVS</title>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">



     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 

</head>

<body>

<div id="top" class="navbar"><!-- top Starts -->

<div class="container"><!-- container Starts -->

<div class="navbar-header">
            <!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation1">

<span class="sr-only" >Toggle Navigation </span>

<i class="fa fa-align-justify"></i>

</button>


<a href="#" class="btn btn-sm btn-silver" >
<?php

if(!isset($_SESSION['customer_email'])){

echo "Dobrodošli :Guest";


}else{

echo "Dobrodošli : " . $_SESSION['customer_email'] . "";

}


?>
</a>



</div><!-- col-md-6 offer Ends -->
<div class="navbar-collapse collapse right" id="navigation1">

    <ul class="menu"><!-- menu Starts -->

    <?php

    if(!isset($_SESSION['customer_email'])){

        echo "<li>";
        echo "<a href='../customer_register.php'> Registracija </a>";
        echo "</li>";
    }

    ?>

    <li>
    <?php

    if(!isset($_SESSION['customer_email'])){

        echo "<a href='../checkout.php' >Moj nalog</a>";

    }
    else{

        echo "<a href='index.php?my_wishlist'>Moj nalog</a>";

    }


    ?>
    </li>


    <li>
    <?php

    if(!isset($_SESSION['customer_email'])){

        echo "<a href='../checkout.php'> Prijava </a>";

    }else {

        echo "<a href='logout.php'> Odjava </a>";

    }

    ?>
    </li>

    </ul><!-- menu Ends -->

</div><!-- col-md-6 Ends -->

</div><!-- container Ends -->
</div><!-- top Ends -->

<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
<div class="container" ><!-- container Starts -->

<div class="navbar-header"><!-- navbar-header Starts -->

    
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >

        <span class="sr-only" >Toggle Navigation </span>

        <i class="fa fa-align-justify"></i>

    </button>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >

        <span class="sr-only" >Toggle Search</span>

        <i class="fa fa-search" ></i>

    </button>


</div><!-- navbar-header Ends -->

<div class="navbar-collapse collapse" id="navigation" ><!-- navbar-collapse collapse Starts -->

<div class="padding-nav" ><!-- padding-nav Starts -->

    <ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Starts -->

        <li>
        <a href="../index.php"> Naslovna strana </a>
        </li>

        <li>
        <a href="../blog.php"> Blog </a>
        </li>

        <li>
        <a href="../shop.php"> Ponude </a>
        </li>

        <li>
        <a href="../org.php"> Organizacije </a>
        </li>

        <li class="active">
        <?php

        if(!isset($_SESSION['customer_email'])){

                echo "<a href='../checkout.php' >Moj nalog</a>";

            }
            else{

                echo "<a href='index.php?my_wishlist'>Moj nalog</a>";

        }


        ?>
        </li>


          <li class='dropdown'>
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">O nama <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>  <a href="../about.php"> O nama </a> </li>

                            <li>  <a href="../services.php"> Services </a> </li>
                            
                            <li>  <a href="../docs.php"> Dokumenti </a> </li>

                            <li>  <a href="../contact.php"> Kontakt </a> </li>

                        </ul>               
                 </li>

    </ul><!-- nav navbar-nav navbar-left Ends -->

</div><!-- padding-nav Ends -->

<?php

if(!isset($_SESSION['customer_email'])){

}
else{
?>
    <a class="btn btn-primary navbar-btn right" href="index.php?my_wishlist"><!-- btn btn-primary navbar-btn right Starts -->
       
        <i class="fa fa-heart-o"></i>

        <span> <?php items($_SESSION['customer_email']); ?> želja na listi </span>

    </a><!-- btn btn-primary navbar-btn right Ends -->

<?php
}

?>


<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->

    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">

        <span class="sr-only">Toggle Search</span>

        <i class="fa fa-search"></i>

    </button>

</div><!-- navbar-collapse collapse right Ends -->

<div class="collapse clearfix" id="search"><!-- collapse clearfix Starts -->

<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->

    <div class="input-group"><!-- input-group Starts -->

        <input class="form-control" type="text" placeholder="Search" name="user_query" required>

        <span class="input-group-btn"><!-- input-group-btn Starts -->

        <button type="submit" value="Search" name="search" class="btn btn-primary">

            <i class="fa fa-search"></i>

        </button>

        </span><!-- input-group-btn Ends -->

    </div><!-- input-group Ends -->

</form><!-- navbar-form Ends -->

</div><!-- collapse clearfix Ends -->

</div><!-- navbar-collapse collapse Ends -->

</div><!-- container Ends -->
</div><!-- navbar navbar-default Ends -->


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12"><!-- col-md-12 Starts -->

<?php

$c_email = $_SESSION['customer_email'];

$get_customer = "select * from volunteers where customer_email='$c_email'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

    $customer_confirm_code = $row_customer['customer_confirm_code'];

    $c_name = $row_customer['customer_name'];


?>
<!-- col-md-12 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

    <?php include("includes/sidebar.php"); ?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9" ><!--- col-md-9 Starts -->

<div class="box" ><!-- box Starts -->

    <?php

    if(isset($_GET[$customer_confirm_code])){

        $update_customer = "update volunteers set customer_confirm_code='' where customer_confirm_code='$customer_confirm_code'";

        $run_confirm = mysqli_query($con,$update_customer);

        echo "<script>alert('Vaša mail adresa je potvrđena')</script>";

        echo "<script>window.open('index.php?my_wishlist','_self')</script>";

    }

    if(isset($_GET['send_email'])){

        $subject = "Potvrda mail adrese";

        $from = "vojislavp@gmail.com";

        $message = "

        <h2>
        Email Confirmation By NVS.rs $c_name
        </h2>

        <a href='db25.cpanelhosting.rs/nvs/customer/index.php?$customer_confirm_code'>

        Klikni ovde da potvrdiš email adresu

        </a>

        ";

        $headers = "Od: $from \r\n";

        $headers .= "Content-type: text/html\r\n";

        mail($c_email,$subject,$message,$headers);

        echo "<script>alert('Verifikacioni email vam je poslat, proverite poštu')</script>";

        echo "<script>window.open('index.php?my_wishlist','_self')</script>";

    }


    if(isset($_GET['edit_account'])) {

    include("edit_account.php");

    }

    if(isset($_GET['change_pass'])){

    include("change_pass.php");

    }

    if(isset($_GET['delete_account'])){

    include("delete_account.php");

    }

    if(isset($_GET['my_wishlist'])){

    include("my_wishlist.php");

    }

    if(isset($_GET['my_book'])){

    include("my_book.php");

    }

    if(isset($_GET['my_book_manage'])){

    include("my_book_manage.php");

    }

    if(isset($_GET['delete_wishlist'])){

    include("delete_wishlist.php");

    }

    ?>

</div><!-- box Ends -->


</div><!--- col-md-9 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php } ?>
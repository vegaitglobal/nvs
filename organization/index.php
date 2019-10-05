<?php

session_start();

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
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



    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'#text1,#product_desc,#product_video,#product_features', 
                menubar: true,
                plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
              ],
              toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']            
                                         
          });</script>

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


            <a href="#" class="btn btn-success btn-sm" >
            <?php

            if (!isset($_SESSION['manufacturer_email'])) {
                echo "Dobrodošli :Guest";
            } else {
                echo "Dobrodošli : " . $_SESSION['manufacturer_email'] . "";
            }   ?>
            
            </a>

        </div><!-- col-md-6 offer Ends -->
        
        <div class="navbar-collapse collapse right" id="navigation1">

            <ul class="menu"><!-- menu Starts -->

                <?php

                if (!isset($_SESSION['manufacturer_email'])) {
                    echo "<li>";
                    echo "<a href='../org_register.php'> Register </a>";
                    echo "</li>";
                }  ?>

                <li>
                <?php

                if (!isset($_SESSION['manufacturer_email'])) {
                    echo "<a href='../org.php' >My Account</a>";
                } else {
                    echo "<a href='index.php?/view_products'>My Account</a>";
                }   ?>
                </li>

                <li>
                <?php

                if (!isset($_SESSION['manufacturer_email'])) {
                    echo "<a href='../org.php'> Login </a>";
                } else {
                    echo "<a href='logout.php'> Logout </a>";
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

        <a class="navbar-brand home" href="../index.php" ><!--- navbar navbar-brand home Starts -->

            <img src="images/NVS-logo.jpg" alt="NVS logo" class="hidden-xs" >
            <img src="images/NVS-logo-min.jpg" alt="NVS logo" class="visible-xs" >

        </a><!--- navbar navbar-brand home Ends -->

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
                    <a href="../index.php"> Home </a>
                </li>
             
                <li>
                    <a href="../shop.php"> Ponude </a>
                </li>
                <li>
                    <a href="../org.php"> Organizacije </a>
                </li>

                <li class="active">
                <?php

                if (!isset($_SESSION['manufacturer_email'])) {
                        echo "<a href='../org.php' >My Account</a>";
                } else {
                    echo "<a href='index.php?dashboard'>My Account</a>";
                }  ?>
                
                </li>
                  
                   <li>
                    <a href="../blog.php"> Vesti </a>
                </li>

        <li class='dropdown'>
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">O nama <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>  <a href="../about.php"> O nama </a> </li>

                    <li>  <a href="../services.php"> Services </a> </li>
                    
                    <li>  <a href="../docs.php"> Dokumenti </a> </li>

                    <li>  <a href="../contact.php"> Contact Us </a> </li>

                </ul>               
         </li>


            </ul><!-- nav navbar-nav navbar-left Ends -->

        </div><!-- padding-nav Ends -->

        <?php

        if (!isset($_SESSION['manufacturer_email'])) {
        } else {
            ?>
            <a class="btn btn-primary navbar-btn right" href="index.php?view_products"><!-- btn btn-primary navbar-btn right Starts -->

            <i class="fa fa-heart-o"></i>

            <span> <?php orgsitem($_SESSION['manufacturer_email']); ?> Pozicije </span>

            </a><!-- btn btn-primary navbar-btn right Ends -->

            <?php
        }

        ?>


    </div><!-- navbar-collapse collapse Ends -->

</div><!-- container Ends -->
</div><!-- navbar navbar-default Ends -->


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

    <div class="col-md-12" ><!--- col-md-12 Starts -->

        <ul class="breadcrumb" ><!-- breadcrumb Starts -->

            <li>
                <a href="index.php">Početna</a>
            </li>

            <li>My Account</li>

        </ul><!-- breadcrumb Ends -->

    </div><!--- col-md-12 Ends -->

    <div class="col-md-12"><!-- col-md-12 Starts -->

        <?php

        $c_email = $_SESSION['manufacturer_email'];

        $get_customer = "select * from organizations where manufacturer_email='$c_email'";

        $run_customer = mysqli_query($con, $get_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $c_name = $row_customer['manufacturer_title_full'];


        ?>
        <!-- col-md-12 Ends -->

        <div class="col-md-3"><!-- col-md-3 Starts -->

            <?php include("includes/sidebar.php"); ?>

        </div><!-- col-md-3 Ends -->

        <div class="col-md-9" ><!--- col-md-9 Starts -->

        <div class="box" ><!-- box Starts -->

            <?php
    

            if (isset($_GET['send_email'])) {
                $subject = "Email Confirmation Message";

                $from = "vojislavp@gmail.com";

                $message = "

                    <h2> Email Confirmation By NVS.rs $c_name </h2>
                      <p> Pozdravna forma... </p>
               
                ";

                $headers = "From: $from \r\n";

                $headers .= "Content-type: text/html\r\n";

                mail($c_email, $subject, $message, $headers);

                echo "<script>alert('pozdrav')</script>";

                echo "<script>window.open('index.php?my_wishlist','_self')</script>";
            }


            if (isset($_GET['edit_account'])) {
                include("edit_account.php");
            }

            if (isset($_GET['change_pass'])) {
                include("change_pass.php");
            }

            if (isset($_GET['delete_account'])) {
                include("delete_account.php");
            }

            if (isset($_GET['my_wishlist'])) {
                include("my_wishlist.php");
            }

            if (isset($_GET['delete_wishlist'])) {
                include("delete_wishlist.php");
            }
    
            if (isset($_GET['dashboard'])) {
                include("dashboard.php");
            }
            
    
            if (isset($_GET['insert_product'])) {
                include("insert_product.php");
            }
    
            if (isset($_GET['view_products'])) {
                include("view_products.php");
            }
    
            if (isset($_GET['edit_product'])) {
                include("edit_product.php");
            }
    
            if (isset($_GET['delete_product'])) {
                include("delete_product.php");
            }
    
            if (isset($_GET['delete_p_cat'])) {
                include("delete_p_cat.php");
            }
    
            if (isset($_GET['view_p_cats'])) {
                include("view_p_cats.php");
            }
    
            if (isset($_GET['insert_p_cat'])) {
                include("insert_p_cat.php");
            }
    
            if (isset($_GET['edit_p_cat'])) {
                include("edit_p_cat.php");
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
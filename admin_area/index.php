<?php

session_start();

include("includes/db.php");

include("includes/functions.php");

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from admins  where admin_email='$admin_session'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];

    $admin_name = $row_admin['admin_name'];

    $admin_email = $row_admin['admin_email'];

    $admin_image = $row_admin['admin_image'];

    $admin_country = $row_admin['admin_country'];

    $admin_job = $row_admin['admin_job'];

    $admin_contact = $row_admin['admin_contact'];

    $admin_about = $row_admin['admin_about'];


    $get_products = "select * from products";
    $run_products = mysqli_query($con, $get_products);
    $count_products = mysqli_num_rows($run_products);

    $get_volunteers = "select * from volunteers";
    $run_volunteers = mysqli_query($con, $get_volunteers);
    $count_volunteers = mysqli_num_rows($run_volunteers);

    $get_p_categories = "select * from product_categories";
    $run_p_categories = mysqli_query($con, $get_p_categories);
    $count_p_categories = mysqli_num_rows($run_p_categories);


    $get_pending_orders = "select * from wishlist";
    $run_pending_orders = mysqli_query($con, $get_pending_orders);
    $count_pending_orders = mysqli_num_rows($run_pending_orders);


    ?>


<!DOCTYPE html>
<html>

<head>

    <title>Admin Panel</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'#text1,#product_desc,#product_video,#product_features,#about_desc,#content',
                menubar: true,
                plugins: [
          /*      'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'*/
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                     "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                     "table contextmenu directionality emoticons paste textcolor code"
              ],
             /* toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',*/
                toolbar1: "insert |undo redo | bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | sizeselect fontselect  fontsizeselect ",
                toolbar2: "| link unlink anchor | image media | styleselect formatselect  |  print preview code | caption | removeformat",
                fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 60pt 72pt 84pt 96pt",
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']

          });</script>

     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

    <?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

//if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['path'])) {
      if(file_exists($_GET['path'].".php")) {
            include_once($_GET['path'].".php");
      } else {
            echo 'Page does not exist';
      }
    }
//}

    ?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src='js/jquery.table2excel.js'></script>


</body>


</html>

<?php } ?>
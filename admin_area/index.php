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

<<<<<<< HEAD
<?php

if($_SERVER['REQUEST_METHOD'] == "GET") {
      if(file_exists($_GET['path'].".php")) {
            include_once($_GET['path'].".php"); 
      } else {
            die('Page does not exist'); 
      }
}
=======
    <?php

    if (isset($_GET['dashboard'])) {
        include("dashboard.php");
    }

    if (isset($_GET['insert_product'])) {
        include("insert_product.php");
    }

    if (isset($_GET['view_products'])) {
        include("view_products.php");
    }

    if (isset($_GET['delete_product'])) {
        include("delete_product.php");
    }

    if (isset($_GET['edit_product'])) {
        include("edit_product.php");
    }

    if (isset($_GET['insert_p_cat'])) {
        include("insert_p_cat.php");
    }

    if (isset($_GET['view_p_cats'])) {
        include("view_p_cats.php");
    }

    if (isset($_GET['delete_p_cat'])) {
        include("delete_p_cat.php");
    }

    if (isset($_GET['edit_p_cat'])) {
        include("edit_p_cat.php");
    }

    if (isset($_GET['insert_cat'])) {
        include("insert_cat.php");
    }

    if (isset($_GET['view_cats'])) {
        include("view_cats.php");
    }

    if (isset($_GET['delete_cat'])) {
        include("delete_cat.php");
    }

    if (isset($_GET['edit_cat'])) {
        include("edit_cat.php");
    }

    if (isset($_GET['insert_slide'])) {
        include("insert_slide.php");
    }


    if (isset($_GET['view_slides'])) {
        include("view_slides.php");
    }

    if (isset($_GET['delete_slide'])) {
        include("delete_slide.php");
    }


    if (isset($_GET['edit_slide'])) {
        include("edit_slide.php");
    }


    if (isset($_GET['view_volunteers'])) {
        include("view_customers.php");
    }

    if (isset($_GET['edit_volunteers'])) {
        include("edit_customers.php");
    }


    if (isset($_GET['customer_delete'])) {
        include("customer_delete.php");
    }
        
    
    if (isset($_GET['customer_reset'])) {
        include("customer_reset.php");
    }

    if (isset($_GET['view_orders'])) {
        include("view_orders.php");
    }

    if (isset($_GET['order_delete'])) {
        include("order_delete.php");
    }


    if (isset($_GET['view_payments'])) {
        include("view_payments.php");
    }

    if (isset($_GET['payment_delete'])) {
        include("payment_delete.php");
    }

    if (isset($_GET['insert_user'])) {
        include("insert_user.php");
    }

    if (isset($_GET['view_users'])) {
        include("view_users.php");
    }


    if (isset($_GET['user_delete'])) {
        include("user_delete.php");
    }



    if (isset($_GET['user_profile'])) {
        include("user_profile.php");
    }

    if (isset($_GET['insert_box'])) {
        include("insert_box.php");
    }

    if (isset($_GET['view_boxes'])) {
        include("view_boxes.php");
    }

    if (isset($_GET['delete_box'])) {
        include("delete_box.php");
    }

    if (isset($_GET['edit_box'])) {
        include("edit_box.php");
    }

    if (isset($_GET['insert_term'])) {
        include("insert_term.php");
    }

    if (isset($_GET['view_terms'])) {
        include("view_terms.php");
    }

    if (isset($_GET['delete_term'])) {
        include("delete_term.php");
    }

    if (isset($_GET['edit_term'])) {
        include("edit_term.php");
    }

    if (isset($_GET['edit_css'])) {
        include("edit_css.php");
    }

    if (isset($_GET['insert_manufacturer'])) {
        include("insert_manufacturer.php");
    }

    if (isset($_GET['view_organizations'])) {
        include("view_manufacturers.php");
    }

    if (isset($_GET['delete_manufacturer'])) {
        include("delete_manufacturer.php");
    }

    if (isset($_GET['edit_manufacturer'])) {
        include("edit_manufacturer.php");
    }


    if (isset($_GET['insert_post'])) {
        include("insert_post.php");
    }

    if (isset($_GET['view_posts'])) {
        include("view_posts.php");
    }

    if (isset($_GET['delete_post'])) {
        include("delete_post.php");
    }


    if (isset($_GET['edit_post'])) {
        include("edit_post.php");
    }


    if (isset($_GET['insert_icon'])) {
        include("insert_icon.php");
    }


    if (isset($_GET['view_icons'])) {
        include("view_icons.php");
    }

    if (isset($_GET['delete_icon'])) {
        include("delete_icon.php");
    }

    if (isset($_GET['edit_icon'])) {
        include("edit_icon.php");
    }

    if (isset($_GET['insert_bundle'])) {
        include("insert_bundle.php");
    }

    if (isset($_GET['view_bundles'])) {
        include("view_bundles.php");
    }

    if (isset($_GET['delete_bundle'])) {
        include("delete_bundle.php");
    }


    if (isset($_GET['edit_bundle'])) {
        include("edit_bundle.php");
    }


    if (isset($_GET['insert_rel'])) {
        include("insert_rel.php");
    }

    if (isset($_GET['view_rel'])) {
        include("view_rel.php");
    }

    if (isset($_GET['delete_rel'])) {
        include("delete_rel.php");
    }


    if (isset($_GET['edit_rel'])) {
        include("edit_rel.php");
    }


    if (isset($_GET['edit_contact_us'])) {
        include("edit_contact_us.php");
    }

    if (isset($_GET['insert_enquiry'])) {
        include("insert_enquiry.php");
    }


    if (isset($_GET['view_enquiry'])) {
        include("view_enquiry.php");
    }

    if (isset($_GET['delete_enquiry'])) {
        include("delete_enquiry.php");
    }

    if (isset($_GET['edit_enquiry'])) {
        include("edit_enquiry.php");
    }


    if (isset($_GET['edit_about_us'])) {
        include("edit_about_us.php");
    }


    if (isset($_GET['insert_service'])) {
        include("insert_service.php");
    }

    if (isset($_GET['view_services'])) {
        include("view_services.php");
    }

    if (isset($_GET['delete_service'])) {
        include("delete_service.php");
    }

    if (isset($_GET['edit_service'])) {
        include("edit_service.php");
    }
    

    if (isset($_GET['insert_docs'])) {
        include("insert_docs.php");
    }

    if (isset($_GET['view_docs'])) {
        include("view_docs.php");
    }

    if (isset($_GET['delete_docs'])) {
        include("delete_docs.php");
    }

    if (isset($_GET['edit_docs'])) {
        include("edit_docs.php");
    }
>>>>>>> master

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
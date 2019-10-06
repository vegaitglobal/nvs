<?php 

require_once __DIR__.'/../app/bootstrap.php';

$filter = '';  

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['req']) && !empty($_GET['req'])){
        if($_GET['req'] === 'name')
                $filter = " ORDER BY customer_name ASC";  
        } else if ($_GET['req'] === 'email') {
            $fileter = "ORDER BY customer_email ASC";
        } else if ($_GET['req'] === 'telephone') {
            $filter = "ORDER BY customer_contact ASC"; 
        } else if ($_GET['req'] === 'product_title') {
            $filter = "ORDER BY product_title ASC"; 
        } else if($_GET['req'] === 'date') {
            $filter = "OREDER BY datum ASC"; 
        } else if ($_GET['req'] === 'hours') {
            $filter = "ORDER BY hours ASC"; 
        } else if ($_GET['req'] === 'status') {
            $filter = "OREDER BY status ASC";
        }
    }

function status($data, $id) {
    if ($data === 1) {
        return Wishlist::STATUS_VALUE_TRUE;
    } else if ($data === 0){
        return Wishlist::STATUS_VALUE_FALSE;
    } else {
        return "<div class='btn-group'><a href='#' type='submit' class='btn btn-success btn-sm'>Da</a><a href='#' type='submit' class='btn btn-danger btn-sm'>Ne</a></div>";
    }
}

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}

$get_pro = "SELECT wishlist.wishlist_id, wishlist.customer_id, wishlist.product_id, wishlist.status, wishlist.datum, wishlist.hours, wishlist.hours_approved,
                    volunteers.customer_name, volunteers.customer_email, volunteers.customer_contact, products.product_title
                    FROM wishlist 
                    LEFT JOIN volunteers ON volunteers.customer_id = wishlist.customer_id 
                    LEFT JOIN products ON products.product_id = wishlist.product_id ".$filter;

$run_orders = mysqli_query($con, $get_pro);

$wishlistRepository = $entityManager->getRepository('Wishlist');

$wishlists = $wishlistRepository->findAll();

echo $twig->render('view_orders_hours.html.twig', [
   'wishlists' => $wishlists,
]);

<?php

use Mpdf\Output\Destination;

require_once __DIR__.'/../app/bootstrap.php';

session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("functions/functions.php");
}

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from volunteers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

if (!mysqli_num_rows($run_customer)) {
    $alertsService->addAlert('danger', 'Ulogujte se');
}

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$wishlist_id = $_GET['wishlist_id'];

if (!$wishlist_id) {
    $alertsService->addAlert('danger', 'Prijava nije izabrana');
}

$wishlist = $entityManager->find('Wishlist', $wishlist_id);

if (!$wishlist) {
    $alertsService->addAlert('danger', 'Prijava ne postoji');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/../tmp']);

$html = $twig->render('wishlist_to_pdf.html.twig', [
    'wishlist' => $wishlist,
]);


/**
 * Test inline with URL parameter "download=false"
 * Example: http://nvs.localhost/customer/wishlist_to_pdf.php?wishlist_id=123456&download=false
 */

$mpdf->WriteHTML($html);

$fileName = 'Potvrda o volontiranju.pdf';

$forceDownload = filter_var($_GET['download'] ?? true, FILTER_VALIDATE_BOOLEAN) ?? true;

$mpdf->Output($fileName, $forceDownload ? Destination::DOWNLOAD : Destination::INLINE);

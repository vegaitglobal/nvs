<?php

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

if (isset($_POST['hours'])) {
    $hours = $_POST['hours'];

    if (!$hours || !is_numeric($hours)) {
        $alertsService->addAlert('danger', 'Greška u vrednosti sati');
    }

    if (!$alertsService->hasAlerts()) {
        $wishlist->setHours($hours);

        $entityManager->persist($wishlist);
        $entityManager->flush();

        $alertsService->addAlert('success', 'Sati uspešno snimljeni');
    }
}

echo $twig->render('my_book_manage.html.twig', [
    'title' => 'Unos sati',
    'hasAlerts' => $alertsService->hasAlerts(),
    'firstAlert' => $alertsService->getFirstAlert(),
    'wishlist' => $wishlist,
    'hours' => $hours,
]);

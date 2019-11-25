<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from volunteers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

if (!mysqli_num_rows($run_customer)) {
    $alertsService->addAlert('danger', 'Ulogujte se');
}

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];

$wishlist_id = $_GET['wishlist_id'];

if (!$wishlist_id) {
    $alertsService->addAlert('danger', 'Prijava nije izabrana');
}

$wishlist = $entityManager->find('Wishlist', $wishlist_id);
$product = null;

if (!$wishlist) {
    $alertsService->addAlert('danger', 'Prijava ne postoji');
} else {
    $product = $entityManager->find('Product', $wishlist->getProductId());
}

if (isset($_POST['hours'])) {
    $hours = $_POST['hours'];
    if(!ctype_digit($hours)){
        $alertsService->addAlert('danger', 'Morate uneti ceo broj');
    }
    if (!$alertsService->hasAlerts()) {
        $hoursChanged = $wishlist->getHours() !== (int)$hours;
        $hoursApproved = $wishlist->getHoursApproved();
        $wishlist->setHours($hours);

        try {
            $entityManager->persist($wishlist);
            $entityManager->flush();

            if(is_null($hoursApproved)){
                $alertsService->addAlert('success', 'Sati uspešno snimljeni');
            }else{
                $alertsService->addAlert('success', 'Vaše izmene su poslate administratoru');
            }


            if ($hoursChanged) {
                $emailSubject = 'Volonter ' . $customer_name . ' je uneo ' . $hours . ' sati za događaj ' . $product->getTitle();

                $emailParagraphs = [
                    $emailSubject,
                    'Možete ih potvrditi ili izmeniti prateći <a href="' . config('app_url') .'/admin_area/index.php?path=edit_hours&id=' . $wishlist->getId() . '">ovaj link</a>.',
                ];

                $mailer->sendEmail(
                    'office@nvs.rs',
                    $emailSubject,
                    $emailParagraphs
                );
            }
        } catch (Exception $e) {
            $alertsService->addAlert('danger', 'Nešto je pošlo po zlu');
        }
    }
}

echo $twig->render('my_book_manage.html.twig', [
    'title' => 'Unos sati',
    'hasAlerts' => $alertsService->hasAlerts(),
    'firstAlert' => $alertsService->getFirstAlert(),
    'wishlist' => $wishlist,
    'hours' => $hours ?? null,
]);

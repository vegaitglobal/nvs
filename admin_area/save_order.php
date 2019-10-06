<?php

require_once __DIR__.'/../app/bootstrap.php';

session_start();

include('includes/db.php');

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    if (isset($_POST)) {
        $wishlistData = $_POST;

        $wishlist = $entityManager->getRepository('Wishlist')->findOneBy([
            'id' => $wishlistData['id']
        ]);

        $wishlist->setHours(intval($wishlistData['hours']));
        $wishlist->setHoursApproved(intval(boolval($wishlistData['hours_approved'])));

        try {
            $entityManager->persist($wishlist);
            $entityManager->flush();

            echo "<script>window.open('index.php?path=view_orders_hours','_self')</script>";
        } catch (Exception $e) {
            echo "Upit nije prosao";
        }
    }
}

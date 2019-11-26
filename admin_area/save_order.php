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
        if(!ctype_digit($wishlistData['hours'])){
            echo "<script>alert('Unesite broj koristeći isključivo cifre od 0 do 9.')</script>";
            $id = $wishlistData['id'];
            echo "<script>window.open('index.php?path=edit_hours&id=$id','_self')</script>";
            exit();
        }

        $wishlist->setHours(intval($wishlistData['hours']));
        $wishlist->setHoursApproved(intval(boolval($wishlistData['hours_approved'])));

        $product = $entityManager->getRepository('Product')->findOneBy([
            'id' => $wishlist->getProductId()
        ]);

        $customer = $entityManager->getRepository('Volunteer')->findOneBy([
            'id' => $wishlist->getCustomerId()
        ]);

        try {
            $entityManager->persist($wishlist);
            $entityManager->flush();

            $product = $entityManager->getRepository('Product')->findOneBy([
                'id' => $wishlist->getProductId()
            ]);

            $email_to      = $customer->getEmail();
            $emailSubject = 'Unos sati za događaj ' . $product->getTitle();

            $emailParagraphs = [
                'Admin je ' . (boolval($wishlistData['hours_approved']) ? 'odobrio ' : 'odbio unos od ') . $wishlistData['hours'] . ' sati za događaj ' . $product->getTitle(),
                'Možete pogledati sva vaša prethodna volontiranja na <a href="' . config('app_url') . '/customer/index.php?my_book' . '"/>ovom linku</a>.',
            ];

            $mailer->sendEmail(
                $email_to,
                $emailSubject,
                $emailParagraphs
            );

        } catch (Exception $e) {
            echo "Email nije poslat";
        }

        echo "<script>window.open('index.php?path=view_orders_hours','_self')</script>";
    }
}

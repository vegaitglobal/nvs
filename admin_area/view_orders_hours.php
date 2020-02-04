<?php

require_once __DIR__.'/../app/bootstrap.php';

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}

$qb = $entityManager->createQueryBuilder();
$qb->select('wishlist')
    ->from('Wishlist', 'wishlist')
    ->where('wishlist.datum > :date')
	->andWhere('wishlist.status = :status')
    ->setParameter('date', '2020-01-10')
    ->setParameter('status', Wishlist::STATUS_VALUE_TRUE)
    ->orderBy('wishlist.datum', 'DESC');
$wishlists = $qb->getQuery()->getResult();

echo $twig->render('view_orders_hours.html.twig', [
   'wishlists' => $wishlists,
]);

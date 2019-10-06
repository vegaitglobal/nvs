<?php 

require_once __DIR__.'/../app/bootstrap.php';

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}

$qb = $entityManager->createQueryBuilder();
$qb->select('wishlist')
    ->from('Wishlist', 'wishlist');
$wishlists = $qb->getQuery()->getResult();

echo $twig->render('view_orders_hours.html.twig', [
   'wishlists' => $wishlists,
]);

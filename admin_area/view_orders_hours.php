<?php 

require_once __DIR__.'/../app/bootstrap.php';

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}

$qb = $entityManager->createQueryBuilder();
$qb->select('wishlist, product')
    ->from('Wishlist', 'wishlist')
    ->leftJoin('wishlist.product', 'product')
    ->where('wishlist.hours > :minHours')
    ->andWhere('product.do > :now')
    ->setParameter('minHours', 0)
    ->setParameter('now', new DateTime());

$wishlists = $qb->getQuery()->getResult();

echo $twig->render('view_orders_hours.html.twig', [
   'wishlists' => $wishlists,
]);

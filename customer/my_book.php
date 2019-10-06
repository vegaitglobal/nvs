
<div class="panel-heading">
    <h1> Moja Volonterska Knjižica</h1
</div>
<div class="manifestation-container"><!-- manifestation-container Starts -->

<p>Lista prethodnih manifestacija</p>

    <div class="table-responsive"><!-- table-responsive Starts -->

        <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->

            <tbody>

            <?php

            $customer_session = $_SESSION['customer_email'];

            $get_customer = "select * from volunteers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $i = 0;

            $wishlistRepository = $entityManager->getRepository('Wishlist');
            $wishlists = $wishlistRepository->findBy([
                'customerId' => $customer_id,
                'status' => 'Prihvaćen'
            ]);

            $productRepository = $entityManager->getRepository('Product');

            foreach ($wishlists as $wishlist) {
                $product = $productRepository->find($wishlist->getProductId());

                $i++;

                ?>

                <tr>

                    <td width="100" style="vertical-align:middle"> <span class="btn manifestation-name"><?php echo $i; ?></span> </td>

                    <td style="vertical-align:middle" >

                        <img src="../admin_area/product_images/<?php echo $product->getImg1(); ?>" width="60" height="60">

                        &nbsp;&nbsp;&nbsp;

                        <a href="../pozicija-<?php echo $product->getUrl(); ?>">

                            <?php echo $product->getTitle(); ?>

                        </a>

                    </td>

                    <?php
                        $hours = $wishlist->getHours();
                        $hours_approved = $wishlist->getHoursApproved();
                    ?>

                    <td style="vertical-align:middle" >
                        <?php  if ($hours == 0 && canEnterHours($wishlist, $product)) : ?>
                            <a href="index.php?my_book_manage&wishlist_id=<?php echo $wishlist->getId(); ?>">
                                <i class="fa fa-plus"></i>
                                Unesi
                            </a>
                        <?php else : ?>
                            <?php echo $hours; ?>
                        <?php endif ?>
                    </td>

                    <td style="vertical-align:middle" >
                        <?php if ($hours) : ?>
                            <?php  if (is_null($hours_approved)) {
                                echo "Sati u obradi";
                            } else {
                                echo $hours_approved ? 'Sati prihvaćeni' : 'Sati odbijeni';
                            }?>
                        <?php else : ?>
                            Gotovo
                        <?php endif ?>
                    </td>

                    <td style="vertical-align:middle" >
                        <?php if ($hours_approved) : ?>
                            <a href="wishlist_to_pdf.php?wishlist_id=<?php echo $wishlist->getId(); ?>" class="volunteering-pdf btn btn-sm btn-default">
                                PDF
                            </a>
                        <?php elseif (canEnterHours($wishlist, $product)) : ?>
                            <span class="btn btn-link">
                                <a href="index.php?my_book_manage&wishlist_id=<?php echo $wishlist_id ?>" class="volunteering-pdf btn">
                                    Izmeni
                                </a>
                            </span>
                        <?php else : ?>
                            Gotovo
                        <?php endif ?>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table><!-- table table-bordered table-hover Ends -->

    </div><!-- table-responsive Ends -->

</div><!-- manifestation-container Ends -->
<?php
function canEnterHours(Wishlist $wishlist, Product $product)
{
    $endDate = $product->getDo();
    $endDateTwoWeeksLater = $endDate->add(new DateInterval('P2W'));
    $currentDate = new DateTime('now');

    $dateOk = $currentDate >= $endDate && $currentDate <= $endDateTwoWeeksLater;
    $accepted = $wishlist->getStatus() === 'Prihvaćen';
    $hoursApproved = $wishlist->getHoursApproved();

    return $dateOk && $accepted && !$hoursApproved;
}
?>

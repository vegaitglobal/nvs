<?php

require_once __DIR__.'/../../../../app/bootstrap.php';

use PHPUnit\Framework\TestCase;

final class WishlistTest extends TestCase
{
    public function testGenerateCode()
    {
        $wishlist = new Wishlist();

        $wishlist->setDatum(new DateTime('2019-10-06 00:00:00'));

        $code = sprintf(
            'NVS%s.%s',
            hash(Wishlist::CODE_HASH_ALGORITHM, $wishlist->getId()),
            date_format($wishlist->getDatum(),'y')
        );

        $wishlist->generateCode();

        $this->assertEquals(
            'NVS00000000.19',
            $wishlist->getCode()
        );
    }
}
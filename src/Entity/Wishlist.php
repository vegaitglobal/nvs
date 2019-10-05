<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wishlist")
 */
class Wishlist
{
    /**
     * @ORM\Id
     * @ORM\Column(name="wishlist_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $wishlistId;

    /**
     * @ORM\Column(name="product_id", type="integer")
     */
    protected $productId;

    /**
     * @ORM\Column(name="customer_id", type="integer")
     */
    protected $customerId;

    /**
     * @ORM\Column(name="ip_add")
     */
    protected $ipAdd;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $status;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $datum;

    /**
     * @ORM\Column(type="integer")
     */
    protected $hours;

    /**
     * @ORM\Column(name="hours_approved", type="boolean", nullable=true)
     */
    protected $hoursApproved;

    public function getHours()
    {
        return $this->hours;
    }

    public function setHours($hours)
    {
        $this->hours = $hours;
    }

}
<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Wishlist
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Wishlist
{
    // https://www.php.net/manual/en/function.hash.php
    const CODE_HASH_ALGORITHM = 'crc32b';

    const STATUS_VALUE_NULL = 'U obradi';
    const STATUS_VALUE_TRUE = 'Prihvaćen';
    const STATUS_VALUE_FALSE = 'Odbijen';

    /**
     * @var int
     *
     * @ORM\Column(name="wishlist_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $code;

    /**
     * @var int
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId;

    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_add", type="string", length=255, nullable=false)
     */
    private $ipAdd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="text", length=65535, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datum = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="hours", type="integer", nullable=false)
     */
    private $hours;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="hours_approved", type="boolean", nullable=true)
     */
    private $hoursApproved;

    /**
     * @ORM\ManyToOne(targetEntity="Volunteer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     */
    private $volunteer;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     */
    private $product;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * Set customerId.
     *
     * @param int $customerId
     *
     * @return Wishlist
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set productId.
     *
     * @param int $productId
     *
     * @return Wishlist
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set ipAdd.
     *
     * @param string $ipAdd
     *
     * @return Wishlist
     */
    public function setIpAdd($ipAdd)
    {
        $this->ipAdd = $ipAdd;

        return $this;
    }

    /**
     * Get ipAdd.
     *
     * @return string
     */
    public function getIpAdd()
    {
        return $this->ipAdd;
    }

    /**
     * Set status.
     *
     * @param string|null $status
     *
     * @return Wishlist
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set datum.
     *
     * @param \DateTime $datum
     *
     * @return Wishlist
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum.
     *
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set hours.
     *
     * @param int $hours
     *
     * @return Wishlist
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours.
     *
     * @return int
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set hoursApproved.
     *
     * @param bool|null $hoursApproved
     *
     * @return Wishlist
     */
    public function setHoursApproved($hoursApproved = null)
    {
        $this->hoursApproved = $hoursApproved;

        return $this;
    }

    /**
     * Get hoursApproved.
     *
     * @return bool|null
     */
    public function getHoursApproved()
    {
        return $this->hoursApproved;
    }

    /**
     * @return Volunteer
     */
    public function getVolunteer()
    {
        return $this->volunteer;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @ORM\PrePersist @ORM\PreUpdate
     */
    public function validate()
    {
        if ($this->hours <= 0) {
            throw new Exception();
        }

        if (!is_numeric($this->hours)) {
            throw new Exception();
        }
    }

    /**
     * Generate and set code if doesn't exist
     * @ORM\PrePersist @ORM\PreUpdate
     */
    public function generateCode()
    {
        $code = sprintf(
            'NVS%s.%s',
            hash(self::CODE_HASH_ALGORITHM, $this->id),
            date_format($this->datum,'y')
        );

        $this->setCode($code);

        return $this;
    }
}

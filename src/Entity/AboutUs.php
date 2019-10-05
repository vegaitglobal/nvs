<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * AboutUs
 *
 * @ORM\Table(name="about_us")
 * @ORM\Entity
 */
class AboutUs
{
    /**
     * @var int
     *
     * @ORM\Column(name="about_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="about_heading", type="text", length=65535, nullable=false)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(name="about_short_desc", type="text", length=65535, nullable=false)
     */
    private $shortDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="about_desc", type="text", length=65535, nullable=false)
     */
    private $desc;

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
     * Set heading.
     *
     * @param string $heading
     *
     * @return AboutUs
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading.
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set shortDesc.
     *
     * @param string $shortDesc
     *
     * @return AboutUs
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    /**
     * Get shortDesc.
     *
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * Set desc.
     *
     * @param string $desc
     *
     * @return AboutUs
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc.
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }
}

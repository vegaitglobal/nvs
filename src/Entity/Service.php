<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity
 */
class Service
{
    /**
     * @var int
     *
     * @ORM\Column(name="service_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="service_title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="service_image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="service_desc", type="text", length=65535, nullable=false)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="service_button", type="string", length=255, nullable=false)
     */
    private $button;

    /**
     * @var string
     *
     * @ORM\Column(name="service_url", type="string", length=255, nullable=false)
     */
    private $url;

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
     * Set title.
     *
     * @param string $title
     *
     * @return Service
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return Service
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set desc.
     *
     * @param string $desc
     *
     * @return Service
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

    /**
     * Set button.
     *
     * @param string $button
     *
     * @return Service
     */
    public function setButton($button)
    {
        $this->button = $button;

        return $this;
    }

    /**
     * Get button.
     *
     * @return string
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Service
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

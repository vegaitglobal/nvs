<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * BoxesSection
 *
 * @ORM\Table(name="boxes_section")
 * @ORM\Entity
 */
class BoxesSection
{
    /**
     * @var int
     *
     * @ORM\Column(name="box_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="box_title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="box_desc", type="text", length=65535, nullable=false)
     */
    private $desc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="box_url", type="string", length=255, nullable=true)
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
     * @return BoxesSection
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
     * Set desc.
     *
     * @param string $desc
     *
     * @return BoxesSection
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
     * Set url.
     *
     * @param string|null $url
     *
     * @return BoxesSection
     */
    public function setUrl($url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }
}

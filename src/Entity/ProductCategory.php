<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategory
 *
 * @ORM\Table(name="product_categories")
 * @ORM\Entity
 */
class ProductCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="p_cat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_opis", type="text", length=65535, nullable=false)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_top", type="text", length=65535, nullable=false)
     */
    private $top;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_image", type="text", length=65535, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_lokacija", type="string", length=35, nullable=false)
     */
    private $lokacija;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="p_cat_od", type="date", nullable=false)
     */
    private $od;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="p_cat_do", type="date", nullable=false)
     */
    private $do;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_hrana", type="string", length=2, nullable=false)
     */
    private $hrana;

    /**
     * @var string
     *
     * @ORM\Column(name="p_cat_smestaj", type="string", length=2, nullable=false)
     */
    private $smestaj;

    /**
     * @var string
     *
     * @ORM\Column(name="p_man_id", type="text", length=65535, nullable=false)
     */
    private $pManId;

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
     * @return ProductCategory
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
     * Set opis.
     *
     * @param string $opis
     *
     * @return ProductCategory
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis.
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set top.
     *
     * @param string $top
     *
     * @return ProductCategory
     */
    public function setTop($top)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get top.
     *
     * @return string
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return ProductCategory
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
     * Set lokacija.
     *
     * @param string $lokacija
     *
     * @return ProductCategory
     */
    public function setLokacija($lokacija)
    {
        $this->lokacija = $lokacija;

        return $this;
    }

    /**
     * Get lokacija.
     *
     * @return string
     */
    public function getLokacija()
    {
        return $this->lokacija;
    }

    /**
     * Set od.
     *
     * @param \DateTime $od
     *
     * @return ProductCategory
     */
    public function setOd($od)
    {
        $this->od = $od;

        return $this;
    }

    /**
     * Get od.
     *
     * @return \DateTime
     */
    public function getOd()
    {
        return $this->od;
    }

    /**
     * Set do.
     *
     * @param \DateTime $do
     *
     * @return ProductCategory
     */
    public function setDo($do)
    {
        $this->do = $do;

        return $this;
    }

    /**
     * Get do.
     *
     * @return \DateTime
     */
    public function getDo()
    {
        return $this->do;
    }

    /**
     * Set hrana.
     *
     * @param string $hrana
     *
     * @return ProductCategory
     */
    public function setHrana($hrana)
    {
        $this->hrana = $hrana;

        return $this;
    }

    /**
     * Get hrana.
     *
     * @return string
     */
    public function getHrana()
    {
        return $this->hrana;
    }

    /**
     * Set smestaj.
     *
     * @param string $smestaj
     *
     * @return ProductCategory
     */
    public function setSmestaj($smestaj)
    {
        $this->smestaj = $smestaj;

        return $this;
    }

    /**
     * Get smestaj.
     *
     * @return string
     */
    public function getSmestaj()
    {
        return $this->smestaj;
    }

    /**
     * Set pManId.
     *
     * @param string $pManId
     *
     * @return ProductCategory
     */
    public function setPManId($pManId)
    {
        $this->pManId = $pManId;

        return $this;
    }

    /**
     * Get pManId.
     *
     * @return string
     */
    public function getPManId()
    {
        return $this->pManId;
    }
}

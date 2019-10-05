<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cat_id", type="integer", nullable=false)
     */
    private $catId;

    /**
     * @var int
     *
     * @ORM\Column(name="manufacturer_id", type="integer", nullable=false)
     */
    private $manufacturerId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="product_title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="product_url", type="text", length=65535, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="product_img1", type="text", length=65535, nullable=false)
     */
    private $img1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_img2", type="text", length=65535, nullable=true)
     */
    private $img2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_img3", type="text", length=65535, nullable=true)
     */
    private $img3;

    /**
     * @var int
     *
     * @ORM\Column(name="product_kolicina", type="integer", nullable=false)
     */
    private $kolicina;

    /**
     * @var string
     *
     * @ORM\Column(name="product_desc", type="text", length=65535, nullable=false)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="product_features", type="text", length=65535, nullable=false)
     */
    private $features;

    /**
     * @var string
     *
     * @ORM\Column(name="product_video", type="text", length=65535, nullable=false)
     */
    private $video;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_keywords", type="text", length=65535, nullable=true)
     */
    private $keywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_label", type="text", length=65535, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="product_lokacija", type="string", length=30, nullable=false)
     */
    private $lokacija;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_od", type="date", nullable=false)
     */
    private $od;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_do", type="date", nullable=false)
     */
    private $do;

    /**
     * @var int
     *
     * @ORM\Column(name="p_cat_id", type="integer", nullable=false)
     */
    private $categoryId;

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
     * Set catId.
     *
     * @param int $catId
     *
     * @return Product
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;

        return $this;
    }

    /**
     * Get catId.
     *
     * @return int
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * Set manufacturerId.
     *
     * @param int $manufacturerId
     *
     * @return Product
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->manufacturerId = $manufacturerId;

        return $this;
    }

    /**
     * Get manufacturerId.
     *
     * @return int
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Product
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Product
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
     * Set url.
     *
     * @param string $url
     *
     * @return Product
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

    /**
     * Set img1.
     *
     * @param string $img1
     *
     * @return Product
     */
    public function setImg1($img1)
    {
        $this->img1 = $img1;

        return $this;
    }

    /**
     * Get img1.
     *
     * @return string
     */
    public function getImg1()
    {
        return $this->img1;
    }

    /**
     * Set img2.
     *
     * @param string|null $img2
     *
     * @return Product
     */
    public function setImg2($img2 = null)
    {
        $this->img2 = $img2;

        return $this;
    }

    /**
     * Get img2.
     *
     * @return string|null
     */
    public function getImg2()
    {
        return $this->img2;
    }

    /**
     * Set img3.
     *
     * @param string|null $img3
     *
     * @return Product
     */
    public function setImg3($img3 = null)
    {
        $this->img3 = $img3;

        return $this;
    }

    /**
     * Get img3.
     *
     * @return string|null
     */
    public function getImg3()
    {
        return $this->img3;
    }

    /**
     * Set kolicina.
     *
     * @param int $kolicina
     *
     * @return Product
     */
    public function setKolicina($kolicina)
    {
        $this->kolicina = $kolicina;

        return $this;
    }

    /**
     * Get kolicina.
     *
     * @return int
     */
    public function getKolicina()
    {
        return $this->kolicina;
    }

    /**
     * Set desc.
     *
     * @param string $desc
     *
     * @return Product
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
     * Set features.
     *
     * @param string $features
     *
     * @return Product
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get features.
     *
     * @return string
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set video.
     *
     * @param string $video
     *
     * @return Product
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video.
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set keywords.
     *
     * @param string|null $keywords
     *
     * @return Product
     */
    public function setKeywords($keywords = null)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords.
     *
     * @return string|null
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set label.
     *
     * @param string|null $label
     *
     * @return Product
     */
    public function setLabel($label = null)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string|null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Product
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set lokacija.
     *
     * @param string $lokacija
     *
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set categoryId.
     *
     * @param int $categoryId
     *
     * @return Product
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}

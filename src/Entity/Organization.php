<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Organizations
 *
 * @ORM\Table(name="organizations")
 * @ORM\Entity
 */
class Organization
{
    /**
     * @var int
     *
     * @ORM\Column(name="manufacturer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer_title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_title_full", type="text", length=65535, nullable=true)
     */
    private $titleFull;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer_top", type="text", length=65535, nullable=false)
     */
    private $top;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_image", type="text", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_opis", type="text", length=65535, nullable=true)
     */
    private $opis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_mesto", type="string", length=30, nullable=true)
     */
    private $mesto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_adresa", type="string", length=35, nullable=true)
     */
    private $adresa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_tel", type="string", length=35, nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_email", type="string", length=35, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer_pass", type="string", length=255, nullable=false)
     */
    private $pass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_url", type="string", length=45, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer_fb", type="string", length=255, nullable=true)
     */
    private $fb;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

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
     * @return Organization
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
     * Set titleFull.
     *
     * @param string|null $titleFull
     *
     * @return Organization
     */
    public function setTitleFull($titleFull = null)
    {
        $this->titleFull = $titleFull;

        return $this;
    }

    /**
     * Get titleFull.
     *
     * @return string|null
     */
    public function getTitleFull()
    {
        return $this->titleFull;
    }

    /**
     * Set top.
     *
     * @param string $top
     *
     * @return Organization
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
     * @param string|null $image
     *
     * @return Organization
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set opis.
     *
     * @param string|null $opis
     *
     * @return Organization
     */
    public function setOpis($opis = null)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis.
     *
     * @return string|null
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set mesto.
     *
     * @param string|null $mesto
     *
     * @return Organization
     */
    public function setMesto($mesto = null)
    {
        $this->mesto = $mesto;

        return $this;
    }

    /**
     * Get mesto.
     *
     * @return string|null
     */
    public function getMesto()
    {
        return $this->mesto;
    }

    /**
     * Set adresa.
     *
     * @param string|null $adresa
     *
     * @return Organization
     */
    public function setAdresa($adresa = null)
    {
        $this->adresa = $adresa;

        return $this;
    }

    /**
     * Get adresa.
     *
     * @return string|null
     */
    public function getAdresa()
    {
        return $this->adresa;
    }

    /**
     * Set tel.
     *
     * @param string|null $tel
     *
     * @return Organization
     */
    public function setTel($tel = null)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel.
     *
     * @return string|null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Organization
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pass.
     *
     * @param string $pass
     *
     * @return Organization
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass.
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Organization
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

    /**
     * Set fb.
     *
     * @param string|null $fb
     *
     * @return Organization
     */
    public function setFb($fb = null)
    {
        $this->fb = $fb;

        return $this;
    }

    /**
     * Get fb.
     *
     * @return string|null
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * Set date.
     *
     * @param \DateTime|null $date
     *
     * @return Organization
     */
    public function setDate($date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->date;
    }
}

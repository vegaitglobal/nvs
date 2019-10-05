<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Volunteers
 *
 * @ORM\Table(name="volunteers")
 * @ORM\Entity
 */
class Volunteer
{
    /**
     * @var int
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_pass", type="string", length=255, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_country", type="text", length=65535, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_city", type="text", length=65535, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_contact", type="string", length=255, nullable=false)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_address", type="text", length=65535, nullable=false)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_image", type="text", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_cv", type="text", length=65535, nullable=true)
     */
    private $cv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_motiv", type="text", length=65535, nullable=true)
     */
    private $motiv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_confirm_code", type="text", length=65535, nullable=false)
     */
    private $confirmCode;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="customer_datum", type="date", nullable=true)
     */
    private $datum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_profil", type="string", length=30, nullable=true)
     */
    private $profil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_sprema", type="string", length=25, nullable=true)
     */
    private $sprema;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_pol", type="string", length=7, nullable=true)
     */
    private $pol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_desc", type="text", length=65535, nullable=true)
     */
    private $desc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_vestina", type="text", length=65535, nullable=true)
     */
    private $vestina;

    /**
     * @var int|null
     *
     * @ORM\Column(name="customer_sati", type="integer", nullable=true)
     */
    private $sati;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_eval", type="text", length=65535, nullable=true)
     */
    private $eval;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Volunteer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Volunteer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
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
     * @return Volunteer
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
     * Set country.
     *
     * @param string $country
     *
     * @return Volunteer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city.
     *
     * @param string $city
     *
     * @return Volunteer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set contact.
     *
     * @param string $contact
     *
     * @return Volunteer
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set address.
     *
     * @param string $address
     *
     * @return Volunteer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return Volunteer
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
     * Set cv.
     *
     * @param string|null $cv
     *
     * @return Volunteer
     */
    public function setCv($cv = null)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv.
     *
     * @return string|null
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set motiv.
     *
     * @param string|null $motiv
     *
     * @return Volunteer
     */
    public function setMotiv($motiv = null)
    {
        $this->motiv = $motiv;

        return $this;
    }

    /**
     * Get motiv.
     *
     * @return string|null
     */
    public function getMotiv()
    {
        return $this->motiv;
    }

    /**
     * Set status.
     *
     * @param string|null $status
     *
     * @return Volunteer
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
     * Set confirmCode.
     *
     * @param string $confirmCode
     *
     * @return Volunteer
     */
    public function setConfirmCode($confirmCode)
    {
        $this->confirmCode = $confirmCode;

        return $this;
    }

    /**
     * Get confirmCode.
     *
     * @return string
     */
    public function getConfirmCode()
    {
        return $this->confirmCode;
    }

    /**
     * Set datum.
     *
     * @param \DateTime|null $datum
     *
     * @return Volunteer
     */
    public function setDatum($datum = null)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum.
     *
     * @return \DateTime|null
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set profil.
     *
     * @param string|null $profil
     *
     * @return Volunteer
     */
    public function setProfil($profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil.
     *
     * @return string|null
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set sprema.
     *
     * @param string|null $sprema
     *
     * @return Volunteer
     */
    public function setSprema($sprema = null)
    {
        $this->sprema = $sprema;

        return $this;
    }

    /**
     * Get sprema.
     *
     * @return string|null
     */
    public function getSprema()
    {
        return $this->sprema;
    }

    /**
     * Set pol.
     *
     * @param string|null $pol
     *
     * @return Volunteer
     */
    public function setPol($pol = null)
    {
        $this->pol = $pol;

        return $this;
    }

    /**
     * Get pol.
     *
     * @return string|null
     */
    public function getPol()
    {
        return $this->pol;
    }

    /**
     * Set desc.
     *
     * @param string|null $desc
     *
     * @return Volunteer
     */
    public function setDesc($desc = null)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc.
     *
     * @return string|null
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set vestina.
     *
     * @param string|null $vestina
     *
     * @return Volunteer
     */
    public function setVestina($vestina = null)
    {
        $this->vestina = $vestina;

        return $this;
    }

    /**
     * Get vestina.
     *
     * @return string|null
     */
    public function getVestina()
    {
        return $this->vestina;
    }

    /**
     * Set sati.
     *
     * @param int|null $sati
     *
     * @return Volunteer
     */
    public function setSati($sati = null)
    {
        $this->sati = $sati;

        return $this;
    }

    /**
     * Get sati.
     *
     * @return int|null
     */
    public function getSati()
    {
        return $this->sati;
    }

    /**
     * Set eval.
     *
     * @param string|null $eval
     *
     * @return Volunteer
     */
    public function setEval($eval = null)
    {
        $this->eval = $eval;

        return $this;
    }

    /**
     * Get eval.
     *
     * @return string|null
     */
    public function getEval()
    {
        return $this->eval;
    }
}

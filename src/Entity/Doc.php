<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Docs
 *
 * @ORM\Table(name="docs")
 * @ORM\Entity
 */
class Doc
{
    /**
     * @var int
     *
     * @ORM\Column(name="docs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="docs_title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="docs_doc", type="text", length=65535, nullable=false)
     */
    private $doc;

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
     * @return Doc
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
     * Set doc.
     *
     * @param string $doc
     *
     * @return Doc
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc.
     *
     * @return string
     */
    public function getDoc()
    {
        return $this->doc;
    }
}

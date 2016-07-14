<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="disable", type="boolean", options={"default":false})
     */
    private $disable;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set disable
     *
     * @param boolean $disable
     * @return Genre
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;

        return $this;
    }

    /**
     * Get disable
     *
     * @return boolean 
     */
    public function getDisable()
    {
        return $this->disable;
    }
}

<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modality
 *
 * @ORM\Table(name="modality")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\ModalityRepository")
 */
class Modality
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="disable", type="boolean", options={"default":false})
     */
    private $disable;

    /**
     * @var bool
     *
     * @ORM\Column(name="contribution", type="boolean")
     */
    private $contribution;
    

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
     * @return Modality
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
     * Set contribution
     *
     * @param boolean $contribution
     * @return Modality
     */
    public function setContribution($contribution)
    {
        $this->contribution = $contribution;

        return $this;
    }

    /**
     * Get contribution
     *
     * @return boolean 
     */
    public function getContribution()
    {
        return $this->contribution;
    }

    /**
     * Set disable
     *
     * @param boolean $disable
     * @return Modality
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

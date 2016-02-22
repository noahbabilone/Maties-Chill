<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\SeanceRepository")
 */
class Session
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="typeView", type="string", length=255)
     */
    private $typeView;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="maxPlace", type="integer")
     */
    private $maxPlace;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Address",  cascade={"persist"})
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Material",  cascade={"persist"})
     */
    private $material;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Modality",  cascade={"persist"})
     */
    private $modality;
    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Film",  cascade={"persist"})
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $user;



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
     * Set date
     *
     * @param \DateTime $date
     * @return Session
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typeView
     *
     * @param string $typeView
     * @return Session
     */
    public function setTypeView($typeView)
    {
        $this->typeView = $typeView;

        return $this;
    }

    /**
     * Get typeView
     *
     * @return string 
     */
    public function getTypeView()
    {
        return $this->typeView;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Session
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Session
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set maxPlace
     *
     * @param integer $maxPlace
     * @return Session
     */
    public function setMaxPlace($maxPlace)
    {
        $this->maxPlace = $maxPlace;

        return $this;
    }

    /**
     * Get maxPlace
     *
     * @return integer 
     */
    public function getMaxPlace()
    {
        return $this->maxPlace;
    }

    /**
     * Set address
     *
     * @param \MCBundle\Entity\Address $address
     * @return Session
     */
    public function setAddress(\MCBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \MCBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set material
     *
     * @param \MCBundle\Entity\Material $material
     * @return Session
     */
    public function setMaterial(\MCBundle\Entity\Material $material = null)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return \MCBundle\Entity\Material 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set modality
     *
     * @param \MCBundle\Entity\Modality $modality
     * @return Session
     */
    public function setModality(\MCBundle\Entity\Modality $modality = null)
    {
        $this->modality = $modality;

        return $this;
    }

    /**
     * Get modality
     *
     * @return \MCBundle\Entity\Modality 
     */
    public function getModality()
    {
        return $this->modality;
    }

    /**
     * Set film
     *
     * @param \MCBundle\Entity\Film $film
     * @return Session
     */
    public function setFilm(\MCBundle\Entity\Film $film = null)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \MCBundle\Entity\Film 
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Session
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}

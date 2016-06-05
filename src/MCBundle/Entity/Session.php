<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\SessionRepository")
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
     * @ORM\Column(name="date", type="datetime",nullable=true)
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(name="typeView", type="string", length=255,nullable=true)
     */
    private $typeView;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255,nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="contribution", type="string", length=255,nullable=true)
     */
    private $contribution;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer",nullable=true)
     */
    private $price = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="maxPlace", type="integer")
     */
    private $maxPlace;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Address",  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    /**
     * @ORM\ManyToMany(targetEntity="MCBundle\Entity\Material",  cascade={"persist"})
     */
    private $material;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Modality",  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $modality;
    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Film",  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $creator;

    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $participant;

    private $filmId;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->material = new \Doctrine\Common\Collections\ArrayCollection();
        $this->participant = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setFilmId($film)
    {
        $this->filmId = $film;

        return $this;
    }

    public function getFilmId()
    {
        return $this->filmId;

    }


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Session
     */
    public function setDate($date)
    {
        if (is_a($date, 'DateTime')) {
            $this->date = $date;
        } else {
            $this->date = new \DateTime((string)$date);
        }
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
     * Set contribution
     *
     * @param string $contribution
     * @return Session
     */
    public function setContribution($contribution)
    {
        $this->contribution = $contribution;

        return $this;
    }

    /**
     * Get contribution
     *
     * @return string
     */
    public function getContribution()
    {
        return $this->contribution;
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
    public function setAddress(\MCBundle\Entity\Address $address)
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
     * Add material
     *
     * @param \MCBundle\Entity\Material $material
     * @return Session
     */
    public function addMaterial(\MCBundle\Entity\Material $material)
    {
        $this->material[] = $material;

        return $this;
    }

    /**
     * Remove material
     *
     * @param \MCBundle\Entity\Material $material
     */
    public function removeMaterial(\MCBundle\Entity\Material $material)
    {
        $this->material->removeElement($material);
    }

    /**
     * Get material
     *
     * @return \Doctrine\Common\Collections\Collection
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
    public function setModality(\MCBundle\Entity\Modality $modality)
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
    public function setFilm(\MCBundle\Entity\Film $film)
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
     * Set creator
     *
     * @param \UserBundle\Entity\User $creator
     * @return Session
     */
    public function setCreator(\UserBundle\Entity\User $creator)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return \UserBundle\Entity\User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Add participant
     *
     * @param \UserBundle\Entity\User $participant
     * @return Session
     */
    public function addParticipant(\UserBundle\Entity\User $participant)
    {
        $this->participant[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \UserBundle\Entity\User $participant
     */
    public function removeParticipant(\UserBundle\Entity\User $participant)
    {
        $this->participant->removeElement($participant);
    }

    /**
     * Get participant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipant()
    {
        return $this->participant;
    }
}

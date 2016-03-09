<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\FilmRepository")
 */
class Film
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
     * @ORM\Column(name="ISAN", type="string", length=255, unique=true)
     */
    private $ISAN;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255,nullable=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="datetime",nullable=true)
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="directors", type="string", length=255,nullable=true)
     */
    private $directors;

    /**
     * @var string
     *
     * @ORM\Column(name="actors", type="string", length=255,nullable=true)
     */
    private $actors;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255,nullable=true)
     */
    private $nationality;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer",nullable=true)
     */
    private $duration;

    /**
     * @var int
     *
     * @ORM\Column(name="ageLimit", type="integer", nullable=true)
     */
    private $ageLimit;

    /**
     * @var float
     *
     * @ORM\Column(name="pressRating", type="float", nullable=true)
     */
    private $pressRating;

    /**
     * @var float
     *
     * @ORM\Column(name="userRating", type="float", nullable=true)
     */
    private $userRating;
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    private $link;


    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", nullable=true)
     */
    private $image;
    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Category",  cascade={"persist"})
     */
    private $category;


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
     * Set ISAN
     *
     * @param string $ISAN
     * @return Film
     */
    public function setISAN($ISAN)
    {
        $this->ISAN = $ISAN;

        return $this;
    }

    /**
     * Get ISAN
     *
     * @return string
     */
    public function getISAN()
    {
        return $this->ISAN;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Film
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
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Film
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set directors
     *
     * @param string $directors
     * @return Film
     */
    public function setDirectors($directors)
    {
        $this->directors = $directors;

        return $this;
    }

    /**
     * Get directors
     *
     * @return string
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Set actors
     *
     * @param string $actors
     * @return Film
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * Get actors
     *
     * @return string
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Film
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        
        return $this->duration;
    }

     /**
     * Get String
     *
     * @return integer
     */
    public function getDuree()
    {   
        if($this->duration >60)
        {
            $heure =($this->duration / 60);
            $minute =($this->duration % 60==0)?'00':$this->duration % 60;
            return $heure. 'h'.$minute.'min';
            
        }
        return $this->duration.'min';
    }
    /**
     * Set ageLimit
     *
     * @param integer $ageLimit
     * @return Film
     */
    public function setAgeLimit($ageLimit)
    {
        $this->ageLimit = $ageLimit;

        return $this;
    }

    /**
     * Get ageLimit
     *
     * @return integer
     */
    public function getAgeLimit()
    {
        return $this->ageLimit;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Film
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set category
     *
     * @param \MCBundle\Entity\Category $category
     * @return Film
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \MCBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
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
     * Set pressRating
     *
     * @param float $pressRating
     * @return Film
     */
    public function setPressRating($pressRating)
    {
        $this->pressRating = $pressRating;

        return $this;
    }

    /**
     * Get pressRating
     *
     * @return float 
     */
    public function getPressRating()
    {
        return $this->pressRating;
    }

    /**
     * Set userRating
     *
     * @param float $userRating
     * @return Film
     */
    public function setUserRating($userRating)
    {
        $this->userRating = $userRating;

        return $this;
    }

    /**
     * Get userRating
     *
     * @return float 
     */
    public function getUserRating()
    {
        return $this->userRating;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Film
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return Film
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }
}

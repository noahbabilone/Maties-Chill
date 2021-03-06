<?php

namespace MCBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MCBundle\Entity\Genre;

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
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ISAN", type="string", length=255, unique=true)
     */
    protected $ISAN;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255,nullable=true)
     */
    protected $title;


    /**
     * @var boolean
     *
     * @ORM\Column(name="disable", type="boolean", options={"default":false})
     */
    private $disable;

    /**
     * @var string
     *
     * @ORM\Column(name="originalTitle", type="string", length=255,nullable=true)
     */
    protected $originalTitle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="datetime",nullable=true)
     */
    protected $releaseDate; 
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAdded", type="datetime",nullable=true)
     */
    protected $dateAdded;

    /**
     * @var string
     *
     * @ORM\Column(name="directors", type="string", length=255,nullable=true)
     */
    protected $directors;

    /**
     * @var string
     *
     * @ORM\Column(name="actors", type="string", length=255,nullable=true)
     */
    protected $actors;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255,nullable=true)
     */
    protected $nationality;

    /**
     * @var int
     *
     * @ORM\Column(name="runtime", type="integer",nullable=true)
     */
    protected $runtime;

    /**
     * @var int
     *
     * @ORM\Column(name="ageLimit", type="integer", nullable=true)
     */
    protected $ageLimit;

    /**
     * @var float
     *
     * @ORM\Column(name="pressRating", type="float", nullable=true)
     */
    protected $pressRating;

    /**
     * @var float
     *
     * @ORM\Column(name="userRating", type="float", nullable=true)
     */
    protected $userRating;
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    protected $link;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer", type="string", nullable=true)
     */
    protected $trailer;


    /**
     * @var string
     *
     * @ORM\Column(name="poster", type="string", nullable=true)
     */
    protected $poster;
    /**
     * @var text
     *
     * @ORM\Column(name="synopsisShort", type="text", nullable=true)
     */
    protected $synopsisShort;

    /**
     * @var text
     *
     * @ORM\Column(name="synopsis", type="text", nullable=true)
     */
    protected $synopsis;

    /**
     * @ORM\ManyToMany(targetEntity="MCBundle\Entity\Genre",  cascade={"persist"})
     */
    protected $genre;
    
     /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255,nullable=true)
     */
    private $keywords;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->disable = false;
        $this->dateAdded= new \DateTime();

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

    /**
     * Set ISAN
     *
     * @param string $iSAN
     * @return Film
     */
    public function setISAN($iSAN)
    {
        $this->ISAN = $iSAN;

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

        if (is_a($releaseDate, 'DateTime')) {
            $this->releaseDate = $releaseDate;
        } else {
            $this->releaseDate = new \DateTime((string)$releaseDate);
        }
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

    /**
     * Set runtime
     *
     * @param integer $runtime
     * @return Film
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * Get runtime
     *
     * @return integer
     */
    public function getRuntime()
    {
        return $this->runtime;
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
     * Set synopsis
     *
     * @param string $synopsis
     * @return Film
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set trailer
     *
     * @param string $trailer
     * @return Film
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get trailer
     *
     * @return string
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Add genre
     *
     * @param Genre $genre
     * @return Film
     */
    public function addGenre(Genre $genre)
    {
        $this->genre[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param Genre $genre
     */
    public function removeGenre(Genre $genre)
    {
        $this->genre->removeElement($genre);
    }

    /**
     * Get genre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenre()
    {
        return $this->genre;
    }


    /**
     * Set synopsisShort
     *
     * @param string $synopsisShort
     * @return Film
     */
    public function setSynopsisShort($synopsisShort)
    {
        $this->synopsisShort = $synopsisShort;
        return $this;
    }

    /**
     * Get synopsisShort
     *
     * @return string
     */
    public function getSynopsisShort()
    {
        return $this->synopsisShort;
    }

    /**
     * Set poster
     *
     * @param string $poster
     * @return Film
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster
     *
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set originalTitle
     *
     * @param string $originalTitle
     * @return Film
     */
    public function setOriginalTitle($originalTitle)
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    /**
     * Get originalTitle
     *
     * @return string
     */
    public function getOriginalTitle()
    {
        return $this->originalTitle;
    }

    /**
     * Set disable
     *
     * @param boolean $disable
     * @return Film
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

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Film
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Film
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
}

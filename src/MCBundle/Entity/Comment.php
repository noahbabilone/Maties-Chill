<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MCBundle\Entity\Seance;
use UserBundle\Entity\User;

/**http://project-group-4.estiam.com/
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\CommentRepository")
 */
class Comment
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
     * @var boolean
     *
     * @ORM\Column(name="disable", type="boolean", options={"default":false})
     */
    private $disable;
    
     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $user;

     /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Seance",  cascade={"persist"})
     */
    private $seance;
    
    /**
     * @var text
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    protected $message;
    

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
     * @return Comment
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
     * Set user
     *
     * @param User $user
     * @return Comment
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set seance
     *
     * @param Seance $seance
     * @return Comment
     */
    public function setSeance(Seance $seance = null)
    {
        $this->seance = $seance;

        return $this;
    }

    /**
     * Get seance
     *
     * @return Seance 
     */
    public function getSeance()
    {
        return $this->seance;
    }

    /**
     * Set disable
     *
     * @param boolean $disable
     * @return Comment
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
     * Set Message
     *
     * @param string $message
     * @return Film
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get Message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

}

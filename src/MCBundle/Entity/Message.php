<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MCBundle\Entity\Seance;
use UserBundle\Entity\User;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\MessageRepository")
 */
class Message
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
     * @var boolean
     *
     * @ORM\Column(name="disable", type="boolean", options={"default":false})
     */
    private $disable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var boolean
     *
     * @ORM\Column(name="readMessage", type="boolean")
     */
    private $readMessage;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Seance",  cascade={"persist"})
     */
    private $seance;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $receiver;


   

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
     * @return Message
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
     * Set readMessage
     *
     * @param boolean $readMessage
     * @return Message
     */
    public function setReadMessage($readMessage)
    {
        $this->readMessage = $readMessage;

        return $this;
    }

    /**
     * Get readMessage
     *
     * @return boolean 
     */
    public function getReadMessage()
    {
        return $this->readMessage;
    }

    /**
     * Set seance
     *
     * @param Seance $seance
     * @return Message
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
     * Set sender
     *
     * @param User $sender
     * @return Message
     */
    public function setSender(User $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param User $receiver
     * @return Message
     */
    public function setReceiver(User $receiver = null)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return User 
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set disable
     *
     * @param boolean $disable
     * @return Message
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

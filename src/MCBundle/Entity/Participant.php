<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\ParticipantRepository")
 */
class Participant
{
    /**
     * @ORM\Column(name="user", type="string", length=255)
     * @ORM\Id
     */
    private $user;

    /***
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Session",  cascade={"persist"})
     * @ORM\Id
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\StateParticipant",  cascade={"persist"})
     */
    private $stateParticipant;



    /**
     * Set user
     *
     * @param string $user
     * @return Participant
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set stateParticipant
     *
     * @param \MCBundle\Entity\StateParticipant $stateParticipant
     * @return Participant
     */
    public function setStateParticipant(\MCBundle\Entity\StateParticipant $stateParticipant = null)
    {
        $this->stateParticipant = $stateParticipant;

        return $this;
    }

    /**
     * Get stateParticipant
     *
     * @return \MCBundle\Entity\StateParticipant 
     */
    public function getStateParticipant()
    {
        return $this->stateParticipant;
    }
}
